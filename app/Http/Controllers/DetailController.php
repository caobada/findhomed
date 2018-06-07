<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\HomeType;
use App\Province;
use App\User;
use App\District;
use DB;
class DetailController extends Controller
{
	protected $province;
	protected $Menu;
	protected $rand;
	public function __construct(){
		$this->Menu=HomeType::all();
		$this->rand = Home::all()->random(3);
		$this->province = Province::orderBy('name','ASC')->get();
	}
    //
	public function show($id){
		
			if(isset($id)){
				try{
				$detail = Home::where('home_id',$id)->get();
				$view =  $detail[0]->view;
				$district =  District::where('provinceid',$detail[0]->city)->get();
				Home::where('home_id',$id)->update(['view'=>++$view]);
				return view('subpage.detail-home',['detail'=>$detail,'hometype'=>$this->Menu,'rand'=>$this->rand,'province'=>$this->province,'district'=>$district]);
			
				}catch(\Exception $ex){
				echo "Đã xảy ra lỗi!";
			}
				
		}
		

	}
}
