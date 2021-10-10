<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadContactForm extends Model
{
    public $table = TBL_LEAD_CONTACT_FORM;
    public $timestamps = true;
    protected $fillable = ['firstname','lastname','email','mobile_number','home_number','office_number','birth_date','company','address','spouse_name','spouse_email','spouse_birth_date','spouse_phone'];
}
