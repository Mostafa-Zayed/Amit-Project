<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpage extends Model
{
    //
    public function page(){

        return $this->belongTo('App\Page');
    }
}
