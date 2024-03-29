<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class UsersController extends Controller
{

	public function __construct()
    {
    	//このコントローラのログイン画面以外は見られないようにする
        $this->middleware('auth', ['except' => 'login']);
    }

    public function login(){
    	//ログインされてたらインデックスに飛ばす
    	if(Auth::check()){
    		return redirect()->route("index");
    	}
    	return view("login");
    }

    public function index(){
    	return view("index");
    }

    public function user_id(){
        return Auth::user()->id;
    }
}
