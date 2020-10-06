<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileFollowController;

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
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);

Route::resource('profile', ProfileController::class);
Route::resource('post', PostController::class);

// follow/unfollow
Route::post('/follow/{profile}', [ProfileFollowController::class, 'store']);
// Route::delete('/follow/{id}', 'ProfileFollowController@destroy');
