<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    public function newsposts()
    {
        return $this->hasMany('App\NewsPost','category_id','id');
    }
}
