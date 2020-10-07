<?php

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


Route::middleware('auth')->group(function () {
    Route::view('/home', 'home');
    Route::resource('posts', PostController::class);
});
Route::resource('profile', ProfileController::class);

// follow/unfollow
Route::post('/follow/{profile}', [ProfileFollowController::class, 'store']);
// Route::delete('/follow/{id}', 'ProfileFollowController@destroy');
