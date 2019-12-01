<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\tcategory;
use App\Jobs\review;

class tbusiness extends Model
{
    //
    protected $table = "table_business";
	protected $primaryKey = 'businesses_id';
	public $incrementing = true;
    protected $guarded = [
	   'updated_at','deleted_at'
    ];

    protected $fillable = [
		'businesses_id','businesses_string','businesses_alias','businesses_name','businesses_image_url','businesses_is_closed','businesses_url','businesses_review_count','businesses_rating','businesses_transactions','businesses_coordinates_lat','businesses_coordinates_long','businesses_loc_address1','businesses_loc_address2','businesses_loc_address3','businesses_loc_city','businesses_loc_zip_code','businesses_loc_country','businesses_loc_state','businesses_display_address','businesses_phone','businesses_display_phone','businesses_distance','businesses_isreviews'

    ];

    function insert_data($data){
        //dd($data->name);
        $tcategory= new tcategory;

        $transactions= $this->merge_transaction($data->transactions);

        $tbusiness = new tbusiness;
        $tbusiness->businesses_string=$data->id;
        $tbusiness->businesses_alias=$data->alias;
        $tbusiness->businesses_name=$data->name;
        $tbusiness->businesses_image_url=$data->image_url;
        $tbusiness->businesses_is_closed=$data->is_closed===true ? 1 : 0 ;
        $tbusiness->businesses_url=$data->url;
        $tbusiness->businesses_review_count=$data->review_count;
        $tbusiness->businesses_rating=$data->rating;
        $tbusiness->businesses_transactions=$transactions;
        $tbusiness->businesses_coordinates_lat=$data->coordinates->latitude;
        $tbusiness->businesses_coordinates_long=$data->coordinates->longitude;
        $tbusiness->businesses_loc_address1=$data->location->address1;
        $tbusiness->businesses_loc_address2=$data->location->address2;
        $tbusiness->businesses_loc_address3=$data->location->address3;
        $tbusiness->businesses_loc_city=$data->location->city;
        $tbusiness->businesses_loc_zip_code=$data->location->zip_code;
        $tbusiness->businesses_loc_country=$data->location->country;
        $tbusiness->businesses_loc_state=$data->location->state;
        $tbusiness->businesses_display_address=$data->location->display_address[0].' '.$data->location->display_address[1];
        $tbusiness->businesses_phone=$data->phone;
        $tbusiness->businesses_display_phone=$data->display_phone;
        $tbusiness->businesses_distance=$data->distance;
        $tbusiness->businesses_isreviews=0;
        if($tbusiness->save()){
            $array=array(
                'businesses_id'=>$tbusiness->businesses_id,
            );
            $tcategory->create_category($tbusiness->businesses_id,$data->categories);
            review::dispatch($array);
        }
    }

    private function merge_transaction($transactions){
        $strtransactions = '';
        if(!empty($transactions)){
             foreach($transactions as $data){
                $strtransactions=$strtransactions.$data.',';
            }
        }
        return $strtransactions;
    }

    function get_business_id_where_0(){
        $data=tbusiness::where('businesses_isreviews',0)
        ->select('businesses_id','businesses_string')
        ->get();
        return $data;
    }

    function get_business_id_by_id($businesses_id){
        $data=tbusiness::where('businesses_id',$businesses_id)
        ->select('businesses_id','businesses_string')
        ->first();
        return $data;
    }

    function set_business_id_to_1($businesses_id){
        $data=tbusiness::where('businesses_id',$businesses_id)
        ->first();
        $data->businesses_isreviews=1;
        $data->save();
    }

    function get_all_business(){
        $data=tbusiness::paginate(10)
        ->appends(request()->except('page'));
        return $data;
    }
}
