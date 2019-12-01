<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\tbusiness;

class treviews extends Model
{
    //
    protected $table = "table_reviews";
	protected $primaryKey = 'review_id';
	public $incrementing = true;
    protected $guarded = [
	   'updated_at','deleted_at','created_at'
    ];

    protected $fillable = [
		'review_id','review_string','review_url','review_text','review_rating','review_time_created','review_user_id','review_user_profile_url','review_user_image_url','review_user_name'
    ];

    function insert_data($data,$businesses_id){
        //dd($data);
        $tbusiness= new tbusiness;
        $treviews = new treviews;
        $treviews->businesses_id=$businesses_id;
        $treviews->review_string=$data->id;
        $treviews->review_url=$data->url;
        $treviews->review_text=$data->text;
        $treviews->review_rating=$data->rating;
        $treviews->review_time_created=$data->time_created;
        $treviews->review_user_id=$data->user->id;
        $treviews->review_user_profile_url=$data->user->profile_url;
        $treviews->review_user_image_url=$data->user->image_url;
        $treviews->review_user_name=$data->user->name;
        $treviews->save();
        $tbusiness->set_business_id_to_1($businesses_id);
    }
}
