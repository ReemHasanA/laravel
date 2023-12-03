<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('signin', SigninController::class);
// Route::resource('Login', LoginController::class);
Route::post('/login', [LoginController::class, 'login'])->name('Login');
Route::get('/login', function () {
    return view('Auth.login'); 
});

