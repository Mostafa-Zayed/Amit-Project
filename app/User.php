<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Profile and User Rleation One To One
    public function profile(){
        return $this->hasOne('App\Profile','user_id');
    }

    // Job and User Relation One To Many
    public function jobs(){

        return $this->hasMany('App\Job');
    }

    // Testimonie and User Rleation One Ton One
    public function testimonie(){

        return $this->hasOne('App\Testimonie');
    }

    //Message and User Relation One To Many
    public function messages(){

        return $this->hasMany('App\Message');
    }

}
