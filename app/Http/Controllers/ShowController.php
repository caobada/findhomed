<?php

namespace App\Http\Controllers;
use App\HomeType;
use App\Home;
use Illuminate\Http\Request;
use App\User;
use App\Ward;
use App\District;
use App\Province;
use DB;
use App\Http\Controllers;
class ShowController extends Controller
{
    //
	protected $province;
	protected $Menu;
	public function __construct(){
		$this->Menu=HomeType::all();
		$this->province = Province::orderBy('name','ASC')->get();
	}
	public function index(){
	   $topviewpost = Home::orderBy('view','Desc')->limit(6)->get();


		$top10 = Home::orderBy('home_id','Desc')->paginate(10);
		$rand = Home::all()->random(3);
		
		
		return view('subpage.main-content',['hometype'=>$this->Menu,'top6post'=>$topviewpost,'top10s'=>$top10,'rand'=>$rand,'province'=>$this->province]);

	}
	public function showDetail(){
		$rand = Home::all()->random(3);
		return view('subpage.detail-home',['hometype'=>$this->Menu,'rand'=>$rand,'province'=>$this->province]);
	}
	
	public function province($id){
		
		if(isset($id)){
			
			$district = District::orderBy('name','ASC')->where('provinceid',$id)->get();
			echo "<option value=''>Tất cả</option>";
			foreach($district as $district){
				echo "<option  value='$district->districtid'>$district->type $district->name</option>";
			}
		}
		

	}
	public function district($id){
		if(isset($id)){
			if($id == null) $id=0;
			$ward = Ward::orderBy('name','ASC')->where('districtid',$id)->get();
			echo "<option value=''>Tất cả</option>";
			foreach($ward as $ward){
				echo "<option value='$ward->wardid'>$ward->type $ward->name</option>";
			}
		}
	}

	public function ShowType($type){
			$type_id = HomeType::select('id')->where('nametypelink',$type)->get();
			$type_home =Home::where('type_id',$type_id[0]->id)->orderBy('view','Desc')->limit(6)->get();
			$top10 = Home::where('type_id',$type_id[0]->id)->orderBy('home_id','Desc')->paginate(10);
			$rand = Home::all()->random(3);
			return view('subpage.main-content',['hometype'=>$this->Menu,'top6post'=>$type_home,'top10s'=>$top10,'rand'=>$rand,'province'=>$this->province]);
	}

}
