<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\CustomClass\Curl;
use App\model\tbusiness;
use App\model\treviews;
use DB;
use Log;

class review implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $businesses_id;

    public function __construct($array)
    {
        //  
        //dd($array);
        $this->businesses_id=$array['businesses_id'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Log::info('Log Begin :'.date("d-m-Y H:i:s"));   
        $Curl= new Curl;
        $tbusiness= new tbusiness;
        $data=$tbusiness->get_business_id_by_id($this->businesses_id);
        $path='v3/businesses/'.$data->businesses_string.'/reviews?offset=1';
        $response=  $Curl->get_curl($path); 
        $decode_response = json_decode($response);
        $this->insert_reviews($decode_response->reviews,$data->businesses_id);
        Log::info('Done! :'.date("d-m-Y H:i:s"));  

    }

    private function insert_reviews($response,$businesses_id){
        $treviews= new treviews;
        foreach ($response as $data) {
            $treviews->insert_data($data,$businesses_id);
        }
    }
}
