<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CronLogDetail extends Model
{
    protected $table = 'cron_log_detail';
    public static function storeCronLogs($start_time, $end_time, $total_time, $content, $machine_id, $cron_id, $insertedID = 0){

        if($insertedID > 0)
        {
            $dataToUpdate = array
            (
                'end_time' => date("Y-m-d H:i:s", strtotime($end_time)),
                'summary' => $content,
            );

            \DB::table('cron_log_detail')
            ->where("id", $insertedID)
            ->update($dataToUpdate);
        }
        else
        {
            $dataToUpdate = array
            (
                'cron_log_type' => $cron_id,
                'start_time' => date("Y-m-d H:i:s", strtotime($start_time)),
                'end_time' => date("Y-m-d H:i:s", strtotime($end_time)),
                'summary' => $content,
                'machine_id' => $machine_id,
                'created_at' => date('Y-m-d H:i:s', time()),
            );

            $id = \DB::table('cron_log_detail')
                    ->insertGetId($dataToUpdate);

            return $id;
        }        

    }
}
