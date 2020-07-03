<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    public function newsposts()
    {
        return $this->hasMany('App\NewsPosts','category_id','id');
    }
}
