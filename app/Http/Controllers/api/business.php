<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomClass\Curl;
use App\model\tbusiness;
use DB;

class business extends Controller
{
    //
    function get_business(){
    	$Curl= new Curl;
    	$path='v3/businesses/search?location=new%20york&term=pasta&limit=50&offset=';
    	$totalrecords=100;
    	$offsets=$this->create_offset($totalrecords);
    	try {
            if(!empty($offsets)){
        		//get api by offset
        		DB::beginTransaction();
        		foreach ($offsets as $offset) {
    	        	$response=	$Curl->get_curl($path,$offset);  
    		        $decode_response = json_decode($response);
    		        $this->insert_business($decode_response->businesses);
        		}
    		 	DB::commit();
    	        echo 'done';
                return redirect()->route('index.get_index');
        	}        	
        } catch (\Exception $e) {
        	DB::rollback();
        	// dd($e);
        	return 'pastikan koneksi internet anda bagus, silahkan uncomment $e untuk track error.';
        }
    }

    private function create_offset($totalrecord=0){
    	$array=array();
    	$repeating = $totalrecord/50;
    	for($i=0;$i<$repeating;$i++){
    		array_push($array, $i*50+1);
    	}
    	return $array;
    }

    private function insert_business($response){
    	$tbusiness= new tbusiness;
    	foreach ($response as $data) {
    		$tbusiness->insert_data($data);
    	}
    }
}
