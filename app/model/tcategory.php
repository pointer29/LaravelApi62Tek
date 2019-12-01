<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class tcategory extends Model
{
    //
    protected $table = "table_category";
	protected $primaryKey = 'category_id';
	public $incrementing = true;
    protected $guarded = [
	   'updated_at','deleted_at'
    ];

    protected $fillable = [
		'category_id','businesses_id','category_alias','category_tittle'

    ];

    function create_category($businesses_id,$categories){
        if(!empty($categories)){
            foreach($categories as $data){
                $tcategory= new tcategory;
                $tcategory->businesses_id=$businesses_id;
                $tcategory->category_alias=$data->alias;
                $tcategory->category_tittle=$data->title;
                $tcategory->save();
            }
        }
    }
}
