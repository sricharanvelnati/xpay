<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finexus extends Model
{
    protected $table = "user_finexus";

    protected $fillable = ['user_id','title','name','nric_no','dob','sex','nationality','residential_address','country','postal_code','state',
        'mailing_address','mailing_country','mailing_postalcode','mailing_state','mobile_no','security_ans','img_sign','c_code','passport_no','email'];
}
