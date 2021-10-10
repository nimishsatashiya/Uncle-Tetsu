<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MlsMaster;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyImages;
use File;
use Aws\S3\S3Client;
use Aws\Credentials\CredentialProvider;
use DB;

class DownloadImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:images';
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
        echo "\r\n Start Time ==> ".date("Y-m-d H:i:s");
        $s3 = S3Client::factory(array(
                            'credentials' => array(
                                'key' => env('AWS_ACCESS_KEY_ID'),
                                'secret' => env('AWS_SECRET_ACCESS_KEY')
                            ),
                            'version' => 'latest',
                            'region'  => env('AWS_REGION')
                        ));
        $arr = getProcessIDsForRunningScript('download:image');

        if(count($arr) > 1)
        {
            exit("Process already running");
        }
        // DB::enableQueryLog();
        $rows = PropertyImages::leftJoin("listings","listings.id","=","property_images.property_id")
                ->leftJoin("mls_master","mls_master.id","=","listings.mls_id")
                ->select("property_images.id as property_images_id", "property_images.image_url", "listings.id as listings_id",
                        "listings.mls_id", "mls_master.id as mls_master_id", "mls_master.url", "mls_master.username",
                        "mls_master.password")
                ->where("property_images.is_download", 0)
                ->where("property_images.is_local",0)
                ->orderBy("property_images.id","ASC")
                ->limit(2000)->get()->toArray();
        // print_r(DB::getQueryLog()); 
        // exit();
        foreach($rows as $row)
        {
            $username = '';
            $password = '';
            echo "\r\n";
            echo "\r\n image_url --> ".$row['image_url'];
            echo "\r\n";
            if($row['mls_master_id'] == 2 )
            {
                $username = $row['username'];
                $password = $row['password'];
            }
            $imgData =  DownloadImageByCURL($row['image_url'], $username, $password);
            $path = public_path('property_img/'.$row["listings_id"]);
            if(!File::isDirectory($path))
            {
                File::makeDirectory($path, 0777, true, true);
            }
            $filename = $path.''.'/img_'.$row['property_images_id'].'.jpg';
            file_put_contents($filename, $imgData);
            $S3Path = $row["listings_id"].'/img_'.$row['property_images_id'].'.jpg';
            $S3PathStoreImg = 'img_'.$row['property_images_id'].'.jpg';
            echo "\r\n";
            echo "\r\n S3 path -> ";
            echo "\r\n";
            print_r($S3Path);
            echo "\r\n";
            echo "\r\n local filename path -> ";
            echo "\r\n";
            print_r($filename);
            echo "\r\n";
            $upload = $s3->upload(env('AWS_BUCKET'), $S3Path, fopen($filename, 'rb'), 'public-read');
            PropertyImages::where('is_download', 0)
                            ->where('id', $row['property_images_id'])
                            ->update(['is_download' => 1, 'image_name' => $S3PathStoreImg]);
            echo "\r\n property_images_id -> ".$row['property_images_id'];

            if (file_exists($filename)) {
                gc_collect_cycles();
                unlink($filename);
                echo 'File '.$filename.' has been deleted';
            } else {
                echo 'Could not delete '.$filename.', file does not exist';
            }
            echo "\r\n";
            delete_directory($path);
        }

        echo "\r\n End Time ==> ".date("Y-m-d H:i:s");
    }
}
