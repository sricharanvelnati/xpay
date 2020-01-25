<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $fillable = ['name','phoneNumber','countryCode','countryName','email','message','imagefile','response','response_imagefile','status'];
    protected $table = 'contact_us';
}
