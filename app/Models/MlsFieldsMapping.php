<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MlsFieldsMapping extends Model
{
    protected $table = 'mls_fields_mapping';
    protected $primaryKey = "id";
	
	public static function ProcessFieldsForSelect($ObjFields='')
	{
	    $ReturnArr = array();
	    if(!empty($ObjFields))
	    {

	        foreach ($ObjFields as $key => $value)
	        {

	            if(!empty(trim($value->api_field)))
	            {

	                if(trim($value->db_field) == 'building_id')
	                {
	                    $ArrFD = json_decode($value->api_field, true);
	                    foreach ($ArrFD as $B_API_fld)
	                    {
	                        $ReturnArr[] = trim($B_API_fld);
	                    }
	                } else {
	                    if(strpos(trim($value->api_field), ",") !== false )
	                    {
	                        $arrex = explode(",", trim($value->api_field));
	                        foreach ($arrex as $arrf)
	                        {
	                            if(strpos(trim($arrf), "|") !== false )
	                            {
	                                $arrPex = explode("|", $arrf);
	                                foreach ($arrPex as $PipeF)
	                                {
	                                    $ReturnArr[] = trim($PipeF);
	                                }
	                            } else {
	                                $ReturnArr[] = trim($arrf);
	                            }
	                        }
	                    }else {
	                        $ReturnArr[] = trim($value->api_field);
	                    }
	                }

	            }
	        }
	    }
	    if(!empty($ReturnArr))
	    {
	        // $ReturnArr = implode(",", $ReturnArr);
	        $ReturnArr = array_unique($ReturnArr);
	    }
	    return $ReturnArr;
	}
}
