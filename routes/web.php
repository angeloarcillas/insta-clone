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
use App\Http\Controllers\ProfileFollowController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::view('/home', 'home');
    Route::resource('posts', PostController::class);
});
Route::view('/users','users', [
  'users' => App\Models\User::all()
]);
Route::resource('profile', ProfileController::class)->only('show', 'edit', 'update');

// follow/unfollow
Route::post('/profile/{profile}/follow', [ProfileFollowController::class, 'store'])->name('follow');
// Route::delete('/follow/{id}', 'ProfileFollowController@destroy');
