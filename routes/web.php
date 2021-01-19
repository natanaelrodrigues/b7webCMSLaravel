<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\HomeController as SiteHomeControler;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteHomeControler::class,'index']);

/*

    DOCUMENTAÇÃO DO LARAVEL-AdminLTE

    https://github.com/jeroennoten/Laravel-AdminLTE/wiki

    https://github.com/jeroennoten/Laravel-AdminLTE.wiki.git

*/
Route::prefix('painel')->group(Function(){
    Route::get('/',[AdminHomeController::class,'index'])->name('admin');
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'authenticate']);
    Route::get('register',[RegisterController::class, 'index'])->name('register');
    Route::post('register',[RegisterController::class,'register']);
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
    
    //controle de usuario 
    // na criação do controler foi usado o --resource
    Route::resource('users',UserController::class);
    Route::resource('pages',PageController::class);
    
    Route::get('profile',[ProfileController::class, 'index'])->name('profile');
    Route::put('profilesave',[ProfileController::class, 'save'])->name('profile.save');

    Route::get('settings',[SettingController::class, 'index'])->name('settings');
    Route::put('settingssave',[SettingController::class, 'save'])->name('settings.save');
});




//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

