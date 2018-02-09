<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Climate extends Model
{
    protected $table = "climate";
    
    public function ntas(){
    	return $this->hasMany('App\models\NTA');
    }
}
