<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loadcard extends Model
{
  protected $fillable = ['userId','amount','partnerFee','cardLoadFee','finalAmount','paymentType','status'];
  protected $table = 'loadcard';
}
