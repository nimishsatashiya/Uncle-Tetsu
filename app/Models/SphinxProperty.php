<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
class SphinxProperty extends \Fobia\Database\SphinxConnection\Eloquent\Model {

    protected $table = 'listing';
    protected $connection = 'sphinx';
    public static function getProperty(){

        $propertyData = self::limit(4)/*->orderBy('id','desc')*/->get();

        $prData=array();
        $data=array();
        $propertyIdArr=array();
        if($propertyData){
            foreach ($propertyData as $key => $value) {
                //$prData[$key]['imgValue']=AWS_BUCKET_URL.$value->property_id.'/'.$value->image_name;
                $propertyIdArr[]=$value->id;
                $prData[$key]['property_id']=$value->id;
                $prData[$key]['address']=$value->address;
                $desc=$value->description;
                if($value->description==""){
                    $desc='Non possimus eos perferendis nulla eaque fugit quia nostrum. Consectetur quia odit expedita. Quia aut nihil voluptatibus natus minus ut non. Cumque atque vitae quod ipsa. Perspiciatis et sunt asperiores blanditiis.';
                }
                $prData[$key]['description']=$desc;
                $prData[$key]['bedrooms']=($value->number_of_bedrooms==''?0:$value->number_of_bedrooms);
                $prData[$key]['bath']=($value->bath==''?0:$value->bath);
                $prData[$key]['building_size']=($value->building_size==''?0:$value->building_size);
                $prData[$key]['year_built']=$value->year_built;
                $prData[$key]['price']=($value->price==''?0:$value->price);
            }
        }
        if($propertyIdArr){
            $imgData=PropertyImages::select('id','property_id','image_name')->whereIn('property_id',$propertyIdArr)
                    ->where('image_name','!=','img_0.jpg')
                    ->orderBy('id','asc')
                    ->groupBy('property_id')->get();
            if($imgData){
                foreach ($imgData as $imkey => $imvalue) {
                    $imgArr[$imvalue->property_id]=AWS_BUCKET_URL.$imvalue->property_id.'/'.$imvalue->image_name;
                }
            }
        }
        $data['propertyData']=$prData;
        $data['propertyImg']=$imgArr;
        return $data;
    }

    public static function getFeaturedProperty(){

        $propertyData = self::limit(6)/*->orderBy('id','desc')*/->get();

        $prData=array();
        $data=array();
        $idArr=array();
        $propertyIdArr=array();
        if($propertyData){
            foreach ($propertyData as $key => $value) {
                $propertyIdArr[]=$value->id;
                $prData[$key]['property_id']=$value->id;
                $prData[$key]['address']=$value->address;
                $desc=$value->description;
                if($value->description==""){
                    $desc='Non possimus eos perferendis nulla eaque fugit quia nostrum. Consectetur quia odit expedita. Quia aut nihil voluptatibus natus minus ut non. Cumque atque vitae quod ipsa. Perspiciatis et sunt asperiores blanditiis.';
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
                $prData[$key]['description']=$desc;
                $prData[$key]['bedrooms']=($value->number_of_bedrooms==''?0:$value->number_of_bedrooms);
                $prData[$key]['bath']=($value->bath==''?0:$value->bath);
                $prData[$key]['building_size']=($value->building_size==''?0:$value->building_size);
                $prData[$key]['year_built']=$value->year_built;
                $prData[$key]['price']=($value->price==''?0:$value->price);
                $prData[$key]['dom']=($value->dom==''?0:$value->dom);
            }
        }
        // dd($propertyIdArr);
        if($propertyIdArr){
            $imgData=PropertyImages::select('id','property_id','image_name')
                ->whereIn('property_id',$propertyIdArr)
                ->get();
                // dd($imgData);
            $cntId=0;
            $imgId=0;
            if($imgData){
                foreach ($imgData as $imkey => $imvalue) {
                    if($imgId==$imvalue->property_id){
                        $cntId=$cntId+1; 
                    }else{
                        $cntId=1;
                    }
                    $imgId=$imvalue->property_id;
                    if($cntId<=5){
                        $imgArr[$imvalue->property_id][$imvalue->id]=AWS_BUCKET_URL.$imvalue->property_id.'/'.$imvalue->image_name;
                    }
                }
            }
        }
        // echo '<pre>';
        // print_r($imgArr);
        // exit;
        $data['prFeatureData']=$prData;
        $data['prFeatureImg']=$imgArr;
        return $data;
    }
} 