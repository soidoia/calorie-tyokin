<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MealController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(MealController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/meals', 'store')->name('store');
    Route::get('/meals/create', 'create')->name('create');
    Route::get('/meals/{meal}', 'show')->name('show');
    Route::put('/meals/{meal}', 'update')->name('update');
    Route::delete('/meals/{meal}', 'delete')->name('delete');
    Route::get('/meals/{meal}/edit', 'edit')->name('edit');
});

Route::get('/meals/{meal}' ,[MealController::class, 'index'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
