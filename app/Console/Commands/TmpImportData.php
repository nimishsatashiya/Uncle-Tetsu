<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MlsMaster;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\CustomXMLParser;


class TmpImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmp-import:data {mls} {className?}';
    protected $totalAdded = 0;
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
        $MLSArr = MlsMaster::select('id', 'url', 'username', 'password')
                  ->where('status', '=', '1')
                  ->get()
                  ->toArray();

        if(!empty($MLSArr))
        {
            foreach ($MLSArr as $key => $vals)
            {
                if($vals['id'] == 1)
                {
                    //http://alt-calrets.mlslistings.com:6103
                    $this->ImportALTCalretsMLSData($vals);
                }else if($vals['id'] == 2){
                    //http://fmlsrets.mlsmatrix.com/rets/login.ashx
                    // $this->ImportFmlsretsMLSData($vals);
                }
            }
        }
    }

    public function ImportALTCalretsMLSData($options){

        $mls = $this->argument("mls");
        $passedClassName = $this->argument("className");


        $mlsMasterId    = $options['id'];
        $retsUrl        = $options['url'];
        $username       = $options['username'];
        $password       = $options['password'];

        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($retsUrl);
        $config->setUsername($username);
        $config->setPassword($password);

        $rets = new \PHRETS\Session($config);
        $result = $rets->Login();

        $rets->setParser(
                \PHRETS\Strategies\Strategy::PARSER_XML,
                new CustomXMLParser()
        );        

        
        $filterClasses = array('RES','CBO','CMF', 'CLR', 'CLL', 'CIN', 'RIN', 'RMH', 'RLR', 'RLL');


        $firstField = $filterClasses[0];
        if(!empty($passedClassName) && $firstField != $passedClassName){

            foreach($filterClasses as $key => $cls){
                if($cls == $passedClassName){
                    $filterClasses[$key] = $firstField;
                    $filterClasses[0] = $passedClassName;
                }
            }
        }

        foreach ($filterClasses as $className){

            $resource = "Property";
            $today = date('Y-m-d');
            $previousStartTime = date('c', strtotime('-12 hours'));
            $listingStatus = 'ACT';
            $maxrows = true;
            $offset = 1;
            $limit = 100;
            
            $lastDate = date("Y-m-d H:i:00",strtotime("-12 hour"));
            
            // $lastDate = "2019-04-19T10:00:00";
            $lastDate = str_replace(' ', 'T', $lastDate);
            
            $query = "(LastModDt=$lastDate+),(ListingStatus=|1)";
            $query = "(OrigListingID=PW19032790)";
            $query = "(OrigListingID=$mls)";
            $query = "((ListingID={$mls})|(OrigListingID={$mls}))";

            
            // $query = "(ListingID=CRSB19069099),(ModificationTimestamp=2019-04-19T16:33:35)";

            while($maxrows){

                $q =  "Query: {$query}  Limit: {$limit}  Offset: {$offset}";

                $selectFields = array('ModificationTimestamp', 'PhotoCount', 'ListingOfficeName', 'CityName', 'ListPrice', 'ListingID', 'ListingType', 'ListingAgentEmailAddress', 'Class', 'ListingStatus', 'PropertyID', 'LastModDt', 'OrigListingID', 'AreaID', 'CrossStreet', 'StateOrProvinceName', 'PostalCode','FilteredAddress');

                if($className == 'RLR')
                {
                    $selectFields = array('CityName', 'ListPrice', 'ListingID', 'ListingType', 'ModificationTimestamp', 'PhotoCount', 'ListingAgentEmailAddress', 'Class', 'ListingStatus', 'PropertyID', 'LastModDt', 'OrigListingID', 'AreaID', 'CrossStreet', 'StateOrProvinceName', 'PostalCode');
                }

                $options =  [
                                'Limit' => $limit, 
                                'OFFSET' => $offset,
                                //'QueryType' => 'DMQL2',
                                'Count' => 1, // count and records
                                //'Format' => 'COMPACT-DECODED',
                                'Limit' => 100,
                                // 'Select' => $selectFields,
                                'StandardNames' => 0, // give system names
                            ];

                echo "\n Q: $q - Class: $className";            

                $result = $rets->Search($resource, $className, $query,$options);

                // try
                // {
                    
                // }
                // catch(\Exception $e)
                // {
                //     echo "\n XML ERROR : Q: $q - Class: $className";
                //     $offset = ($offset + 100);
                //     continue;
                // }


                $currentTotalRecords =  $result->getReturnedResultsCount();            
                $totalRecords =  $result->getTotalResultsCount();
                if($currentTotalRecords <= 0)
                {
                    $maxrows = false;
                    continue;
                } 

                echo "\r\n ($className) Overall Total Records : ".$totalRecords."\n";
                echo "\r\n ($className) Current Offset Total Records : ".$currentTotalRecords."\n";

                $offset = ($offset + $currentTotalRecords);

                $rows = $result->toArray();
                if(!empty($rows)){
                    $iCounter = 0;
                    print_r($selectFields);
                    print_r($rows);
                    exit;

                    foreach($rows as $value){

                        print_r($value);
                        exit;

                        $iCounter++;
                        // echo "\nProcessed: $iCounter";
                        $dataToInsert = [];
                        $dataToInsert['MlsMasterId']        = $mlsMasterId;
                        $dataToInsert['MlsListingID']       = $value['ListingID'];
                        $dataToInsert['MlsOrgMasterId']     = $value['OrigListingID'];
                        $dataToInsert['MlsPropertyID']      = $value['PropertyID'];
                        $dataToInsert['OrigListingID']      = $value['OrigListingID'];
                        $dataToInsert['PropertyType']       = $value['Class'];
                        $dataToInsert['Price']              = $value['ListPrice'];
                        $dataToInsert['Name']               = isset($value['ListingOfficeName']) ? $value['ListingOfficeName']:'';
                        $dataToInsert['CityName']           = $value['CityName'];
                        $dataToInsert['AreaNumber']         = $value['AreaID'];
                        $dataToInsert['StreetName']         = $value['CrossStreet'];
                        $dataToInsert['StateName']          = $value['StateOrProvinceName'];
                        $dataToInsert['PostalCode']         = $value['PostalCode'];
                        if(!empty($value['PhotoCount'])){
                            $dataToInsert['PhotoCount']     = $value['PhotoCount'];
                        }
                        $dataToInsert['MlsStatus']          = $value['ListingStatus'];
                        $dataToInsert['ModificationTime']   = $value['ModificationTimestamp'];
                        $dataToInsert['className']   =  $className;
                        echo "\nDate: ".$value['ModificationTimestamp'];
                        $this->totalAdded++;
                        $modelRes = Property::AddProperties($dataToInsert);
                        $id = $modelRes['id'];
                        $isNew = $modelRes['isNew'];                         

                        if($id > 0)
                        {
                            if($value['PhotoCount'] > 0){
                                $ListingID = $value['ListingID'];
                                $imageQuery = "(SourceID=".$value['PropertyID']."),(DeletedYN=0),(MediaCategory=|2)";
                                // echo "\r\n Image Query -> ".$imageQuery;
                                $optionsImage =  ['QueryType' => 'DMQL2', 'Format' => 'Compact' ];

                                try
                                {
                                    $images = $rets->Search('Media', 'Media', $imageQuery, $optionsImage);
                                }
                                catch(\Exception $e)
                                {
                                    echo "\n XML IMG ERROR : Image Query -> ".$imageQuery;

                                    continue;
                                }

                                $images = $images->toArray();
                                if(isset($images[0]['MediaURL'])){
                                    \App\Models\PropertyImages::saveImages($id, $images);
                                }                                                                    
                            }
                        }
                    }
                }
            }
        }

        // close connections
        $rets->Disconnect();
    }
}
