<?php

use App\Http\Controllers\PlatController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\PlatController::class, 'index'])->name('home');



Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// rout of plat crud
Route::resource('/plats', PlatController::class);
// Route::resource('/profiles', App\Http\Controllers\ProfileController::class);
Route::resource('/users', App\Http\Controllers\UserController::class);


// Route::get('/',function(){
//     Mail::to('ez.zahed.abdelaziz@gmail.com')
//     ->send(new HelloMail());
// });