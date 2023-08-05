<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\postController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isAdminLogout;
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

// FRONT ROUTES
Route::get('/home', function () {
    return view('front.home');
})->middleware(isUser::class)->name('front.home');

//ADMIN-DASHBOARD ROUTES
Route::get('/admin/dashboard/panel',[postController::class,'admin'])->middleware(isAdmin::class)->name('admin');

//User Login-Register routes
Route::get('/',[authController::class,"userLogin"])->middleware(isLogout::class)->name('user.login');
Route::post('/',[authController::class,"userLoginAction"])->middleware(isLogout::class)->name('user.login.action');
Route::get('/logout',[authController::class,"userLogoutAction"])->middleware(isLogout::class)->name('user.logout.action');

Route::get('/register',[authController::class,'userRegister'])->middleware(isLogout::class)->name('user.register');
Route::post('/register',[authController::class,"userRegisterAction"])->middleware(isLogout::class)->name('user.register.action');

// BLOG ROUTES
Route::get('/blog',[BlogController::class, 'index'])->middleware(isUser::class)->name('front.blog');
Route::get('/detail/{id}', [BlogController::class,'detail'])->middleware(isUser::class)->name('front.blogDetail');


//Admin routes
Route::get('/admin/dashboard',[authController::class,'adminLogin'])->middleware(isAdminLogout::class)->name('admin.login');
Route::post('/admin/dashboard',[authController::class,'adminLoginAction'])->name('admin.login.action');
Route::get('/admin/dashboard',[authController::class,'adminLogoutAction'])->name('admin.logout.action');

// POST ROUTES
//CREATE
Route::post('/admin/dashboard/panel',[postController::class,'store'])->name('post.store');

//UPDATE
Route::get('/admin/dashboard/panel/düzenle/{id}',[postController::class,'update'])->middleware(isAdmin::class)->name('post.update');
Route::post('/admin/dashboard/panel/düzenle/{id}',[postController::class,'updateAction'])->name('post.update.action');
Route::get('/admin/dashboard/panel/sil/{id}',[postController::class,'postDeleteAction'])->name('post.delete.action');
