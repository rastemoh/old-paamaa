<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NTA extends Model
{
	protected $table="natural_tourism_attraction";
	
	protected $fillable = ['name','englishName','description','englishAddress','folkAddress','ntaType_id'
			,'climate_id','envCat_id','division_id','xPosition','yPosition'];
	
	private $picFolder = 'storage/nta/';
	
	public function division(){
		return $this->belongsTo('App\models\Division');
	}
	
	public function accessWays(){
		return $this->belongsToMany('App\models\AccessWay','nta_access_way','nta_id','accessWay_id')->withPivot('description');;
	}
	
	public function climate(){
		return $this->belongsTo('App\models\Climate');
	}
	
	public function envCategory(){
		return $this->belongsTo('App\models\EnvCategory','envCat_id');
	}
	
	public function NTAType(){
		return $this->belongsTo('App\models\NTAType','ntaType_id');
	}
	
	public function activities(){
		return $this->belongsToMany('App\models\Activity','nta_activity','nta_id','activity_id');
	}
	
	public function pictures(){
		return $this->hasMany('App\models\Picture','nta_id');
	}
	public function mainPicFile(){
		$pic = $this->pictures->first();
		if ($pic){
			return asset($this->picFolder)."/".$this->id."/".$pic->picfile;
		} else {
			return NULL;
		}
	}
	public function getLink(){
		return action('NTAController@show', ['id' => $this->id]);
	}
}
