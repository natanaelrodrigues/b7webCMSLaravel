<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Site\HomeController as SiteHomeControler;

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


Route::prefix('painel')->group(Function(){
    Route::get('/',[AdminHomeController::class,'index']);
});


Route::get('/authenticate',Function(){
    echo 'Login do sistema';
})->name('login');