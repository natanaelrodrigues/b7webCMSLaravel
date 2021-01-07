<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Site\HomeController as SiteHomeControler;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;

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
});



//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
