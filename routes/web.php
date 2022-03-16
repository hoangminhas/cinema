<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\GoogleSocialiteController;

use App\Http\Controllers\MovieController;

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
    return view('layoutFrontend.master');
});

////login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('showFormLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

////register
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('showFormRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');



//logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//login google
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);



Route::prefix('movie')->group(function(){
   Route::get('index',[MovieController::class,'index'])->name('movie.index');
   Route::get('create',[MovieController::class,'create'])->name('movie.create');
   Route::post('create',[MovieController::class,'store'])->name('movie.store');
});


