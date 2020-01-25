<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Models\Loadcard;
use App\Helpers\BaseFunction\BaseFunction;

class cardload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:cardload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get cardload info';

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
      $load_headers = array();
      $load_headers[] = 'Accept:application/x-www-form-urlencoded';
      $data_array = array (
                      'loaded_from' => '2019-01-01 07:28:48',
                      );

        $make_call = BaseFunction::callAPI('GET','https://boundlesspay.exchange/api/v1/users/card_loads/loads',$data_array,$load_headers);
        $response = json_decode($make_call, true);

        foreach ($response as $key => $value) {
            if(!empty($value['loaded_at'])){
               $update  = Loadcard::where('loadId',$value['id'])->whereNotIn('status', ['loaded'])->update(['status' => 'loaded','loaded_at' => $value['loaded_at']]);
            }
        }
          }
}
