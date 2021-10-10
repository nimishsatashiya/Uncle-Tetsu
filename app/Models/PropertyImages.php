<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Aws\S3\S3Client;
use File;

class PropertyImages extends Model
{
    protected $table = 'property_images';
    
    protected $guarded = [];


    public static function saveImages($id, $images)
    {
    	// \App\Models\PropertyImages::where("property_id",$id)->delete();
    	foreach($images as $image)
    	{
            if(!empty($image['MediaURL']))
            {
                // $image['MediaURL'] = $image['MediaURL'].'/ass';
                $Arrimg = PropertyImages::where("property_id",$id)
                                ->where('image_url', $image['MediaURL'])
                                ->first();
                if(empty($Arrimg))
                {
            		$imageUrl = $image['MediaURL'];
            		$obj = new \App\Models\PropertyImages();
            		$obj->property_id = $id;
            		$obj->image_url = $imageUrl;
            		$obj->save();
            		unset($obj);
                }
            }
    	}
    }


    public static function DownloadImageDirect($listings_id=0, $image_url='', $username = '',$password = '')
    {
        if(!empty($listings_id) && !empty($image_url))
        {
            $Arrimg = PropertyImages::where("property_id",$listings_id)->where('image_url', $image_url)->first();
            if(empty($Arrimg))
            {
                $s3 = S3Client::factory(array(
                                    'credentials' => array(
                                        'key' => env('AWS_ACCESS_KEY_ID'),
                                        'secret' => env('AWS_SECRET_ACCESS_KEY')
                                    ),
                                    'version' => 'latest',
                                    'region'  => env('AWS_REGION')
                                ));
                echo "\r\n";
                // echo "\r\n image_url --> ".$image_url;
                $CreateArr['property_id']   = $listings_id;
                $CreateArr['image_url']     = $image_url;
                $CreateArr['is_download']   = 0;
                $CreateArr['is_local']      = 0;
                $O_PropertyImages  =  PropertyImages::create($CreateArr);
                // echo "\r\n O_PropertyImages ID --> ".$O_PropertyImages->id;
                $property_images_id = 0;
                if(isset($O_PropertyImages->id))
                {
                    $property_images_id = $O_PropertyImages->id;
                }

                if(!empty($property_images_id))
                {
                    $imgData =  DownloadImageByCURL($image_url, $username, $password);
                    $path    = public_path('property_img/'.$listings_id);
                    if(!File::isDirectory($path))
                    {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $filename = $path.''.'/img_'.$property_images_id.'.jpg';
                    file_put_contents($filename, $imgData);
                    $S3Path = $listings_id.'/img_'.$property_images_id.'.jpg';
                    $S3PathStoreImg = 'img_'.$property_images_id.'.jpg';
                    // echo "\r\n";
                    // echo "\r\n S3 path -> ";
                    // echo "\r\n";
                    // print_r($S3Path);
                    // echo "\r\n";
                    // echo "\r\n local filename path -> ";
                    // echo "\r\n";
                    // print_r($filename);
                    // echo "\r\n";
                    $upload = $s3->upload(env('AWS_BUCKET'), $S3Path, fopen($filename, 'rb'), 'public-read');
                    PropertyImages::where('is_download', 0)->where('id', $property_images_id)
                                    ->update(['is_download' => 1, 'image_name' => $S3PathStoreImg]);
                    echo "\r\n property_images_id -> ".$property_images_id;
                    if (file_exists($filename))
                    {
                        gc_collect_cycles();
                        unlink($filename);
                        echo "\r\n File ".$filename." has been deleted";
                    } else {
                        echo "\r\n Could not delete ".$filename." , file does not exist";
                    }
                    echo "\r\n";
                    delete_directory($path);
                }
            }

        }
    }

}
