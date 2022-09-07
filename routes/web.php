<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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



Auth::routes();

<<<<<<< HEAD
Route::prefix('/admin')->middleware(['auth'])->group(function () {
=======
Route::prefix('/admin')->middleware('auth')->group(function () {
>>>>>>> 227763ae0963644573ab81d4c24b003d011f5c9c
    //Home
    Route::get('/', [HomeController::class, 'index']);
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
    Route::post('/customers/create/general', [App\Http\Controllers\CustomerController::class, 'general_create'])->name('customer.general_create');
    Route::post('/customers/create/billing', [App\Http\Controllers\CustomerController::class, 'general_create'])->name('customer.billing_create');
    Route::post('/customers/create/shipper', [App\Http\Controllers\CustomerController::class, 'general_create'])->name('customer.shipper_create');
    Route::post('/customers/create/quotation', [App\Http\Controllers\CustomerController::class, 'general_create'])->name('customer.quotation_create');
    Route::get('/customers/edit/{id?}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customers/edit/{id?}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customers/delete/{id?}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customers/profile/{id?}', [App\Http\Controllers\CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('/customers/profile_tab', [App\Http\Controllers\CustomerController::class, 'profile_tab'])->name('customer.profile_tab');
    Route::get('/customers/search', [App\Http\Controllers\CustomerController::class, 'search'])->name('customer.search');
    Route::get('/customers/pagination', [App\Http\Controllers\CustomerController::class, 'search'])->name('customer.pagination');
    Route::get('/customers/export', [App\Http\Controllers\CustomerController::class, 'export'])->name('customer.export');

    //Vehicle Routes
    Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle.list');
    Route::get('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicles/create_form', [App\Http\Controllers\VehicleController::class, 'create_form'])->name('vehicle.form');
    Route::get('/vehicles/attachments', [App\Http\Controllers\VehicleController::class, 'attachments'])->name('vehicle.attachments');
    Route::post('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicles/edit/{id?}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::post('/vehicles/edit/{id?}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::get('/vehicles/delete/{id?}', [App\Http\Controllers\VehicleController::class, 'delete'])->name('vehicle.delete');
    Route::get('/vehicles/search', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.search');
    Route::get('/vehicles/pagination', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.pagination');
    Route::get('/vehicles/tabs', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.tabs');
    Route::get('/vehicles/location', [App\Http\Controllers\VehicleController::class, 'search'])->name('vehicle.location');

    //Sticky Notes Routes
    Route::get('/stickynotes', [App\Http\Controllers\StickyController::class, 'index'])->name('sticky.list');
    Route::post('/stickynotes', [App\Http\Controllers\StickyController::class, 'create'])->name('sticky.create');

    // Shipment Routes
    Route::get('/shipment', [App\Http\Controllers\ShipmentController::class, 'index'])->name('shipment.list');
    Route::get('/shipments/create', [App\Http\Controllers\ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipments/create', [App\Http\Controllers\ShipmentController::class, 'create'])->name('shipment.create');

    //Notification Routes
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notification.list');
    Route::get('/notifications/create', [App\Http\Controllers\NotificationController::class, 'create'])->name('notification.create');
    Route::post('/notifications/create', [App\Http\Controllers\NotificationController::class, 'create'])->name('notification.creates');
    Route::get('/notifications/status', [App\Http\Controllers\NotificationController::class, 'status'])->name('notification.status');
    // Lock screen Routes
    Route::get('/lock', [App\Http\Controllers\LockController::class, 'lockScreen'])->name('lock');
    Route::post('/unlock', [App\Http\Controllers\LockController::class, 'unlock'])->name('unlock');
    // Tickets Routes
    Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('ticket.list');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->middleware('auth')->name('auth.logout');
