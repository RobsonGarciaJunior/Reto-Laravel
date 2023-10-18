<?php

use Illuminate\Support\Facades\Route;

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

Route::resources([
    'departments' => DepartmentController::class,
]);

use App\Http\Controllers\DepartmentController;

#METODOS GET#
Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/{department}', 'show')->name('departments.show');
});

#METODOS POST#

#METODOS PUT#

#METODOS DELETE#

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
