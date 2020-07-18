<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSubCategory extends Model
{
    public function newsposts()
    {
        return $this->hasMany('App\NewsPost','sub_cat_id','id');
    }
}
