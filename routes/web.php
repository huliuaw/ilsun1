<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('adminteams', App\Http\Controllers\AdminTeamsController::class);
Route::resource('adminplayers', AdminPlayerController::class);
Route::resource('teams', TeamController::class);
Route::resource('players', PlayerController::class);