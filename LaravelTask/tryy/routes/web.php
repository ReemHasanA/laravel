<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;

// use App\Http\Controllers\EmployeeController;

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

Route::resource('employees', EmployeeController::class);
// Route::resource('',[EmployeeController::class]);

Route::get('/', function () {
    $empCount=Employee::count();
    $Salary=Employee::min('salary');
    $Salary2=Employee::max('salary');

    return view('home',['emp'=>$empCount,'min'=>$Salary,'max'=>$Salary2]);
});
