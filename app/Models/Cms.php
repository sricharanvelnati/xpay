<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
  protected $fillable = ['email','contactNumber','address','siteLogo','terms','privacy'];

  protected $table = 'cms';
}
