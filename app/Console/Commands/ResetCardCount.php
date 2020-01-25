<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class ResetCardCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:cardCount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reseting card count after limit exists';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $getUser = User::where('cardStatus','=','assigned')->where('cardCount','>=',3)->get();
        if($getUser){
        foreach ($getUser as $user) {
          $resetStatus = User::where('id',$user->id)->update(['cardCount' => 0]);
        }
          }
    }
}
