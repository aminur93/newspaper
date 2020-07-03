<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    protected $guarded = [];
    
    public function category()
    {
        return $this->belongsTo('App\NewsCategory','category_id','id');
    }
    
    public function subCategory()
    {
        return $this->belongsTo('App\NewsSubCategory','sub_cat_id','id');
    }
}
