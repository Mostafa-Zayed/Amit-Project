<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'user_id','category_id','type_id','location_id','title','company_name','describe','city','salary','number_days','more_info','phone','image_video'
    ];
    //Job and Category Relation One To Many
    public function category(){
        return $this->belongsTo('App\Category');
    }
    // Job and JobType Rleation One To One
    public function type(){
        return $this->belongsTo('App\Type');
    }
    // Job and User Rleation One to Many
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }
}
