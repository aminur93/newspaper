<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divison extends Model
{
    protected $guarded = [];

    public function zilla()
    {
        return $this->hasMany('App\Zilla','division_id','id');
    }

    public function upzilla()
    {
        return $this->hasMany('App\UpZilla','division_id','id');
    }
}
