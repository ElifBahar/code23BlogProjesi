<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Middleware\isLogout;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\isUser;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('front.home');
})->middleware(isUser::class)->name('front.home');


Route::get('/',[authController::class,"userLogin"])->middleware(isLogout::class)->name('user.login');
Route::post('/',[authController::class,"userLoginAction"])->middleware(isLogout::class)->name('user.login.action');
Route::get('/logout',[authController::class,"userLogoutAction"])->middleware(isLogout::class)->name('user.logout.action');

Route::get('/register',function (){return view('auth.userRegister');})->name('user.register');
Route::post('/register',[authController::class,"userRegisterAction"])->name('user.register.action');

Route::get('/app',function (){
   return view('front.layout.app');
});


// FRONT ROUTES
//// BLOG ROUTES
///// POST ROUTES

Route::get('/blog',[BlogController::class, 'index'])->name('front.blog');
Route::get('/detail/{id}', [BlogController::class,'detail'])->name('front.blogDetail');

Route::get('/login',function(){return view('auth.layout.app');});
