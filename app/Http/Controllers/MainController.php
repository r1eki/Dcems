<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;

class MainController extends Controller
{
    //
    function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('index');
    }

    public function doLogout()
    {
    	Auth::logout();
    	Alert::success('Logout Berhasil', 'Success');
    	return redirect('/');
    }
}