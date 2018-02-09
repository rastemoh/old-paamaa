<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NTAType extends Model
{
    protected $table = "nta_type";
    
    public function ntas(){
    	return $this->hasMany('App\models\NTA','ntaType_id');
    }
}
