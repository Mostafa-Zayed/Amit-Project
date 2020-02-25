<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
        'profile_id'
    ];
    public function profile(){
        return $this->belongsTo('App\Profile');
    }
}
