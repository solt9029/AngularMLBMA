<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    protected $redirectPath = '/';

 
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }


    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter/login');
        }

        $authUser=User::where("twitter_id",$user->id)->first();

        if(!$authUser){
            $authUser=User::create([
                "name"=>$user->name,
                "handle"=>$user->nickname,
                "twitter_id"=>$user->id,
                "avatar"=>$user->avatar_original
            ]);
        }

        if($authUser->handle!==$user->nickname){
            User::where("twitter_id",$user->id)->update(["handle"=>$user->nickname]);
        }

        if($authUser->name!==$user->name){
            User::where("twitter_id",$user->id)->update(["name"=>$user->name]);
        }

        if($authUser->avatar!==$user->avatar_original){
            User::where("twitter_id",$user->id)->update(["avatar"=>$user->avatar_original]);
        }

        Auth::login($authUser, true);

        return redirect()->route('index');
    }
}