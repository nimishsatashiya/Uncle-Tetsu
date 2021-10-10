<?php
namespace App\Mls;

use App\Models\CustomXMLParser;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\MlsFieldsMapping;
use App\Models\PropertyImages;
use App\Models\Listing;
use App\Models\MlsMaster;
use App\Models\MlsClass;
use Aws\S3\S3Client;
use DB;

class AltCalRets
{
	public $totalAdded = 0;
	protected $rets = 0;
	protected $options = [];
	protected $mlsMasterId = 0;
    protected $Is_onetime = 0;
    protected $ArrSelectFields = [];
    protected $IsDownloadImageDirect = 1;

    public function __construct($options)
    {
    	$this->options = $options;
    	$this->doLogin();
    }

    public function doLogin(){

        $this->mlsMasterId    = $this->options['id'];
        $retsUrl        = $this->options['url'];
        $username       = $this->options['username'];
        $password       = $this->options['password'];

        // if(!empty($this->ArrSelectFields))
        // {
        //     $this->ArrSelectFields = $this->ArrSelectFields->toArray();
        // }

        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($retsUrl);
        $config->setUsername($username);
        $config->setPassword($password);
        
        $this->rets = new \PHRETS\Session($config);
        $result = $this->rets->Login();

        $this->rets->setParser(
                \PHRETS\Strategies\Strategy::PARSER_XML,
                new CustomXMLParser()
        );    	
    }

    public function startImport()
    {
    	$filterClasses = [ 'RLL', 'RMH', 'RIN', 'CIN', 'CLL', 'CLR', 'CMF', 'CBO', 'CLL', 'RLR', 'RES'];
        // $filterClasses = MlsClass::where("id",11)->where('status', 1)->get();
        $filterClasses = MlsClass::where("mls_id",$this->mlsMasterId)->where('status', 1)->get();
        $filterClassesCount = $filterClasses->count();
        if($filterClassesCount > 0)
        {
            foreach ($filterClasses as $ArrClass)
            {
                $mls_class_id       = $ArrClass->id;
                $className          = $ArrClass->class_name;
                $last_import_date   = $ArrClass->last_import_date;
                $last_offset        = $ArrClass->last_offset;

                $this->ArrSelectFields = MlsFieldsMapping::where("mls_id",$this->mlsMasterId)
                                                        ->where('mls_class_id', $mls_class_id)
                                                        ->get();

                $selectFields = MlsFieldsMapping::ProcessFieldsForSelect($this->ArrSelectFields);

                $resource = "Property";
                $today = date('Y-m-d');
                $previousStartTime = date('c', strtotime('-12 hours'));
                $listingStatus = 'ACT';
                $maxrows = true;
                $offset = $last_offset;
                
                $limit = 100;

                // $lastDate = "2019-04-19T10:00:00";
                $lastDate = date("Y-m-d 00:00:00",strtotime("2017-01-01"));
                if(!empty($last_import_date))
                {
                    $lastDate = $last_import_date;

                }
                $lastDate = str_replace(' ', 'T', $lastDate);

                $query = "(LastModDt=$lastDate+)";
                $query = "(LastModDt=$lastDate+),(ListingStatus=|1)";
                // $query = "(ListingID=CC40742978)";

                while($maxrows)
                {
                    $q =  "Query: {$query}  Limit: {$limit}  Offset: {$offset}";

                    $options =  [
                                    'Limit' => $limit, 
                                    'OFFSET' => $offset,
                                    'QueryType' => 'DMQL2',
                                    'Count' => 1, // count and records
                                    'Format' => 'COMPACT-DECODED',
                                    'Limit' => 100,
                                    'Select' => $selectFields,
                                    'StandardNames' => 0, // give system names
                                ];

                    echo "\n Q: $q - Class: $className";

                    MlsClass::where('id', $mls_class_id)->update(['last_offset' => $offset]);

                    $result = $this->rets->Search($resource, $className, $query,$options);

                    $currentTotalRecords =  $result->getReturnedResultsCount();
                    $totalRecords =  $result->getTotalResultsCount();
                    
                    if($currentTotalRecords <= 0)
                    {
                        MlsClass::where('id', $mls_class_id)->update(['last_import_date' => date("Y-m-d H:i:s"), 'last_offset' => 1]);
                        $maxrows = false;
                        continue;
                    }

                    echo "\r\n ($className) Overall Total Records : ".$totalRecords."\n";
                    echo "\r\n ($className) Current Offset Total Records : ".$currentTotalRecords."\n";

                    $offset = ($offset + $currentTotalRecords);
                    $rows = $result->toArray();

                    if(!empty($rows)){
                        $iCounter = 0;
                        foreach($rows as $value)
                        {
                            if($value['ListingStatus'] == 'Active')
                            {
                                $modelRes = Listing::AddListings($this->mlsMasterId, $this->ArrSelectFields, $value);
                                $listings_id = $modelRes['id'];
                                echo "\r\n listings_id --> ".$listings_id;
                                $isNew = $modelRes['isNew'];
                                if($listings_id > 0)
                                {
                                    if($value['PhotoCount'] > 0) 
                                    {
                                        $ListingID = $value['ListingID'];
                                        $imageQuery = "(SourceID=".$value['PropertyID']."),(DeletedYN=0),(MediaCategory=|2)";
                                        echo "\r\n Image Query -> ".$imageQuery;
                                        $optionsImage =  ['QueryType' => 'DMQL2', 'Format' => 'Compact' ];
                                        try
                                        {
                                            $images = $this->rets->Search('Media', 'Media', $imageQuery, $optionsImage);
                                        } catch(\Exception $e) {
                                            echo "\n XML IMG ERROR : Image Query -> ".$imageQuery;
                                            continue;
                                        }
                                        $images = $images->toArray();
                                        if($this->IsDownloadImageDirect == 1)
                                        {
                                            if(!empty($images))
                                            {
                                                foreach ($images as $imgarr)
                                                {
                                                    PropertyImages::DownloadImageDirect($listings_id, $imgarr['MediaURL']);
                                                }
                                            }
                                        } else {
                                            if(isset($images[0]['MediaURL'])){
                                                \App\Models\PropertyImages::saveImages($listings_id, $images);
                                            }
                                        }
                                    }
                                }
                            } else {
                                echo "\r\n Inactive MSL ListingID :: ".$value['ListingID'];
                                Listing::InactiveListings($value['ListingID']);
                            }
                        }
                    }
                }
            }
        }

    }
}