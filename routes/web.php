<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\IncidencyController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\DepartmentController::class, 'index'])->name('home');

Route::resources([
    'departments' => DepartmentController::class,
]);

Route::resources([
    'categories' => CategoryController::class,
]);

Route::resources([
    'incidencies' => IncidencyController::class,
]);

Route::resources([
    'comments' => CommentController::class,
]);


// #METODOS GET#
// Route::controller(DepartmentController::class)->group(function () {
//     Route::get('/departments', 'index')->name('departments.index');
//     Route::get('/departments/{department}', 'show')->name('departments.show');
//     Route::get('/departments/create', 'create')->name('departments.create');
// })->withoutMiddleware([Auth::class]);

Auth::routes();

// Route::middleware(['auth'])->group(function () {
//     Route::resources([
//     'departments' => DepartmentController::class,
//     ]);
//     });

