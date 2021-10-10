<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = TBL_CITIES;
    
    protected $primaryKey = "id";
    
    protected $fillable = ['state_id','city_name','city_code'];

	public static function _GetCityID($ArrCity = array())
    {
        $Condiwhere = array();
        if(isset($ArrCity['state_id']))
        {
            $Condiwhere[] = ['state_id', '=', $ArrCity['state_id']];
        }
        
        if(isset($ArrCity['city_name']))
        {
            $Condiwhere[] = ['city_name', '=', $ArrCity['city_name']];
        }

        $Arrcity = City::where($Condiwhere)->first();
        if(!empty($Arrcity))
        {
            return $Arrcity->id;
        } else {
            $E_Citie = City::create($ArrCity);
            return $E_Citie->id;
        }
    }

}
