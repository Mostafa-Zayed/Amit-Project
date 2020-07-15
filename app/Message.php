<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //User and Message Relation One To Many
    public function user(){

        return $this->belongsTo('App\User');
    }
}
