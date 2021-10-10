<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Latlong extends Model
{
    protected $table = TBL_LATLONG;

    protected $primaryKey = "id";

    protected $fillable = ['latitude','longitude', 'addressmd5'];

	public static function _GetLatlongID($ArrLatlong = array())
    {
        $Arrlatlng = Latlong::where("latitude", $ArrLatlong['latitude'])
                            ->where("longitude", $ArrLatlong['longitude'])
                            ->first();
        if(!empty($Arrlatlng))
        {
            return $Arrlatlng->id;
        } else {
            // $E_Latlng = new Latlong();
            $E_Latlng = Latlong::create($ArrLatlong);
            return $E_Latlng->id;
        }
    }

    public static function _GetLatlongByAddressMD5($addressmd5 = '')
    {
        $Arrlatlng_id = 0;
        if(!empty($addressmd5))
        {
            $Arrlatlng = Latlong::where("addressmd5", $addressmd5)->first();
            if(!empty($Arrlatlng))
            {
                $Arrlatlng_id =  $Arrlatlng->id;
            }
        }
        return $Arrlatlng_id;
    }


}
