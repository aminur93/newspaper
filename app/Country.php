<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Type','types_id','id');
    }
}
