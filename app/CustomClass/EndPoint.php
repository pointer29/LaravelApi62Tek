<?php
namespace App\CustomClass;

class EndPoint
{
	function base_endpoint_production(){
		return 'https://api.yelp.com/';
	}

	function base_endpoint_staging(){
		return '';
	}

	function key_api(){
		return 'Bearer 8AFa9tLs8kmLNqG2Jy5wQg0TGavoNjG5ZdlvVMwqkGoswnNnhm69ylqlgDoQ3UuPuVRCH6RuhdKhJ0yEwbyeUFC04k_csl-zi_H-_HN0_RpmpDl2BUhfCGZMZYnjXXYx';
	}
}