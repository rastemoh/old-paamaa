<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "tourism_activity";
    
    public function ntas(){
    	return $this->belongsToMany('App\models\NTA','nta_activity','activity_id','nta_id');
    }
}
