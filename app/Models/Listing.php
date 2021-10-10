<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\City;
use App\Models\Latlong;
use App\Models\Building;


class Listing extends Model
{
    protected $table = 'listings';
    
    protected $primaryKey = "id";
	
	protected $fillable = ['mls_id','address','agent_email','agent_name','balconies_space','bath','building_id',
							'city_id','county','description','dom','floor_space','latlong_id','mls_no',
							'mls_original_no','mls_type','modified_time','neighborhood_id',
                            'number_of_balconies', 'number_of_bedrooms','number_of_garages',
                            'number_of_parking_spaces','pets_allowed', 'pincode','price', 'state_id',
                            'status_id','year_built'];

	public static function AddListings($mlsMasterId = 0, $ArrFields = array(), $Arrdata=array())
    {
    	$ReturnArr = array();
        $ReturnArr['mls_id'] = $mlsMasterId;
    	foreach ($ArrFields as $key => $value)
        {
            if(!empty(trim($value->api_field)))
            {
                if(strpos(trim($value->api_field), ",") !== false )
                {
                	if(trim($value->db_field) == 'address')
                	{
                		$AddressArr = array();
                    	$arrex = explode(",", trim($value->api_field));
	                    foreach ($arrex as $arrf)
	                    {
	                        if(strpos(trim($arrf), "|") !== false )
	                        {
	                            $arrPex = explode("|", $arrf);
	                            foreach ($arrPex as $PipeF)
	                            {
	                            	if(isset($Arrdata[trim($PipeF)]) && !empty($Arrdata[trim($PipeF)]))
	                            	{
	                                	$AddressArr[trim($PipeF)] = $Arrdata[trim($PipeF)];
	                            	}
	                            }
	                        } else {
	                        	if(isset($Arrdata[trim($arrf)]) && !empty($Arrdata[trim($arrf)]))
	                        	{
	                            	$AddressArr[trim($arrf)] = $Arrdata[trim($arrf)];
	                        	}
	                        }
	                    }
	                    $ReturnArr[trim($value->db_field)] = implode(",", $AddressArr);
                	} else if(trim($value->db_field) == 'agent_name') {
                		$agent_name = array();
                    	$arrex = explode(",", trim($value->api_field));
	                    foreach ($arrex as $arrf)
	                    {
                        	if(isset($Arrdata[trim($arrf)]) && !empty($Arrdata[trim($arrf)]))
                        	{
                            	$agent_name[trim($arrf)] = $Arrdata[trim($arrf)];
                        	}
	                    }

	                    if(!empty($agent_name))
	                    {
	                    	$ReturnArr[$value->db_field] = implode(" ", $agent_name);
	                    }

                	} else if(trim($value->db_field) == 'floor_space') {
                    	
                    	$arrex = explode(",", trim($value->api_field));
	                    foreach ($arrex as $arrf)
	                    {
                        	if(isset($Arrdata[trim($arrf)]) && !empty($Arrdata[trim($arrf)]))
                        	{
                            	$ReturnArr[trim($arrf)] = $Arrdata[trim($arrf)];
                        	}
	                    }
                	}else if(trim($value->db_field) == 'building_id')
                    {
                        $ArrBuild = array();
                        $ArrFD = json_decode($value->api_field, true);
                        foreach ($ArrFD as $DB_FD => $B_API_fld)
                        {
                            if(isset($Arrdata[trim($B_API_fld)]) && !empty($Arrdata[trim($B_API_fld)]))
                            {
                                $ArrBuild[$DB_FD] = $Arrdata[trim($B_API_fld)];
                            }
                        }
                        $ReturnArr['building_id'] = Building::_GetBuildingID($ArrBuild);
                    }
                } else {

            		if(isset($Arrdata[trim($value->api_field)]))
                	{
                    	$ReturnArr[trim($value->db_field)] = $Arrdata[trim($value->api_field)];
                	}
                }
            }
        }


        if(isset($ReturnArr['state_id']) && !empty($ReturnArr['state_id'])) {
            $ArrState['state_code'] = $ReturnArr['state_id'];
			$ReturnArr['state_id'] = State::_GetStateID($ArrState);
        }else if(isset($ReturnArr['state_name']) && !empty($ReturnArr['state_name'])) {
        	$ArrState['state_name'] = $ReturnArr['state_name'];
            $ReturnArr['state_id'] = State::_GetStateID($ArrState);
        }else {
            $ReturnArr['state_id'] = 0;
        }
        
        if(isset($ReturnArr['city_id']) && !empty($ReturnArr['city_id']))
        {
			$Arrcity['city_name'] 	= $ReturnArr['city_id'];
			$Arrcity['state_id'] 	= $ReturnArr['state_id'];
			$city_id = City::_GetCityID($Arrcity);
        	$ReturnArr['city_id'] = $city_id;
        }else {
        	$ReturnArr['city_id'] = 0;
        }

        if(isset($ReturnArr['address']) && !empty($ReturnArr['address']))
        {
        	// echo "\r\n address -> ";
        	// print_r($ReturnArr['address']);
        	// echo "\r\n";
        	$addressmd5 = md5($ReturnArr['address']);
        	// echo "\r\n addressmd5 -> ";
        	// print_r($addressmd5);
        	// echo "\r\n";
        	$latlong_id = Latlong::_GetLatlongByAddressMD5($addressmd5);
        	if(!empty($latlong_id))
        	{
        		$ReturnArr['latlong_id'] = $latlong_id;
        	} else {
				$arrLatLong = Listing::_GetLatLongFromGoogle($ReturnArr['address']);
				if(isset($arrLatLong['latitude']) && isset($arrLatLong['longitude']))
				{
					$arrLatLong['addressmd5'] = $addressmd5;
	        		$ReturnArr['latlong_id'] = Latlong::_GetLatlongID($arrLatLong);
				} else {
	        		$ReturnArr['latlong_id'] = 0;
				}
        	}
        }else {
        	$ReturnArr['latlong_id'] = 0;
        }

        $ReturnArr['status_id'] = 1001;
        
        $isNew = 0;
        $E_Listing = Listing::where('mls_no',$ReturnArr['mls_no'])->first();
		if(!$E_Listing)
		{
    		$isNew = 1;
			// $E_Listing = new Listing();
            $E_Listing  =  Listing::create($ReturnArr);
		} else {
            $E_Listing->update($ReturnArr);
        }
        return ['isNew' => $isNew,'id' => $E_Listing->id];
    }

    public static function _GetLatLongFromGoogle($address)
    {
        if(!empty($address)) {
        	$address = str_replace("|","+",$address);
            $address = str_replace("&","+",$address);
            $address = str_replace(",", "+", $address);
            $address = str_replace(" ", "+", $address);
            $address = str_replace("#", "", $address);
            $arrContextOptions=array(
                                        "ssl"=>array(
                                            "verify_peer"=>false,
                                            "verify_peer_name"=>false,
                                        ),);
            $isGoogle = 0;
            $result = array();
            $lat = '';
            $long = '';
            if($isGoogle == 1)
            {
	            $key = 'AIzaSyC2a1bHkuNdORg5FbAkliHTSIBFpR_UPvY';
	            $url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=$key";
	            $json = file_get_contents($url, false, stream_context_create($arrContextOptions));
	            $json = json_decode($json);
	            $neighbourhood_id = '';
	            $neighborhood = '';

	            if(!isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'}))
	            {
	                $result['error'] = $json;
	                echo "\nGeocode Api Error \n";
	                print_r($json);
	                if($json->status != 'ZERO_RESULTS')
	                {
	                    die();
	                }
	            }else{
	                $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
	                $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	            }
            } else {
				$url = "https://geocoder.cit.api.here.com/6.2/geocode.json?searchtext=$address&app_id=1pQaElKI5BLYXbNszcuX&app_code=brGjzzBOQzURz_TaXST8pQ&gen=8";
	            // $json = file_get_contents($url, false, stream_context_create($arrContextOptions));
	            // $json = json_decode($json, true);
                $DataArr = ApiCAllCURL($url);
	            if(isset($DataArr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']))
	            {
	            	$lat 	= $DataArr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Latitude'];
	            	$long 	= $DataArr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Longitude'];
	            }
            }

            if(!empty($lat) && !empty($long))
            {
                $result['latitude'] = $lat;
                $result['longitude'] = $long;
            }
        }
        return $result;
    }

    public static function InactiveListings($mls_no='')
    {
        if(!empty($mls_no))
        {
            Listing::where('mls_no', $mls_no)->update(['status_id' => 1002]);
        }
    }

}
