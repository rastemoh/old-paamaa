<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
	protected $table = "administrative_division";
	
	public function ntas(){
		return $this->hasMany('App\models\NTA');
	}
	public function subDivisions(){
		return Division::where("parent_id",$this->id)->orderBy('name')->get();
	}
	public function getParent(){
		return Division::where("id",$this->parent_id)->get()->first();
	}
}
