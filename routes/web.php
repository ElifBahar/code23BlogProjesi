<?php

use App\Http\Controllers\Front\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.home');
})->name('front.home');

Route::get('/app',function (){
   return view('front.layout.app');
});


// FRONT ROUTES
//// BLOG ROUTES
///// POST ROUTES

Route::get('/blog',[BlogController::class, 'index'])->name('front.blog');
Route::get('/detail/{id}', [BlogController::class,'detail'])->name('front.blogDetail');

///PANEL ROUTES
Route::get('/panell',[BlogController::class,'panel'])->name('panel');

