<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $table="District";
	public function Province(){
		return $this->belongTo('App\Province','provinceid','provinceid');
	}
	public function Ward(){
		return $this->hasMany('App\Ward','districtid','districtid');
	}
    //
}
