<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //Profile and Permission Relation One To One
    public function profiles(){

        return $this->hasMany('App\Profile');
    }
}
