<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = TBL_BUILDINGS;
    
    protected $primaryKey = "id";
    
    protected $fillable = ['building_name', 'stories', 'year_built',
                            'floor','pet_policy','building_size',
                            'building_type'];

	public static function _GetBuildingID($ArrBuild = array())
    {
        $Condiwhere = array();
        if(isset($ArrBuild['building_name']))
        {
            $Condiwhere[] = ['building_name', '=', $ArrBuild['building_name']];
        }
        if(isset($ArrBuild['stories']))
        {
            $Condiwhere[] = ['stories', '=', $ArrBuild['stories']];
        }
        if(isset($ArrBuild['year_built']))
        {
            $Condiwhere[] = ['year_built', '=', $ArrBuild['year_built']];
        }
        if(isset($ArrBuild['building_size']))
        {
            $Condiwhere[] = ['building_size', '=', $ArrBuild['building_size']];
        }
        if(isset($ArrBuild['building_type']))
        {
            $Condiwhere[] = ['building_type', '=', $ArrBuild['building_type']];
        }
        $OB_Build = Building::where($Condiwhere)->first();
        if(!empty($OB_Build))
        {
            return $OB_Build->id;
        } else {
            // $E_Build = new Building();
            // $E_Build->create($ArrBuild);
            $E_Build = Building::create($ArrBuild);
            return $E_Build->id;
        }
    }

}
