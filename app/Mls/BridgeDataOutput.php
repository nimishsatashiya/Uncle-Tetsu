<?php
namespace App\Mls;

use App\Models\CustomXMLParser;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\MlsFieldsMapping;
use App\Models\PropertyImages;
use App\Models\Listing;
use App\Models\MlsClass;
use Aws\S3\S3Client;
use File;

class BridgeDataOutput
{
	public $totalAdded = 0;
	protected $rets = 0;
	protected $options = [];
	protected $mlsMasterId = 0;
    protected $Is_onetime = 0;
    protected $ArrSelectFields = [];
    protected $API_URL = '';
    protected $ServerToken = '';

    public function __construct($options)
    {
    	$this->options = $options;
    	$this->doLogin();    	
    }

    public function doLogin(){

        $this->mlsMasterId    = $this->options['id'];
        $this->API_URL        = $this->options['url'];
        $this->ServerToken    = $this->options['token'];
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

        		$className = "Properties";
                $mls_class_id       = $ArrClass->id;
                $className          = $ArrClass->class_name;
                $last_import_date   = $ArrClass->last_import_date;
                $last_offset        = $ArrClass->last_offset;

                if(strtolower($className) == 'listings')
                {
                    $this->_StartProcessForListing($className,$mls_class_id, $last_offset,$last_import_date);
                }else {
                    $this->_StartProcessForProperties($className,$mls_class_id, $last_offset,$last_import_date);
                }

                $this->ArrSelectFields = MlsFieldsMapping::where("mls_id",$this->mlsMasterId)
                                                        ->where('mls_class_id', $mls_class_id)
                                                        ->get();
                /*$selectFields = MlsFieldsMapping::ProcessFieldsForSelect($this->ArrSelectFields);
                $selectFields = implode(",", $selectFields);
                $filter ='$filter';
                $select ='$select='.$selectFields;
                $top = '$top';
                $skip = '$skip';
                $limit = 100;
                $offset = $last_offset;
                $maxrows = true;
                while($maxrows)
                {
                    echo "\r\n offset :: ".$offset;
                    MlsClass::where('id', $mls_class_id)->update(['last_offset' => $offset]);

                    if(strtolower($className) == 'listings')
                    {
                        $this->API_URL = $this->API_URL.'/test/';
                    }else {
                        $this->API_URL = $this->API_URL.'/OData/test/';
                    }
                    // $this->API_URL = "https://api.bridgedataoutput.com/api/v2/test/";
                    $baseURL = $this->API_URL.$className."?access_token=".$this->ServerToken;
                    $AddSelect = "&{$select}";
                    $AddLimiTOffset = "&$top={$limit}&$skip={$offset}";
                    $AddFilter = '&';
                    if(strtolower($className) == 'listings')
                    {
                        $AddLimiTOffset = "&offset={$offset}&limit={$limit}";
                        $AddSelect ='&fields='.$selectFields;
                    }else {
                        $AddFilter = "&".$filter."=";
                    }

                    $baseURL = $baseURL.$AddSelect.$AddLimiTOffset.$AddFilter;
                    echo "\r\n baseURL :: ".$baseURL;
                    $offset = ($offset + $limit);
                    $lastDate = date("Y-m-d 00:00:00",strtotime("2017-01-01"));
                    if(!empty($last_import_date))
                    {
                        $lastDate = $last_import_date;
                    }
                    $lastDate = str_replace(' ', 'T', $lastDate);
                    $Query = "tolower(MlsStatus) eq 'active' and ModificationTimestamp gt $lastDate";
                    // $Query = "ModificationTimestamp gt $lastDate";
                    if(strtolower($className) == 'listings')
                    {
                        // $Query = "MlsStatus=active&ModificationTimestamp.gt=$lastDate";
                        $Query = "ModificationTimestamp.gte=$lastDate";
                    }else {
                        $Query = urlencode($Query);
                    }
                    // $Query = "ListingId eq '190013408'";
                    // echo "\r\n :: ".$Query;
                    $GetDataURL = $baseURL.$Query;
                    // $GetDataURL = $baseURL;
                    // $GetDataURL = "https://api.bridgedataoutput.com/api/v2/OData/test/Properties?access_token={$this->ServerToken}";
                    // $GetDataURL = "https://api.bridgedataoutput.com/api/v2/OData/DataSystem?access_token={$this->ServerToken}";
                    // $GetDataURL = "https://api.bridgedataoutput.com/api/v2/test/listings?access_token={$this->ServerToken}";
                    // $GetDataURL = "https://api.bridgedataoutput.com/api/v2/test/listings?access_token=6baca547742c6f96a6ff71b138424f21&offset=1&limit=100&fields=ListingId&MlsStatus=active&ModificationTimestamp.gt=2017-01-01T00:00:00";
                    echo "\r\n--- ".$GetDataURL;
                    $ArrData = BridgeApiCAllCURL($GetDataURL);
                    print_r($ArrData);
                    exit();
                    
                    if (isset($ArrData['value']))
                    {
                        $totalRecords           = $ArrData['@odata.count'];
                        $currentTotalRecords    = count($ArrData['value']);
                        echo "\r\n ($className) Overall Total Records : ".$totalRecords."\n";
                        echo "\r\n ($className) Current Offset Total Records : ".$currentTotalRecords."\n";
                        
                        foreach ($ArrData['value'] as $key => $value)
                        {
                            if(strtolower($value['MlsStatus']) == 'active')
                            {
                                $modelRes       = Listing::AddListings($this->mlsMasterId, $this->ArrSelectFields, $value);
                                $listings_id    = $modelRes['id'];
                                $isNew          = $modelRes['isNew'];
                                echo "\r\n listings_id --> ".$listings_id;
                                echo "\r\n isNew --> ".$isNew;
                                $this->totalAdded++;
                                // echo "\n $this->totalAdded";
                                if(isset($value['PhotosCount']) && $value['PhotosCount'] > 0)
                                {
                                    if(isset($value['Media']))
                                    {
                                        foreach ($value['Media'] as $ArrMedia)
                                        {
                                            PropertyImages::DownloadImageDirect($listings_id, $ArrMedia['MediaURL']);
                                        }
                                    }
                                }
                            } else {
                                echo "\r\n Inactive MSL ListingId :: ".$value['ListingId'];
                                Listing::InactiveListings($value['ListingId']);
                            }
                        }
                        echo "\r\n totalAdded --> $this->totalAdded";
                    } else {
                        echo "\r\n API is not Working ";
                        MlsClass::where('id', $mls_class_id)->update(['last_import_date' => date("Y-m-d H:i:s"), 'last_offset' => 1]);
                        $maxrows = false;
                        continue;
                    }

                    if(!isset($ArrData['@odata.nextLink']))
                    {
                        MlsClass::where('id', $mls_class_id)->update(['last_import_date' => date("Y-m-d H:i:s"), 'last_offset' => 1]);
                        $maxrows = false;
                        continue;
                    }
                }*/
            }
        }
	}

    public function _StartProcessForProperties($className='', $mls_class_id='', $last_offset=1,$last_import_date='')
    {
        $this->ArrSelectFields = MlsFieldsMapping::where("mls_id",$this->mlsMasterId)
                                                        ->where('mls_class_id', $mls_class_id)
                                                        ->get();
        $selectFields = MlsFieldsMapping::ProcessFieldsForSelect($this->ArrSelectFields);
        $selectFields = implode(",", $selectFields);
        $filter ='$filter';
        $select ='$select='.$selectFields;
        $top = '$top';
        $skip = '$skip';
        $limit = 100;
        $offset = $last_offset;
        $maxrows = true;
        $Current_API_URL = $this->API_URL.'/OData/test/';

        while($maxrows)
        {
            echo "\r\n offset :: ".$offset;
            MlsClass::where('id', $mls_class_id)->update(['last_offset' => $offset]);

            $baseURL = $Current_API_URL.$className."?access_token=".$this->ServerToken;
            $AddSelect = "&{$select}";
            $AddLimiTOffset = "&$top={$limit}&$skip={$offset}";
            $AddFilter = "&".$filter."=";
            $baseURL = $baseURL.$AddSelect.$AddLimiTOffset.$AddFilter;
            echo "\r\n baseURL :: ".$baseURL;
            $offset = ($offset + $limit);
            $lastDate = date("Y-m-d 00:00:00",strtotime("2017-01-01"));

            if(!empty($last_import_date))
            {
                $lastDate = $last_import_date;
            }
            $lastDate = str_replace(' ', 'T', $lastDate);
            $Query = "tolower(MlsStatus) eq 'active' and ModificationTimestamp gt $lastDate";
            // $Query = "ModificationTimestamp gt $lastDate";

            $Query = urlencode($Query);

            $GetDataURL = $baseURL.$Query;
            
            echo "\r\n--- ".$GetDataURL;

            $ArrData = BridgeApiCAllCURL($GetDataURL);

            if (isset($ArrData['value']))
            {
                $totalRecords           = $ArrData['@odata.count'];
                $currentTotalRecords    = count($ArrData['value']);
                echo "\r\n ($className) Overall Total Records : ".$totalRecords."\n";
                echo "\r\n ($className) Current Offset Total Records : ".$currentTotalRecords."\n";
                
                foreach ($ArrData['value'] as $key => $value)
                {
                    if(strtolower($value['MlsStatus']) == 'active')
                    {
                        $modelRes       = Listing::AddListings($this->mlsMasterId, $this->ArrSelectFields, $value);
                        $listings_id    = $modelRes['id'];
                        $isNew          = $modelRes['isNew'];
                        echo "\r\n listings_id --> ".$listings_id;
                        echo "\r\n isNew --> ".$isNew;
                        $this->totalAdded++;
                        // echo "\n $this->totalAdded";
                        if(isset($value['PhotosCount']) && $value['PhotosCount'] > 0)
                        {
                            if(isset($value['Media']))
                            {
                                foreach ($value['Media'] as $ArrMedia)
                                {
                                    PropertyImages::DownloadImageDirect($listings_id, $ArrMedia['MediaURL']);
                                }
                            }
                        }
                    } else {
                        echo "\r\n Inactive MSL ListingId :: ".$value['ListingId'];
                        Listing::InactiveListings($value['ListingId']);
                    }
                }
                echo "\r\n totalAdded --> $this->totalAdded";
            } else {
                echo "\r\n API is not Working ";
                MlsClass::where('id', $mls_class_id)->update(['last_import_date' => date("Y-m-d H:i:s"), 'last_offset' => 1]);
                $maxrows = false;
                continue;
            }

            if(!isset($ArrData['@odata.nextLink']))
            {
                MlsClass::where('id', $mls_class_id)->update(['last_import_date' => date("Y-m-d H:i:s"), 'last_offset' => 1]);
                $maxrows = false;
                continue;
            }
        }
    }

    public function _StartProcessForListing($className='', $mls_class_id='', $last_offset=1,$last_import_date='')
    {
        $this->ArrSelectFields = MlsFieldsMapping::where("mls_id",$this->mlsMasterId)
                                                        ->where('mls_class_id', $mls_class_id)
                                                        ->get();

        $selectFields = MlsFieldsMapping::ProcessFieldsForSelect($this->ArrSelectFields);
        $selectFields = implode(",", $selectFields);
        $limit = 100;
        $offset = $last_offset;
        $maxrows = true;
        $Current_API_URL = $this->API_URL.'/test/';

        while($maxrows)
        {
            echo "\r\n offset :: ".$offset;
            MlsClass::where('id', $mls_class_id)->update(['last_offset' => $offset]);

            $baseURL = $Current_API_URL.$className."?access_token=".$this->ServerToken;
            $AddFilter = '&';
            $AddLimiTOffset = "&offset={$offset}&limit={$limit}";
            $AddSelect ='&fields='.$selectFields;
            $baseURL = $baseURL.$AddSelect.$AddLimiTOffset.$AddFilter;
            // echo "\r\n baseURL :: ".$baseURL;
            $offset = ($offset + $limit);
            $lastDate = date("Y-m-d 00:00:00",strtotime("2017-01-01"));
            if(!empty($last_import_date))
            {
                $lastDate = $last_import_date;
            }
            $lastDate = str_replace(' ', 'T', $lastDate);
            
            $Query = "ModificationTimestamp.gte=$lastDate";
            $Query = "MlsStatus=active&ModificationTimestamp.gt=$lastDate";

            $GetDataURL = $baseURL.$Query;
            echo "\r\n--- ".$GetDataURL;
            $ArrData = BridgeApiCAllCURL($GetDataURL);

            if (isset($ArrData['bundle']) && count($ArrData['bundle']) > 0)
            {
                $totalRecords           = $ArrData['total'];
                $currentTotalRecords    = count($ArrData['bundle']);
                echo "\r\n ($className) Overall Total Records : ".$totalRecords."\n";
                echo "\r\n ($className) Current Offset Total Records : ".$currentTotalRecords."\n";
                
                foreach ($ArrData['bundle'] as $key => $value)
                {
                    if(strtolower($value['MlsStatus']) == 'active')
                    {
                        $modelRes       = Listing::AddListings($this->mlsMasterId, $this->ArrSelectFields, $value);
                        $listings_id    = $modelRes['id'];
                        $isNew          = $modelRes['isNew'];
                        echo "\r\n listings_id --> ".$listings_id;
                        echo "\r\n isNew --> ".$isNew;
                        $this->totalAdded++;
                        echo "\r\n $this->totalAdded";
                        if(isset($value['PhotosCount']) && $value['PhotosCount'] > 0)
                        {
                            if(isset($value['Media']))
                            {
                                foreach ($value['Media'] as $ArrMedia)
                                {
                                    PropertyImages::DownloadImageDirect($listings_id, $ArrMedia['MediaURL']);
                                }
                            }
                        }
                    } else {
                        echo "\r\n Inactive MSL ListingId :: ".$value['ListingId'];
                        Listing::InactiveListings($value['ListingId']);
                    }
                }
                echo "\r\n totalAdded --> $this->totalAdded";
            } else {
                echo "\r\n API is not Working ";
                $maxrows = false;
                continue;
            }
            
            if($limit > count($ArrData['bundle']))
            {
                MlsClass::where('id', $mls_class_id)->update(['last_import_date' => date("Y-m-d H:i:s"), 'last_offset' => 1]);
                $maxrows = false;
                continue;
            }
        }
    }


}
