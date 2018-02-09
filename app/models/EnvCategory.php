<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EnvCategory extends Model
{
    protected $table = "environmental_category";
    
    public function ntas(){
    	return $this->hasMany('App\models\nta','envCat_id');
    }
}
