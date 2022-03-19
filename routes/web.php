<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\FoodController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\MovieController;

use App\Http\Controllers\SeatController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\AuthCommand;

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
})->name('user');




////login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('showFormLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

////register
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('showFormRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

//infor
Route::get('infor', [MovieController::class, 'infor'])->name('infor');

// password
Route::get('password', [AuthController::class, 'password'])->name('password');
Route::post('password', [AuthController::class, 'changePassword'])->middleware('CheckPassword');

//logout

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//login google
Route::get('auth/redirect/{provider}', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('callback/{provider}', [GoogleSocialiteController::class, 'handleCallback']);

Route::middleware('CheckAuth')->group(function () {
    Route::get('/', [MovieController::class, 'home'])->name('home');
    //movies
    Route::prefix('movie')->group(function () {
        Route::get('index', [MovieController::class, 'index'])->name('movie.index');
        Route::get('create', [MovieController::class, 'create'])->name('movie.create');
        Route::post('create', [MovieController::class, 'store'])->name('movie.store');
        Route::get('delete/{id}', [MovieController::class, 'destroy'])->name('movie.delete');
        Route::get('edit/{id}', [MovieController::class, 'edit'])->name('movie.edit');
        Route::post('edit/{id}', [MovieController::class, 'update'])->name('movie.update');
        Route::get('list/{id}', [MovieController::class, 'show'])->name('movie.list');
        Route::get('/search/', [MovieController::class, 'search'])->name('search');
    });
    //food
    Route::prefix('food')->group(function () {
        Route::get('index', [FoodController::class, 'index'])->name('food.index');
        Route::get('create', [FoodController::class, 'create'])->name('food.create');
        Route::post('create', [FoodController::class, 'store'])->name('food.store');
        Route::get('delete/{id}', [FoodController::class, 'destroy'])->name('food.delete');
        Route::get('edit/{id}', [FoodController::class, 'edit'])->name('food.edit');
        Route::post('edit/{id}', [FoodController::class, 'update'])->name('food.update');
    });
});




//frontend
Route::get('/homepage', function () {
    return view('frontend.movie.home');
})->name('homepage');
Route::get('/search/', [MovieController::class, 'searchUser'])->name('searchuser');
Route::get('/current-movies', [MovieController::class, 'indexMovies'])->name('current.movie.index');

//dat ve

Route::get('/buy-ticket', [MovieController::class, 'showFormOrder'])->name('orderTicket');

Route::get('/buy-ticket', [SeatController::class, 'showFormOrder'])->name('showFormOrder');
Route::post('/buy-ticket', [SeatController::class, 'orderTicket'])->name('orderTicket');
