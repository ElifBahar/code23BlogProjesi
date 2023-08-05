<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class authController extends Controller
{
    //
    public function userLogin(){
        return view('auth.userLogin');
    }

    public function userLoginAction(Request $request){
        $validated = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('front.home');
        }

        return redirect()->route('user.login')->withErrors('Hatali giris');
    }

    public function userLogoutAction(){
        Auth::logout();
        return redirect()->route("user.login");
    }

    public function userRegisterAction(Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required' , 'max:30',
            'password'=>'required',
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        if($user)
        {
            Auth::login($user);
            return Redirect::route('front.home');
        }
        return Redirect::route('user.register.action')->withErrors('Geçersiz');
    }
}
