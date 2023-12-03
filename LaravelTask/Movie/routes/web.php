<?php
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
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

// Route::get('/', function () {
//     return view('movies/index');
// });


// Route::get('/', MovieController::class .'@index')->name('movies.index');
// // returns the form for adding a post
// Route::get('/movies/create', MovieController::class . '@create')->name('movies.create');
// // adds a post to the database
// Route::post('/movies', MovieController::class .'@store')->name('movies.store');
// // returns a page that shows a full post
// Route::get('/movies/{post}', MovieController::class .'@show')->name('movies.show');
// // returns the form for editing a post
// Route::get('/movies/{post}/edit', MovieController::class .'@edit')->name('movies.edit');
// // updates a post
// Route::put('/movies/{post}', MovieController::class .'@update')->name('movies.update');
// // deletes a post
// Route::delete('/movies/{post}', MovieController::class .'@destroy')->name('movies.destroy');

Route::resource('movies', MovieController::class);
Route::resource('actors', ActorController::class);

// Route::get('', [