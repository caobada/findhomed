<?php

namespace App\Http\Controllers;
use App\Home;
use App\HomeType;
use App\Province;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
	protected $Menu;
    //
    public function __construct(){
		$this->Menu=HomeType::all();
		$this->province = Province::orderBy('name','ASC')->get();
	}
    public function Search(){
    	if(isset($_GET['type'])) $type = $_GET['type'];
    	if(isset($_GET['province']))  $province = $_GET['province'];
    	if(isset($_GET['district']))  $district=$_GET['district'];
    	if(isset($_GET['price'])) $price =$_GET['price'];
    	if(isset($_GET['area'])) $area =$_GET['area'];
    	
    	if(!empty($type)) $a = Home::where('type_id',$type)->get();
    	if(!empty($province))   $a = $a->where('city',$province);
           
        if(!empty($district)) $a=$a->where('district',$district);
    	
    	if(!empty($area)) {
    		if($area==1) $a=$a->where('area','<','10');
    		else if($area==2) $a=$a->where('area','>','10')->where('area','<','30');
    	 	else   $a=$a->where('area','>','30');
    	 }	

         if(isset($_GET['page'])) {$a=$a;}
        
         
    	  return view('subpage.search-home',['search'=>$a,'hometype'=>$this->Menu,'province'=>$this->province]);

    	   
    }
}
