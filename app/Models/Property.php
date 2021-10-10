<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyImages;

class Property extends Model
{
    protected $table = TBL_PROPERTIES;
    public $timestamps = true;
    protected $primaryKey = "id";
    
    protected $fillable = ['id', 'mls_id', 'mls_no','mls_original_no','city_id', 'state_id', 'pincode','address','price', 'bath', 'year_built','dom','mls_type', 'county', 'agent_email','agent_name','floor_space', 'balconies_space', 'neighborhood_id','number_of_balconies','number_of_bedrooms', 'number_of_garages', 'number_of_parking_spaces','pets_allowed','description', 'status_id', 'latlong_id','building_id','modified_time'];

    
    

    public static function AddProperties($Arrdata)
    {
        $isNew = 0;
    	$E_Property = Property::where('MlsListingID',$Arrdata['MlsListingID'])->first();

		if(!$E_Property)
		{
            $isNew = 1;
			$E_Property = new Property();
		}

        $address = null;
		// $E_Property = new Propertie();
        // $address = Propertie::_GenerateAddress($Arrdata['AreaNumber'],$Arrdata['StreetName'],$Arrdata['CityName'],$Arrdata['StateName'],$Arrdata['PostalCode']);
        // $ArrLatLong = Propertie::GetLatLongFromGoogle($address);
        // if(isset($ArrLatLong['lat']) && isset($ArrLatLong['lng']))
        // {
        //     $E_Property->lat        = $ArrLatLong['lat'];
        //     $E_Property->lng        = $ArrLatLong['lng'];
        // }

        $E_Property->MlsMasterId 		= $Arrdata['MlsMasterId'];
        $E_Property->MlsListingID       = $Arrdata['MlsListingID'];
        
        if(isset($Arrdata['OrigListingID'])){
            $E_Property->MlsOrgMasterId       = $Arrdata['OrigListingID'];
        }

        $E_Property->MlsPropertyID 		= $Arrdata['MlsPropertyID'];
        $E_Property->MlsOrgMasterId     = $Arrdata['MlsOrgMasterId'];
        $E_Property->PropertyType 		= $Arrdata['PropertyType'];
        $E_Property->Price 				= $Arrdata['Price'];
        $E_Property->Name 				= $Arrdata['Name'];
        $E_Property->className          = $Arrdata['className'];

        $E_Property->AreaNumber 		= $Arrdata['AreaNumber'];
        $E_Property->StreetName         = $Arrdata['StreetName'];
        $E_Property->CityName           = $Arrdata['CityName'];
        $E_Property->StateName          = $Arrdata['StateName'];
        $E_Property->PostalCode         = $Arrdata['PostalCode'];
        $E_Property->Address            = $address;
        $E_Property->PhotoCount 		= isset($Arrdata['PhotoCount'])?$Arrdata['PhotoCount']:0;
        $E_Property->MlsStatus 			= $Arrdata['MlsStatus'];
        $E_Property->ModificationTime 	= $Arrdata['ModificationTime'];

        $E_Property->save();
        return ['isNew' => $isNew,'id' => $E_Property->Id];
    }

    public static function _GenerateAddress($AreaNumber,$StreetName,$CityName,$StateName,$PostalCode)
    {
        $address = "";
        if(!empty($AreaNumber)) {
            $address .= $AreaNumber." ";
        }

        if(!empty($StreetName)) {
            $address .= $StreetName." ";
        }

        if(!empty($CityName)) {
            $address .= $CityName." ";
        }

        if(!empty($StateName)) {
            $address .= $StateName." ";
        }

        if(!empty($PostalCode)) {
            $address .= $PostalCode." ";
        }

        $address = trim($address);
        return $address;
    }

    public static function GetLatLongFromGoogle($address)
    {
        if(!empty($address)) {
            $address = str_replace(" ", "+", $address);
            $address = str_replace("#", "", $address);
            
            $key = 'AIzaSyBCadlMfYfsS7MriDXM8sqVsDD-u74hbCU';
            $arrContextOptions=array(
                                        "ssl"=>array(
                                            "verify_peer"=>false,
                                            "verify_peer_name"=>false,
                                        ),);  
            $url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=$key";
            // $url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
            $json = file_get_contents($url, false, stream_context_create($arrContextOptions));
            $json = json_decode($json);

            $lat = '';
            $long = '';
            $neighbourhood_id = '';
            $neighborhood = '';
            $result['lat'] = ''; 
            $result['lng'] = '';
            
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

            if(!empty($lat) && !empty($long))
            {
                $result['lat'] = $lat;
                $result['lng'] = $long;
            }
        }
        return $result;
    }
    public static function HomeSliderImages(){
        \DB::enableQueryLog();
        $propertyData=Listing::select(TBL_PROPERTY_IMAGES.".property_id",TBL_PROPERTY_IMAGES.'.image_name',TBL_PROPERTIES.".address",TBL_PROPERTIES.".description",TBL_PROPERTIES.".number_of_bedrooms",TBL_PROPERTIES.".bath",TBL_BUILDINGS.".building_size",TBL_PROPERTIES.".year_built",TBL_PROPERTIES.".price")
        ->join(TBL_PROPERTY_IMAGES,TBL_PROPERTIES.".id","=",TBL_PROPERTY_IMAGES.".property_id")
        ->join(TBL_BUILDINGS,TBL_PROPERTIES.".building_id","=",TBL_BUILDINGS.".id")
        ->whereNotNull(TBL_PROPERTY_IMAGES.'.image_name')
        ->whereNotNull(TBL_PROPERTIES.'.building_id')
        ->whereNotNull(TBL_PROPERTIES.'.description')
        ->where(TBL_PROPERTIES.'.status_id',Admin::$PROPERTY_STATUS)
        ->where(TBL_PROPERTY_IMAGES.'.image_name','!=','img_1.jpg')
        ->where(\DB::raw("CHAR_LENGTH(description)"), '>' ,99)
        ->groupBy(TBL_PROPERTIES.".description")
        ->orderBy(TBL_PROPERTIES.'.id','desc')
        ->limit(4)->get();
        // dd(\DB::getQueryLog());
        $prData=array();
        if($propertyData){
            foreach ($propertyData as $key => $value) {
                $prData[$key]['imgValue']=AWS_BUCKET_URL.$value->property_id.'/'.$value->image_name;
                $prData[$key]['address']=$value->address;
                $prData[$key]['description']=$value->description;
                $prData[$key]['bedrooms']=($value->number_of_bedrooms==''?0:$value->number_of_bedrooms);
                $prData[$key]['bath']=($value->bath==''?0:$value->bath);
                $prData[$key]['building_size']=($value->building_size==''?0:$value->building_size);
                $prData[$key]['year_built']=$value->year_built;
                $prData[$key]['price']=($value->price==''?0:$value->price);
            }
        }
        // dd($prData);
        return $prData;
   }
   public static function HomeFeaturedProperties()
   {
       $propertyData=Listing::select(TBL_PROPERTY_IMAGES.".property_id",TBL_PROPERTY_IMAGES.'.image_name',TBL_PROPERTIES.".address",TBL_PROPERTIES.".description",TBL_PROPERTIES.".number_of_bedrooms",TBL_PROPERTIES.".bath",TBL_BUILDINGS.".building_size",TBL_PROPERTIES.".year_built",TBL_PROPERTIES.".price",TBL_PROPERTIES.".dom")
        ->join(TBL_PROPERTY_IMAGES,TBL_PROPERTIES.".id","=",TBL_PROPERTY_IMAGES.".property_id")
        ->join(TBL_BUILDINGS,TBL_PROPERTIES.".building_id","=",TBL_BUILDINGS.".id")
        ->whereNotNull(TBL_PROPERTY_IMAGES.'.image_name')
        ->whereNotNull(TBL_PROPERTIES.'.building_id')
        ->whereNotNull(TBL_PROPERTIES.'.description')
        ->where(TBL_PROPERTIES.'.description','!=',"")
        ->where(TBL_PROPERTIES.'.status_id',Admin::$PROPERTY_STATUS)
        ->where(TBL_PROPERTY_IMAGES.'.image_name','!=','img_0.jpg')
        // ->where(\DB::raw("CHAR_LENGTH('description')"), '>' ,20)
        ->groupBy(TBL_PROPERTIES.".description")
        ->orderBy(TBL_PROPERTIES.'.id','asc')
        ->limit(6)->get();

        $prData=array();
        if($propertyData){
            $favorite='';
            foreach ($propertyData as $key => $value) {

                $imgData=PropertyImages::where('property_id',$value->property_id)
                ->where('image_name','!=','img_0.jpg')
                ->orderBy('id','asc')
                ->limit(3)->get();
                $imgArr=array();
                foreach ($imgData as $imkey => $imvalue) {
                    $imgArr[$imvalue->id]=AWS_BUCKET_URL.$value->property_id.'/'.$imvalue->image_name;
                }
                if(\Auth::user()){
                    $user_id=\Auth::user()->id;
                    $favoriteData=FavoriteProperty::where('property_id',$value->property_id)->where('user_id',$user_id)->first();
                    if($favoriteData){
                        $prData[$key]['favorite_id']=1;
                    }else{
                        $prData[$key]['favorite_id']=0;
                    }
                }else{
                    $prData[$key]['favorite_id']=0;
                }
                $prData[$key]['dom']=$value->dom;
                $prData[$key]['property_id']=$value->property_id;
                $prData[$key]['img']=$imgArr;
                $prData[$key]['address']=$value->address;
                $prData[$key]['description']=$value->description;
                $prData[$key]['bedrooms']=($value->number_of_bedrooms==''?0:$value->number_of_bedrooms);
                $prData[$key]['bath']=($value->bath==''?0:$value->bath);
                $prData[$key]['building_size']=($value->building_size==''?0:$value->building_size);
                $prData[$key]['year_built']=$value->year_built;
                $prData[$key]['price']=($value->price==''?0:$value->price);
            }
        }
        // dd($prData);
        return $prData;

   }
   public static function HomeReview()
   {
        $review[0]['reviewData']="I really enjoyed my experience working with iPro. They were very knowledgeable about the Structure of Garden Grove and very proactive when it came to helping me find a home that was tailored to my liking. I like how they negotiated with the sellers to get what I want fixed. They were good with communication and able to relay information quickly.
        I enjoyed doing business and will recommend to my good friends.";
        $review[0]['reviewAgent']="Donna Clark";
        $review[0]['rAgentStatus']="Salesperson";
        $review[0]['rAgentPage']="Brett Dalbeth";

        $review[1]['reviewData']="It was truly a pleasure to work with a truly professional and caring team that went out of their way to ensure that we were taken care of in all aspects of this sale.";
        $review[1]['reviewAgent']="Donna Clark";
        $review[1]['rAgentStatus']="Salesperson";
        $review[1]['rAgentPage']="Brett Dalbeth";

        $review[2]['reviewData']="I've been in the Real Estate industry for several years and licensed as a California REALTOR' since 2007. I've had the opportunity to work with a variety of large and small Real Estate firms and had mixed experiences with each. I've been with iPro since May 2013 and have had nothing short of an excellent experience combined with integrity and honesty. Their simple compensation plan is second to none. iPro has turned out to be perfect for my niche market and flexible enough so I can run my business just the way I like it. Paperless online transaction management and the option to request payment through escrow or direct deposit saves me time and money allowing me to increase my marketing budget for my clients.";
        $review[2]['reviewAgent']="Donna Clark";
        $review[2]['rAgentStatus']="Salesperson";
        $review[2]['rAgentPage']="Brett Dalbeth";

        return $reviewData=$review;
   }
   public static function HomeMember()
   {
        $memberData[0]['member_img']="agent-3.jpg";
        $memberData[0]['member_name']="Nathan James";
        $memberData[0]['member_contact']="234-456-7893";
        $memberData[0]['member_email']="nathanjames@iprore.com";
        $memberData[0]['member_total_reviw']="4";

        $memberData[1]['member_img']="agent-4.jpg";
        $memberData[1]['member_name']="Melissa William";
        $memberData[1]['member_contact']="234-456-7893";
        $memberData[1]['member_email']="melissawilliam@iprore.com";
        $memberData[1]['member_total_reviw']="5";

        $memberData[2]['member_img']="agent-2.jpg";
        $memberData[2]['member_name']="Alice Brian";
        $memberData[2]['member_contact']="234-456-7893";
        $memberData[2]['member_email']="alicebrian@iprore.com";
        $memberData[2]['member_total_reviw']="2";

        $memberData[3]['member_img']="agent-1.jpg";
        $memberData[3]['member_name']="John David";
        $memberData[3]['member_contact']="234-456-7893";
        $memberData[3]['member_email']="johndavid@iprore.com";
        $memberData[3]['member_total_reviw']="2";

        return $memberData;
   }
   public static function HomeNewsTips()
   {
        $newsData[0]['news_img']="REALTOR-11.jpg";
        $newsData[0]['news_title']="REALTORS: 5 ways systems can improve your real estate business and work-life balance";
        $newsData[0]['news_desc']="Systems will catalyze your health, creativity and business growth How do you help more clients without feeling like the marrow has been sucked from your bones? Many top producing real estate agents struggle with maintaining a balanced life while hammering out multiple deals. Let's face it, people want your help. Yet, it could come...";

        $newsData[1]['news_img']="family-sold-sign.jpg";
        $newsData[1]['news_title']="Is Salt Lake City the 'Next Denver'?";
        $newsData[1]['news_desc']="Salt Lake City is quickly becoming one of the hottest housing markets in the country, and researchers note that home prices there are following a similar growth pattern as in Denver, where rapid increases began in early 2015. Realtor.com® projects that Salt Lake City will have one of the strongest housing markets in the nation...";

        $newsData[2]['news_img']="21.jpg";
        $newsData[2]['news_title']="FOR SALE $499K - 2008 Torin St, Lewisville, TX 75056 listed by Benny Thomas?";
        $newsData[2]['news_desc']="FOR SALE 2008 Torin St Lewisville, TX 75056 Price: $499,000 Year Built: 2012 Bed / Bath: 4 / 3.1 Pool: Private, Community Sqft: 3,262 MLS # 13771289 Immaculate Condition! Original individual owner with no pets in Highly Sought After Castle Hills Community. Gorgeous back yard with arbor ready for entertaining. Pool features swim jets...";

        $newsData[3]['news_img']="iPro_BC-21.jpg";
        $newsData[3]['news_title']="Welcome to the Team Kimberly Gardner Dealing the DFW Metroplex";
        $newsData[3]['news_desc']="About Kim In all I do I value having and using the values that are needed to get the job done right, on time, and with excellence. You will know that you were treated with the right values. iPro currently deals throughout the states of California, Texas, Florida and New York. We continue to strive and broaden opportunities for real...";

        $newsData[4]['news_img']="5.jpg";
        $newsData[4]['news_title']="Builder Lets Consumers Design Its Model Homes";
        $newsData[4]['news_desc']="Taylor Morrison Home Corp. is allowing home shoppers to have more say in the design of its model homes in Arizona, California, and Texas. Consumers can vote online for design amenities like flooring, cabinetry, paint colors, and countertops. The features that nab the most votes will be built into model homes in the Structure. Consumers...";

        $newsData[5]['news_img']="6.jpg";
        $newsData[5]['news_title']="First-Time Buyers May Have it Easiest Here";
        $newsData[5]['news_desc']="First-time home buyers are entering the market under tight inventory conditions and rising home prices. But not all cities are posing a challenge for those looking to break in to homeownership. A new study by LendingTree ranks the top cities for first-time home buyers in the nation's 100 largest cities. They factored in average down...";

        $newsData[6]['news_img']="REALTOR-11.jpg";
        $newsData[6]['news_title']="REALTORS: 5 ways systems can improve your real estate business and work-life balance";
        $newsData[6]['news_desc']="Systems will catalyze your health, creativity and business growth How do you help more clients without feeling like the marrow has been sucked from your bones? Many top producing real estate agents struggle with maintaining a balanced life while hammering out multiple deals. Let's face it, people want your help. Yet, it could come...";

        $newsData[7]['news_img']="8.jpg";
        $newsData[7]['news_title']="NAR Clears Up Speculation Over VOW Agreement";
        $newsData[7]['news_desc']="Real estate media outlets have been on a quest in recent weeks to imagine what might happen when a 10-year agreement between the National Association of REALTORS® and the Department of Justice comes to an end in November. The agreement centers on how MLS rules treat virtual office websites for real estate brokerages that operate...";

        $newsData[8]['news_img']="9.jpg";
        $newsData[8]['news_title']="'Tiny Homes' May Have a Wider Buyer Pool";
        $newsData[8]['news_desc']="The tiny-home movement has been a popular topic among design television shows in recent years, but there was some debate about whether it was truly a lasting trend or not. But a new survey confirms that consumers are definitely intrigued by smaller homes, often described as less than 600 square feet. More than half of...";

        return $newsData;
   }
   public static function HomePartners()
   {
        $partnerData[0]['partner_url']="https://www.supportourtroops.org/";
        $partnerData[0]['partner_img']="sot_g.png";

        $partnerData[1]['partner_url']="http://www.treehouseforkids.org/";
        $partnerData[1]['partner_img']="th_g.png";

        $partnerData[2]['partner_url']="http://www.createtolearn.org/";
        $partnerData[2]['partner_img']="ctl_g.png";

        $partnerData[3]['partner_url']="http://www.iprorecords.com";
        $partnerData[3]['partner_img']="iprologo6_g.png";

        $partnerData[4]['partner_url']="https://www.nar.realtor/";
        $partnerData[4]['partner_img']="nst_g.png";

        $partnerData[5]['partner_url']="https://www.zillow.com/";
        $partnerData[5]['partner_img']="zill_g.png";

        return $partnerData;
   }
    
}
