<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = "users_roles";
    
    public function users()
    {
        return $this->hasMany('App\User','user_role_id','id');
    }
}
