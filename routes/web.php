<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminMoviesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['role:administrator']], function(){
    Route::resource('admin', AdminMoviesController::class)->shallow();
});

Route::group(['middleware' => ['role:user']], function(){
    Route::get('user/movie/{id}', [MoviesController::class, 'show'])->name('movieRate');
    Route::get('user/movieindex', [MoviesController::class, 'index'])->name('movieIndex');
});

require __DIR__.'/auth.php';