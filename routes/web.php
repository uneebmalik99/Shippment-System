<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LockController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::prefix('/admin')->middleware('auth')->group(function () {
    //Home
    Route::get('/', [HomeController::class, 'index']);
    // User Routes
    Route::get('/users',                                [UserController::class, 'index'])->name('user.list');
    Route::post('/users/create',                        [UserController::class, 'create'])->name('user.create');
    Route::get('/users/edit/{id?}',                     [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/edit/{id?}',                    [UserController::class, 'edit'])->name('user.edit');
    Route::get('/users/delete/{id?}',                   [UserController::class, 'delete'])->name('user.delete');
    Route::get('/users/profile/{id?}',                  [UserController::class, 'profile'])->name('user.profile');
    Route::post('/users/updateprofile',                 [UserController::class, 'updateprofile'])->name('user.updateprofile');
    Route::get('/users/search',                         [UserController::class, 'search'])->name('user.search');
    Route::get('/users/pagination',                     [UserController::class, 'search'])->name('user.pagination');

    // Customer Routes
    Route::get('/customers',                            [CustomerController::class, 'index'])->name('customer.list');
    Route::get('/customers/create',                     [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customers/create/general',            [CustomerController::class, 'general_create'])->name('customer.general_create');
    Route::post('/customers/create/billing',            [CustomerController::class, 'general_create'])->name('customer.billing_create');
    Route::post('/customers/create/shipper',            [CustomerController::class, 'general_create'])->name('customer.shipper_create');
    Route::post('/customers/create/quotation',          [CustomerController::class, 'general_create'])->name('customer.quotation_create');
    Route::get('/customers/edit/{id?}',                 [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customers/edit/{id?}',                [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customers/update/{id?}',               [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customers/delete/{id?}',               [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customers/profile/{id?}',              [CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('/customers/profile_tab',                [CustomerController::class, 'profile_tab'])->name('customer.profile_tab');
    Route::get('/customers/search',                     [CustomerController::class, 'search'])->name('customer.search');
    Route::get('/customers/pagination',                 [CustomerController::class, 'search'])->name('customer.pagination');
    Route::get('/customers/export',                     [CustomerController::class, 'export'])->name('customer.export');
    Route::get('/customer/changeStatus/{id?}',          [CustomerController::class, 'ChangeStatus'])->name('customer.changeStatus');

    //Vehicle Routes
    Route::get('/vehicles',                             [VehicleController::class, 'index'])->name('vehicle.list');
    Route::post('/vehicles',                            [VehicleController::class, 'createPost'])->name('vehicle.listpost');
    Route::get('/vehicles/create',                      [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles/create_form',                [VehicleController::class, 'create_form'])->name('vehicle.form');
    Route::get('/vehicles/attachments',                 [VehicleController::class, 'attachments'])->name('vehicle.attachments');
    Route::post('/vehicles/create',                     [VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicles/edit/{id?}',                  [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::post('/vehicles/edit/{id?}',                 [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::get('/vehicles/delete/{id?}',                [VehicleController::class, 'delete'])->name('vehicle.delete');
    Route::get('/vehicles/search',                      [VehicleController::class, 'filtering'])->name('vehicle.search');
    Route::get('/vehicles/pagination',                  [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/filtering',                   [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/warehouse',                   [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/year',                        [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/make',                        [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/tabs',                        [VehicleController::class, 'filtering'])->name('vehicle.tabs');
    Route::get('/vehicles/location',                    [VehicleController::class, 'filtering'])->name('vehicle.location');
    Route::post('/vehicles/attachments',                [VehicleController::class, 'store_image'])->name('vehicle.images');
    Route::get('/vehicles/export',                      [VehicleController::class, 'export'])->name('vehicle.export');
    Route::post('/vehicle/vehicle_changeImages',        [VehicleController::class, 'changesImages'])->name('vehicle.changeImages');
    
    Route::get('/vehicle/profile/{id?}',                [VehicleController::class, 'profile'])->name('vehicle.profile');
    Route::get('/vehicle/vehicle_informationTab',       [VehicleController::class, 'profile_tab'])->name('customer.profile_tab');

    //Sticky Notes Routes
    Route::get('/stickynotes',                          [StickyController::class, 'index'])->name('sticky.list');
    Route::post('/stickynotes',                         [StickyController::class, 'create'])->name('sticky.create');

    // Shipment Routes
    Route::get('/shipment',                             [ShipmentController::class, 'index'])->name('shipment.list');
    Route::get('/shipments/create',                     [ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipments/create',                    [ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipments/general',                   [ShipmentController::class, 'create_form'])->name('shipment.createform');

    //Notification Routes
    Route::get('/notifications',                        [NotificationController::class, 'index'])->name('notification.list');
    Route::get('/notifications/create',                 [NotificationController::class, 'create'])->name('notification.create');
    Route::post('/notifications/create',                [NotificationController::class, 'create'])->name('notification.creates');
    Route::get('/notifications/del/{id}',               [NotificationController::class, 'del'])->name('notification.del');
    Route::post('/notifications/updaterecord',          [NotificationController::class, 'update_record'])->name('notification_update');
    Route::post('/notifications/searchrecord',          [NotificationController::class, 'search_record'])->name('notification_search');
    Route::get('/notifications/status',                 [NotificationController::class, 'status'])->name('notification.status');

    // Lock screen Routes
    Route::get('/lock',                                 [LockController::class, 'lockScreen'])->name('lock');
    Route::post('/unlock',                              [LockController::class, 'unlock'])->name('unlock');
    // Tickets Routes
    Route::get('/tickets',                              [TicketController::class, 'index'])->name('ticket.list');

    // Master Routes
    Route::get('/master',                               [MasterController::class, 'index'])->name('master.list');

    // Calendar Routes
    Route::get('/calendar',                             [CalendarController::class, 'index'])->name('calendar.list');

    //  Dashboard
    Route::get('/dashboard',                            [DashboardController::class, 'dashboard'])->name('dashboard.list');
});

Route::get('/logout',                                   [HomeController::class, 'logout'])->middleware('auth')->name('auth.logout');
