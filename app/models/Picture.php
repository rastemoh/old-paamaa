<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
	protected $fillable = ["nta_id","picfile"];
	protected $table = "nta_picture";
	public $timestamps = false;
	public function nta(){
		return $this->belongsTo('App\models\NTA','nta_id');
	}  
}
