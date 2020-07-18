<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPostVideo extends Model
{
    protected $guarded = [];
    
    public function newspost()
    {
        return $this->belongsTo('App/NewsPost','news_id','id');
    }
}
