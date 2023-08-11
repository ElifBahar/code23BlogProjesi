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
Route::prefix('')->middleware(isLogout::class)->group(function (){
    Route::get('/',[authController::class,"userLogin"])->name('user.login');
    Route::post('/',[authController::class,"userLoginAction"])->name('user.login.action');
    Route::get('/logout',[authController::class,"userLogoutAction"])->name('user.logout.action');

    Route::get('/register',[authController::class,'userRegister'])->name('user.register');
    Route::post('/register',[authController::class,"userRegisterAction"])->name('user.register.action');
});

// BLOG ROUTES
Route::prefix('blog')->middleware(isUser::class)->group(function (){
    Route::get('',[BlogController::class, 'index'])->name('front.blog');
    Route::get('/detail/{id}', [BlogController::class,'detail'])->name('front.blogDetail');
});


//Admin routes
Route::prefix('admin')->middleware([isLogout::class,isAdminLogout::class])->group(function (){
    Route::get('/dashboard',[authController::class,'adminLogin'])->name('admin.login');
    Route::post('/dashboard',[authController::class,'adminLoginAction'])->name('admin.login.action');
    Route::get('/dashboard',[authController::class,'adminLogoutAction'])->name('admin.logout.action');

});

// POST ROUTES
//CREATE
Route::post('/admin/dashboard/panel',[postController::class,'store'])->name('post.store');

//UPDATE
Route::get('/admin/dashboard/panel/düzenle/{id}',[postController::class,'update'])->middleware(isAdmin::class)->name('post.update');
Route::post('/admin/dashboard/panel/düzenle/{id}',[postController::class,'updateAction'])->name('post.update.action');
Route::get('/admin/dashboard/panel/sil/{id}',[postController::class,'postDeleteAction'])->name('post.delete.action');
