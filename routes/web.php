<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BloguserController;
use App\Http\Controllers\CategoryController;
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
    return view('blog');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/category',  \App\Http\Controllers\CategoryController::class);
    Route::resource('/blog',  \App\Http\Controllers\BlogController::class);
    Route::resource('/users',  \App\Http\Controllers\UserController::class);
});

Route::middleware(['auth', 'user'])->group(function () {
    // Route::resource('/category',  \App\Http\Controllers\CategoryController::class);
    // Route::resource('/blog',  \App\Http\Controllers\BlogController::class);
    // Route::resource('/users',  \App\Http\Controllers\UserController::class);
     Route::resource('/categoryuser',  \App\Http\Controllers\CategoryuserController::class);
    Route::resource('/bloguser',  \App\Http\Controllers\BloguserController::class);
    Route::get('/profile', [UserController::class, 'user'])->name('profile.index');
    Route::get('/profile/edit/{id}', [UserController::class, 'edituser'])->name('profile.edit');
    Route::put('/profile/update/{id}', [UserController::class, 'updateuser'])->name('profile.update');
    Route::delete('/profile/destroy/{id}', [UserController::class, 'destroyuser'])->name('profile.destroy');
});


Route::get('/', [BlogController::class, 'beritautama']);

Route::get('show/{id}', [BloguserController::class, 'show'])->name('show.blog');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
