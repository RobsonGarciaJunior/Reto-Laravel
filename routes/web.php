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





Auth::routes();

Route::middleware(['auth'])->group(function () {
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
});

// #METODOS GET#
Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/{department}', 'show')->name('departments.show');
})->withoutMiddleware([Auth::class]);

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}', 'show')->name('categories.show');
})->withoutMiddleware([Auth::class]);

Route::controller(IncidencyController::class)->group(function () {  
    Route::get('/incidencies', 'index')->name('incidencies.index');
Route::get('/incidencies/{incidency}', 'show')->name('incidencies.show');
})->withoutMiddleware([Auth::class]);

