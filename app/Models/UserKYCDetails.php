<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserKYCDetails extends Model
{
    protected $fillable = ['user_id','name'];
    protected $table = 'user_kyc_details';
}
