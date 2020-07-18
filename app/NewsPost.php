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
    
    public function newsVideos()
    {
        return $this->hasMany('App\NewsPostVideo','news_id','id');
    }
    
    public function tag()
    {
        return $this->belongsTo('App\Tag','tag_id','id');
    }
}
