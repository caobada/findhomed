<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\HomeType;
use App\Province;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    protected $province;
	protected $Menu;
	public function __construct(){
		$this->Menu=HomeType::all();
		$this->province = Province::orderBy('name','ASC')->get();
	}
    public function login(Request $request){

    	if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return response()->json([
            	'error'=>false,
            	'message'=>'success'
            ],200);
        }else{
        	return response()->json([
        		'error'=>true,
        		'message'=>'Tài khoản không chính xác!'
        	],200);
        }
    }
    public function logout(){
    	Auth::logout();
    	return redirect()->back();
    }
    public function register(){
    	if(Auth::check())
    		return redirect("");
    	else
    	return view('subpage.register',['hometype'=>$this->Menu,'province'=>$this->province]);
    }


    public function postuser(Request $request){
    	$user = trim(strtolower($request->username));
		$pass = $request->password;
		$phone = $request->phone;
		$count = User::all()->where('username', $user)->count();
		if ($count == 1) {
			return response()->json([
				'error' => true,
				'message' => 'Tên đăng nhập đã tồn tại!',
			], 200);
		} else {
            $data = new User();
            $data->username = $user;
            $data->password = Hash::make($pass);
            $data->status = 0;
            $data->phone = $phone;
            $data->save();
		
			Auth::attempt(['username' => $user, 'password' => $pass]);
			return response()->json([
				'error' => false,
				'message' => 'ok',
			], 200);

		}
    }
}
