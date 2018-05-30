<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeType;
use App\Province;
use App\Home;
class PostController extends Controller
{
	protected $province;
	protected $Menu;
	protected $rand;
	public function __construct(){
		$this->Menu=HomeType::all();
		
		$this->province = Province::orderBy('name','ASC')->get();
	}
    //
    public function index(){
    	return view('subpage.post-home',['hometype'=>$this->Menu,'province'=>$this->province]);
    }
    public function store(Request $request){
    	 $title = $request->title;
    	 $hometype = $request->hometype;
    	 $phone = $request->phone;
         $doituong=$request->doituong;
    	 $price = $request->price;
    	 $pricetype = $request->pricetype;
    	 $price=$price.'@'.$pricetype;
    	 $area = $request->area;
    	 $province= $request->province;
    	 $district =$request->district;
    	 $img =  implode(';', $_FILES['img']['name']);
    	 $address = $request->address;
    	 $address = explode(',', $address);
    	 $address =  $address[0].','.$address[1];
    	 $desc = $request->desc;

    	 $file = $_FILES['img']['name'];
    	 
    	for($i=0;$i<count($file);$i++){
          
    	 	move_uploaded_file($_FILES['img']['tmp_name'][$i],'images/home/'.$file[$i]);
    	 }
    	 
    	 $data = ['title'=>$title,'type_id'=>$hometype,'user_id'=>1,'phone_home'=>$phone,'price'=>$price,'area'=>$area,'city'=>$province,'district'=>$district,'street'=>$address,'view'=>'0','doituong'=>$doituong,'desc'=>$desc,'image'=>$img];
    	 
    	 
    	Home::insert($data);
    	return redirect('/');

    }
}
