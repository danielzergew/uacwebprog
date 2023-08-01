<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FriendListController;

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

Route::redirect('/', '/register');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => 'auth'],function() {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home/{filter}', [HomeController::class, 'filtered']);
    Route::post('/addwishlist', [HomeController::class, 'create']);

    Route::get('/wishlist', [WishlistController::class, 'index']);

    Route::get('/friendlist', [FriendListController::class, 'index']);

    Route::get('/logout', [LoginController::class, 'logout']);
});




