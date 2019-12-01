<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomClass\Curl;
use App\model\tbusiness;
use App\model\treviews;
use DB;

class reviews extends Controller
{
    //

    function get_reviews(){
    	//disini bakal error karena 

    	$Curl= new Curl;
    	$tbusiness= new tbusiness;
    	$list_crawlers=$tbusiness->get_business_id_where_0();

    	foreach($list_crawlers as $data){
    		$path='v3/businesses/'.$data->businesses_string.'/reviews?offset=1';
    		$response=	$Curl->get_curl($path);   
   			//$path='v3/businesses/HodL0fXoF08C3Ir-kLeTtw/reviews?offset=1';
			// $response=	$Curl->get_curl($path); 
			$decode_response = json_decode($response);
			$this->insert_reviews($decode_response->reviews,$data->businesses_id);
    	}
    	return 'done';
    }

    private function insert_reviews($response,$businesses_id){
    	$treviews= new treviews;
    	foreach ($response as $data) {
    		$treviews->insert_data($data,$businesses_id);
    	}
    }
}
