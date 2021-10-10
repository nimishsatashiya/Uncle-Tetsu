<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TasksAttachment extends Model
{    
    public $table = TBL_TASKS_ATTACHMENT;
	public $timestamps = true;
	protected $fillable = ['tasks_attachment_id','temp_name'];	

	public static function getAttachments($id){		
		$attachments = \DB::table(TBL_TASKS_ATTACHMENT)->where('task_id', $id)->get();
		$imageAnswer = array();

        foreach ($attachments as $image) {
            $imageAnswer[] = [
                "imagArry"=>$image            	
            ];
        } 
        return $imageAnswer;                  
	}	

}
