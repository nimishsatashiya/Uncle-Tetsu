<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MlsMaster extends Model
{
    protected $table = TBL_MLS_MASTER;
    protected $primaryKey = "id";
	public static function GenerateAddress($StreetNumber,$StreetDirPrefix,$StreetName,$StreetSuffix,$UnitNumber){

		$address = "";
		if(!empty($StreetNumber)) {
		$address .= $StreetNumber." ";
		}

		if(!empty($StreetDirPrefix)) {
		$address .= $StreetDirPrefix." ";
		}

		if(!empty($StreetName)) {
		$address .= $StreetName." ";
		}

		if(!empty($StreetSuffix)) {
		$address .= $StreetSuffix." ";
		}

		if(!empty($UnitNumber)) {
		$address .= $UnitNumber." ";
		}

		$address = trim($address);
		return $address;
	}
}
