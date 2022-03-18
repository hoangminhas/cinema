<?php

use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\FoodController;
=======

use App\Http\Controllers\GoogleSocialiteController;

>>>>>>> 18f33d6969e5229d0ea7451643ef4aa8658f85fd
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


Route::get('/home', function () {
    return view('frontend.movie.home');

Route::get('/', function () {
    return view('layoutbackend.index');
<<<<<<< HEAD
})->name('home');
=======

});
>>>>>>> 18f33d6969e5229d0ea7451643ef4aa8658f85fd

////login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('showFormLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

////register
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('showFormRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

<<<<<<< HEAD
//movies
=======

//logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//login google
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);


>>>>>>> 18f33d6969e5229d0ea7451643ef4aa8658f85fd
Route::prefix('movie')->group(function(){
   Route::get('index',[MovieController::class,'index'])->name('movie.index');
   Route::get('create',[MovieController::class,'create'])->name('movie.create');
   Route::post('create',[MovieController::class,'store'])->name('movie.store');
   Route::get('delete/{id}',[MovieController::class,'destroy'])->name('movie.delete');
   Route::get('edit/{id}',[MovieController::class,'edit'])->name('movie.edit');
   Route::post('edit/{id}',[MovieController::class,'update'])->name('movie.update');
   Route::get('list/{id}',[MovieController::class,'show'])->name('movie.list');

});


//food
Route::prefix('food')->group(function(){
    Route::get('index',[FoodController::class,'index'])->name('food.index');
   Route::get('create',[FoodController::class,'create'])->name('food.create');
   Route::post('create',[FoodController::class,'store'])->name('food.store');
   Route::get('delete/{id}',[FoodController::class,'destroy'])->name('food.delete');
   Route::get('edit/{id}',[FoodController::class,'edit'])->name('food.edit');
   Route::post('edit/{id}',[FoodController::class,'update'])->name('food.update');
});


//frontend
Route::get('/homepage', function () {
    return view('frontend.movie.home');
})->name('homepage');

Route::get('/current-movies', [MovieController::class, 'indexMovies'])->name('current.movie.index');
//dat ve
Route::get('/buy-ticket', [MovieController::class, 'showFormOrder'])->name('orderTicket');


