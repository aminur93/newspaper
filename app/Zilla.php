<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zilla extends Model
{
    protected $guarded = [];

    public function division()
    {
        return $this->belongsTo('App\Division','division_id','id');
    }


}
