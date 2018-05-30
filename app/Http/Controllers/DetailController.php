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

				 $detail = DB::select('select *,p.name as proname from home h,hometype ht,province p,district d,users u where h.type_id = ht.id and h.city=p.provinceid and h.district=d.districtid and h.user_id = u.id and h.home_id =?',[$id]);
				 
				 $district = DB::select('select * from district where provinceid=?',[$detail[0]->provinceid]);
				
				return view('subpage.detail-home',['detail'=>$detail,'hometype'=>$this->Menu,'rand'=>$this->rand,'province'=>$this->province,'district'=>$district]);
			
		}
		

	}
}
