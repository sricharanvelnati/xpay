<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  protected $fillable = ['planName','price','year','eLearning','rewardPoint','mangoCoinEarn','mangoCoinEarn','referralFee','status','planImage'];

  protected $table = 'plan';
}
