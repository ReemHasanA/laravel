<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// posts routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::resource('posts', PostController::class);
//     Route::get('/posts/search/{title}', [PostController::class, 'search']);
//     Route::get('/post/author/{id}', [PostController::class, 'get_author']);
//     });

// posts routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     // protected routes go here
//     });'show',

Route::post('/signup', [AuthController::class, 'sign_up']);
Route::post('login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('users',UserController::class)->except([
    'create',  'edit'
]);