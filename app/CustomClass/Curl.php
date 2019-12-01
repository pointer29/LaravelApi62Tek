<?php
namespace App\CustomClass;

use App\CustomClass\EndPoint;

class Curl
{
	function get_curl($path='',$offset=''){

		$EndPoint= new EndPoint;
		$curl = curl_init();

		//$EndPoint->base_endpoint_production();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $EndPoint->base_endpoint_production().$path.$offset,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Authorization: ".$EndPoint->key_api(),
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Host: api.yelp.com",
		    "Postman-Token: 017f6fe5-ee15-400c-a2c1-6bd7b87fd06b,fcf5e608-0a05-4b1c-bea8-e237d35a023f",
		    "User-Agent: PostmanRuntime/7.15.0",
		    "accept-encoding: gzip, deflate",
		    "cache-control: no-cache",
		    "content-length: ",
		    "content-type: multipart/form-data; boundary=--------------------------433099691015044604432316"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}

}