<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
    protected $table = "Home";
    public function hometype(){
    	return $this->belongsTo('App\HomeType','type_id','id');
    }
    public function districted(){
    	return $this->belongsTo('App\District','district','districtid');
    }
    public function province(){
    	return $this->belongsTo('App\Province','city','provinceid');
    }
}
