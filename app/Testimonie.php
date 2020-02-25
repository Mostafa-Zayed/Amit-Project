<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonie extends Model
{
    //
    //user and testimonie Relation One To One
    public function user(){

        return $this->belongsTo('App\User');
    }
}
