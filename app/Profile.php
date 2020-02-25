<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //User and Profile Relation One To One
    public function user(){
        return $this->belongsTo('App\User');
    }

    //Permission and Profile Relation One To One
    public function permission(){

        return $this->belongsTo('App\Permission');
    }
    public function team(){
        return $this->hasOne('App\Team');
    }
}
