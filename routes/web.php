<?php

use App\Http\Controllers\UserController;
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
    return redirect()->route('users.index');
});

Route::resource('/users', UserController::class)->names('users');

Auth::routes(["register" => false, "login" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
