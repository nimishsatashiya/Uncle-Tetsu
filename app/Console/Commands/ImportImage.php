<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MlsMaster;
use App\Models\Property;
use App\Models\PropertyType;


class ImportImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:images';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arr = getProcessIDsForRunningScript('import:images');        

        if(count($arr) > 1)
        {
            exit("Process already running");
        }    

        $RETS_URL = 'http://alt-calrets.mlslistings.com:6103';
        $Username = 'jmechura';
        $Password = 'j450au18';

        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($RETS_URL);
        $config->setUsername($Username);
        $config->setPassword($Password);

        $rets = new \PHRETS\Session($config);
        $result = $rets->Login();


        $rows = Property::leftJoin("property_images","property_images.property_id","=","properties.id")
                ->select("properties.*")
                ->whereRaw("property_images.id IS NULL")
                ->orderBy("properties.last_update_image","ASC")
                ->limit(1000)
                ->get();

        foreach($rows as $row)
        {
            $Img_query = "(SourceID=".$row->MlsPropertyID."),(DeletedYN=0),(MediaCategory=|2)";
            $Img_q = "Query: {$Img_query}";
            $options =  ['QueryType' => 'DMQL2', 'Format' => 'Compact' ];
            $Img_result = $rets->Search('Media', 'Media', $Img_query, $options);
            $Img_result = $Img_result->toArray();

            if(isset($Img_result[0]['MediaURL']))
            {
                \App\Models\PropertyImages::saveImages($row->Id, $Img_result);
            }

            \DB::table("properties")
            ->where("id", $row->Id)
            ->update([
                "last_update_image" => date("Y-m-d H:i:s")
            ]);
        }    
        $rets->Disconnect();    
    }
}
