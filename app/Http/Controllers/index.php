<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\tbusiness;


class index extends Controller
{
    //
    function get_index(){
    	$tbusiness=new tbusiness;
    	
    	$bulk=$tbusiness->get_all_business();
    	if($bulk->isEmpty()){
    		
    		return view('index.data_is_null');
    	}
    	
    	
    	return view('index.index',[
    		'tbusiness'=>$tbusiness->get_all_business()
    	]);
    }
}
