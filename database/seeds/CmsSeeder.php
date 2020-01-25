<?php

use Illuminate\Database\Seeder;
use App\Models\Cms;
class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new Cms();
      $user->email = 'test2dh@gmail.com';
      $user->contactNumber = '+912352458523';
      $user->address = 'surat';
      $user->siteLogo = 'null';
      $user->terms = 'Write here terms & conditions';
      $user->privacy = 'write Here Privacy & Policy';
      $user->save();
    }
}
