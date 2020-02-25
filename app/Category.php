<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    //protected $table = 'categories';
    //protected $primaryKey = 'category_id';
    // Category and Job One to One Relationship
    public function jobs(){

        return $this->hasMany('App\Job');
    }

    protected $fillable =['name','icon'];

}
