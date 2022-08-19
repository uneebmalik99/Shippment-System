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
    Route::get('/users/profile/{id?}', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::post('/users/updateprofile', [App\Http\Controllers\UserController::class, 'updateprofile'])->name('user.updateprofile');
    Route::get('/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('user.search');
    Route::get('/users/pagination', [App\Http\Controllers\UserController::class, 'search'])->name('user.pagination');

    // Customer Routes
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.list');
    Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::get('/customers/edit/{id?}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customers/edit/{id?}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customers/delete/{id?}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customers/profile/{id?}', [App\Http\Controllers\CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('/customers/search', [App\Http\Controllers\CustomerController::class, 'search'])->name('customer.search');
    Route::get('/customers/pagination', [App\Http\Controllers\CustomerController::class, 'search'])->name('customer.pagination');

    //Vehicle Routes
    Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle.list');
    Route::get('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicles/edit/{id?}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::post('/vehicles/edit/{id?}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::get('/vehicles/delete/{id?}', [App\Http\Controllers\VehicleController::class, 'delete'])->name('vehicle.delete');
    Route::get('/vehicles/search', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.search');
    Route::get('/vehicles/pagination', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.pagination');
    Route::get('/vehicles/tabs', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.tabs');
    Route::get('/vehicles/location', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.location');

    //Sticky Notes
    Route::get('/stickynotes', [App\Http\Controllers\StickyNoteController::class, 'index'])->name('sticky.list');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->middleware('auth')->name('auth.logout');
