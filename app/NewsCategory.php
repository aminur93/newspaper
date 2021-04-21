<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    public function newsposts()
    {
        return $this->hasMany('App\NewsPost','category_id','id');
    }

    public function subcategory()
    {
        return $this->hasMany('App\NewsSubCategory','category_id','id');
    }
}
