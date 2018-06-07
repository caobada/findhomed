<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::check())
    	return view('subpage.post-home',['hometype'=>$this->Menu,'province'=>$this->province]);
    else return redirect('/');
    }
    public function store(Request $request){
         $data = new Home();

    	 $data->title = $request->title;
    	 $data->type_id = $request->hometype;
    	 $data->phone_home = $request->phone;
         $data->doituong = $request->doituong;
    	 $price = $request->price;
         $data->user_id = Auth::user()->id;
    	 $pricetype = $request->pricetype;
    	 $data->price=$price.'@'.$pricetype;
    	 $data->area = $request->area;
    	 $data->city= $request->province;
    	 $data->district =$request->district;
    	 
    	 $address = $request->address;
    	 $address = explode(',', $address);
    	 $data->street =  $address[0].','.$address[1];
    	 $data->desc = $request->desc;
         $data->view =0;
    



         if(isset($_FILES['img'])){
    	 $file = $_FILES['img']['name'];
    	 $data->image =  implode(';', $_FILES['img']['name']);
    	for($i=0;$i<count($file);$i++){
          
    	 	move_uploaded_file($_FILES['img']['tmp_name'][$i],'images/home/'.$file[$i]);
    	 }
        }else{
            $data->image =  "findhomed.png";
        }
         $data->save();
       	return redirect('/');

    }
}
