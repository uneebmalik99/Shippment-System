<?php

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
    $data = [];
    // $data['listing'] = User::with('customer')->get();
    return view('welcome');
});

// Route::
Auth::routes();

Route::prefix('/admin')->middleware('auth')->group(function () {
    // User Routes
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
    Route::post('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::get('/users/edit/{id?}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/edit/{id?}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::get('/users/delete/{id?}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    Route::get('/users/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::post('/users/updateprofile', [App\Http\Controllers\UserController::class, 'updateprofile'])->name('user.updateprofile');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->middleware('auth')->name('auth.logout');
