<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MlsMaster;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\CustomXMLParser;
use App\Mls\MatrixRets;
use App\Mls\AltCalRets;
use App\Mls\StellarMls;
use App\Mls\BridgeDataOutput;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data {type}';
    protected $totalAdded = 0;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Script will import MLS data from API';

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
        $type       = $this->argument("type");
        $scriptName = 'import:data '.$type;

        // Check script already or not if run then dont execute this
        $arr = getProcessIDsForRunningScript($scriptName);

        if(count($arr) > 1)
        {
            exit("Process already running");
        }

        $api_id = 0;

        switch($type){
            case 'alt-calrets':
                        $this->importAltCalRets();
                        break;
            case 'matrixrets':
                        $this->importMatrixRets();
                        break;
            case 'stellarmls':
                        $this->importStellarMLS();
                        break;
            case 'bridgedataoutput':
                        $this->importBridgedataoutputMLS();
                        break;
            default:
                        echo '\n No MLS Type found!';
                        break;

        }
        echo "\r\n End Time ==> ".date("Y-m-d H:i:s");

        exit("\nCompleted");
    }

    function importAltCalRets(){
        $apiID = ALT_CALRETS_ID;
        $apiObj = MlsMaster::find($apiID);

        if($apiObj){

            $options = [];
            $options['id']              = $apiObj->id;
            $options['url']             = $apiObj->url;
            $options['username']       = $apiObj->username;
            $options['password']       = $apiObj->password;

            $cron_id = 'import-data '.$this->argument("type");
            $scriptStartTime = date("Y-m-d H:i:s");
            
            $mainLogID = \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, NULL, NULL, NULL, 'Web Server', $cron_id);

            $obj = new AltCalRets($options);
            $obj->startImport($options);

            $scriptEndTime = date("Y-m-d H:i:s");
            $content = $obj->totalAdded." updated!";
            \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, $scriptEndTime, NULL, $content, 'Web Server', $cron_id, $mainLogID);            
        }    
    }

    function importMatrixRets(){

        $apiID = MATRIX_RETS_ID;
        $apiObj = MlsMaster::find($apiID);

        if($apiObj){

            $options = [];
            $options['id']    = $apiObj->id;
            $options['url']        = $apiObj->url;
            $options['username']       = $apiObj->username;
            $options['password']       = $apiObj->password;

            $cron_id = 'import-data '.$this->argument("type");
            $scriptStartTime = date("Y-m-d H:i:s");
            
            $mainLogID = \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, NULL, NULL, NULL, 'Web Server', $cron_id);

            $obj = new MatrixRets($options);
            $obj->startImport($options);

            $scriptEndTime = date("Y-m-d H:i:s");
            $content = $obj->totalAdded." updated!";
            \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, $scriptEndTime, NULL, $content, 'Web Server', $cron_id, $mainLogID);
        }
    }

    function importStellarMLS(){

        $apiID = STELLAR_MLS_ID;
        $apiObj = MlsMaster::find($apiID);

        if($apiObj){

            $options = [];
            $options['id']          = $apiObj->id;
            $options['url']         = $apiObj->url;
            $options['username']    = $apiObj->username;
            $options['password']    = $apiObj->password;

            $cron_id = 'import-data '.$this->argument("type");
            $scriptStartTime = date("Y-m-d H:i:s");
            
            $mainLogID = \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, NULL, NULL, NULL, 'Web Server', $cron_id);

            $obj = new StellarMls($options);
            $obj->startImport($options);

            $scriptEndTime = date("Y-m-d H:i:s");
            $content = $obj->totalAdded." updated!";
            \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, $scriptEndTime, NULL, $content, 'Web Server', $cron_id, $mainLogID);
        }
    }

    function importBridgedataoutputMLS()
    {
        $apiID = BRIDGE_DATA_API_MLS_ID;
        $apiObj = MlsMaster::find($apiID);

        if($apiObj){
            $options = [];
            $options['id']          = $apiObj->id;
            $options['url']         = $apiObj->url;
            $options['username']    = $apiObj->username;
            $options['password']    = $apiObj->password;
            $options['token']       = $apiObj->token;
            $cron_id = 'import-data '.$this->argument("type");
            $scriptStartTime = date("Y-m-d H:i:s");

            $mainLogID = \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, NULL, NULL, NULL, 'Web Server', $cron_id);

            $obj = new BridgeDataOutput($options);
            $obj->startImport($options);

            $scriptEndTime = date("Y-m-d H:i:s");
            $content = $obj->totalAdded." updated!";
            \App\Models\CronLogDetail::storeCronLogs($scriptStartTime, $scriptEndTime, NULL, $content, 'Web Server', $cron_id, $mainLogID);
        }
    }
}
