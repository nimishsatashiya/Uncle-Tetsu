<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = TBL_STATES;

    protected $primaryKey = "id";

    protected $fillable = ['state_code'];

	public static function _GetStateID($ArrState = array())
    {
        $State_Id = 0;
        $Condiwhere = array();
        if(isset($ArrState['state_code']))
        {
            $Condiwhere[] = ['state_code', '=', $ArrState['state_code']];
        }
        
        if(isset($ArrState['state_name']))
        {
            $Condiwhere[] = ['state_name', '=', $ArrState['state_name']];
        }

        $OB_State = State::where($Condiwhere)->first();
        if(!empty($OB_State))
        {
            $State_Id = $OB_State->id;
        } else {
            $E_State = State::create($ArrState);
            $State_Id =  $E_State->id;
        }

        return $State_Id;
    }

}
