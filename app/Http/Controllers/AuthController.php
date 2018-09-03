<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use Validator;
use App\User;

class AuthController extends Controller
{
    //
    function __construct() 
    {
    	$this->middleware('guest');
    }

    public function getLogin() 
    {
    	return view('welcome');
    }

    public function doLogin(Request $request)
    {
    	$valid = Validator::make($request->all(), [
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	if ($valid->fails()) {
    		# code...
    		Alert::info('Form Tidak Lengkap', 'Info');
    		return redirect()->back()->withInput($request->all());
    	} else {
    		if (!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role_id' => 1])) {
    			# code...
    			Alert::error('Username atau Password Salah', 'Error');
    			return redirect()->back()->withInput($request->all());
    		} else {
    			Alert::success('Login Berhasil', 'Success');
    			return redirect('home/main');
    		}
    	}
    }

 	public function getForgetPassword()
 	{
 		return view('forget-password');
 	}
}
