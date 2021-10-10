<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadAssignTo extends Model
{
    public $table = TBL_LEAD_ASSIGN_TO;
    public $timestamps = true;
    protected $fillable = ['hotness_level','tags','lead_source','status','contact_type','contact_id','assign_user_id','comment','last_action'];
}
