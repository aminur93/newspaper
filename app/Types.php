<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $guarded = [];

    public function countries()
    {
        return $this->hasMany('App\Country','types_id','id');
    }
}
