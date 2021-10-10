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
use File;

class MatrixRets
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

        // $this->ArrSelectFields = MlsFieldsMapping::where("mls_id",$this->mlsMasterId)->get();
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

        $s3 = S3Client::factory(array(
                            'credentials' => array(
                                'key' => env('AWS_ACCESS_KEY_ID'),
                                'secret' => env('AWS_SECRET_ACCESS_KEY')
                            ),
                            'version' => 'latest',
                            'region'  => env('AWS_REGION')
                        ));

        $filterClasses = MlsClass::where("mls_id",$this->mlsMasterId)->where('status', 1)->get();
        $filterClassesCount = $filterClasses->count();
        if($filterClassesCount > 0)
        {
            foreach ($filterClasses as $ArrClass)
            {
        		$className = "Listing";
        		$resource = "Property";
                $mls_class_id       = $ArrClass->id;
                $className          = $ArrClass->class_name;
                $last_import_date   = $ArrClass->last_import_date;
                $last_offset        = $ArrClass->last_offset;

                $this->ArrSelectFields = MlsFieldsMapping::where("mls_id",$this->mlsMasterId)
                                                        ->where('mls_class_id', $mls_class_id)
                                                        ->get();
                $selectFields = MlsFieldsMapping::ProcessFieldsForSelect($this->ArrSelectFields);


                $lastDate = date("Y-m-d 00:00:00",strtotime("2017-01-01"));
                if(!empty($last_import_date))
                {
                    $lastDate = $last_import_date;

                }
                $lastDate = str_replace(' ', 'T', $lastDate);

        		$query = "(Status=A)";
                $query = "(MatrixModifiedDT=$lastDate+)";
                $query = "(MatrixModifiedDT=$lastDate+),(Status=A)";

        		$limit = 100;
        		$offset = $last_offset;
        		$maxrows = true;

        		while($maxrows)
        		{
        	        $queryOptions =  
        	        				[
        	                        	'Limit' => $limit, 
        	                        	'OFFSET' => $offset,
        	                        	'QueryType' => 'DMQL2',
        	                        	'Count' => 1, // count and records
        	                        	'Format' => 'COMPACT-DECODED',
        	                        	'Select' => $selectFields,
        	                        	'StandardNames' => 0
        	                    	];

        	        echo "\n Q: $query Offset: $offset Limit: $limit";

                    MlsClass::where('id', $mls_class_id)->update(['last_offset' => $offset]);

        			$result = $this->rets->Search($resource, $className, $query,$queryOptions);

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
                    	foreach($rows as $value)
                        {
                            if($value['Status'] == 'Active')
                            {
                                $modelRes = Listing::AddListings($this->mlsMasterId, $this->ArrSelectFields, $value);
                                $listings_id = $modelRes['id'];
                                $isNew = $modelRes['isNew'];
                                echo "\r\n isNew --> ".$isNew;
                                echo "\r\n PhotoCount --> ".$value['PhotoCount'];
                        		$this->totalAdded++;
                                // echo "\n $this->totalAdded";
                                if($listings_id > 0 && $value['PhotoCount'] > 1)
                                {
                                    $listing = $value['Matrix_Unique_ID'];
                                    $photos = $this->rets->GetObject('Property', 'LargePhoto', $listing,'*', 0);
                                    $path = public_path('property_img/'.$listings_id);
                                    if(!File::isDirectory($path))
                                    {
                                        File::makeDirectory($path, 0777, true, true);
                                    }
                                    foreach ($photos as $photo)
                                    {
                                        $listing    = $photo->getContentId();
                                        $number     = $photo->getObjectId();
                                        if ($photo->isError() == false && $number > 0)
                                        {
                                            $filename = $path.''.'/img_'.$number.'.jpg';
                                            echo "\r\n filename -> ". $filename;
                                            $Arrimg = PropertyImages::where("property_id",$listings_id)->where('image_url', $filename)->first();
                                            if(empty($Arrimg))
                                            {
                                                if(!file_exists($filename))
                                                {
                                                    file_put_contents($filename, $photo->getContent());
                                                    $S3Path = $listings_id.'/img_'.$number.'.jpg';
                                                    $S3PathStoreImg = 'img_'.$number.'.jpg';
                                                    echo "\r\n";
                                                    echo "\r\n S3 path -> ". $S3Path;
                                                    echo "\r\n local filename path -> ".$filename;
                                                    $upload = $s3->upload(env('AWS_BUCKET'), $S3Path, fopen($filename, 'rb'), 'public-read');
                                                    $CreateArr['property_id']   = $listings_id;
                                                    $CreateArr['image_url']     = $filename;
                                                    $CreateArr['image_name']    = $S3PathStoreImg;
                                                    $CreateArr['is_download']   = 1;
                                                    $CreateArr['is_local']      = 1;
                                                    $O_PropertyImages  =  PropertyImages::create($CreateArr);
                                                    echo "\r\n O_PropertyImages ID --> ".$O_PropertyImages->id;
                                                    // unlink($filename);
                                                }
                                            }
                                        }
                                    }
                                    echo "\r\n";
                                    delete_directory($path);
                                }
                            } else {
                                echo "\r\n Inactive MSL MLSNumber :: ".$value['MLSNumber'];
                                Listing::InactiveListings($value['MLSNumber']);
                            }
                    	}
                        echo "\r\n totalAdded --> $this->totalAdded";
                    }
        		}
            }

        }


	}
}
