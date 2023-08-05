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
        return Redirect::route("user.login");
    }

    public function userRegister(){
        return view('auth.userRegister');
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

    public function adminLogin(){
        return view('auth.adminLogin');
    }

    public function adminLoginAction(Request $request){
        $validated = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if(Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password])){
            return Redirect::route('admin');
        }

        return Redirect::route('admin.login.action')->withErrors('Hatali giris');
    }

    public function adminLogoutAction(){
        Auth::guard('admin')->logout();
        return view('auth.adminLogin');
    }
}
