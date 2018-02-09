<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AccessWay extends Model
{
    protected $table = "access_way";
    protected $fillable = ["accessWay_id","nta_id","description"];
    public static $accessId = array("air"=>1,"bus"=>2,"train"=>3,"sea"=>4,"offroad"=>5);
    public static $accessName = array(1=>"air",2=>"bus",3=>"train",4=>"sea",5=>"offroad");
    public function ntas(){
    	return $this->belongsToMany('App\models\NTA','nta_access_way','accessWay_id','nta_id')->withPivot('description');
    }
}
