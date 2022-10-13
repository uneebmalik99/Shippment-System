<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LockController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StickyController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::get('/users/createRole',                     [App\Http\Controllers\UserController::class, 'createRole'])->name('user.createRole');

    Route::get('/users/createroles',                    [App\Http\Controllers\UserController::class, 'createroles'])->name('user.createroles');

    Route::post('/users/addRoles',                      [App\Http\Controllers\UserController::class, 'addRoles'])->name('user.addRole');

    Route::get('/users/deleteRole/{id?}',               [App\Http\Controllers\UserController::class, 'deleteRole'])->name('delete.role');

    Route::post('/users/showupdatemodel}',              [App\Http\Controllers\UserController::class, 'showUpdateRole'])->name('user.updatemodelshow');

    // Customer Routes
    Route::get('/customers',                            [CustomerController::class, 'index'])->name('customer.list');
    Route::get('/customers/create',                     [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customers/create/general_customer',   [CustomerController::class, 'general_create'])->name('customer.general_create');
    Route::post('/customers/create/billing_customer',   [CustomerController::class, 'general_create'])->name('customer.billing_create');
    Route::post('/customers/create/shipper_customer',   [CustomerController::class, 'general_create'])->name('customer.shipper_create');
    Route::post('/customers/create/quotation_customer', [CustomerController::class, 'general_create'])->name('customer.quotation_create');
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
    Route::post('/customer/filterTable',                [App\Http\Controllers\CustomerController::class, 'FilterTable'])->name('customer.FilterTable');

    Route::post('/customer/changeNotification',         [App\Http\Controllers\CustomerController::class, 'changeNotification'])->name('customer.changeNotification');

    Route::post('/customer/update',                     [App\Http\Controllers\CustomerController::class, 'customerUpdate'])->name('customers.update');

    Route::get('/customers/records',       [CustomerController::class, 'serverside'])->name('customer.records');

    

    //Vehicle Routes
    Route::get('/vehicles',                             [VehicleController::class, 'index'])->name('vehicle.list');
    Route::post('/vehicles',                            [VehicleController::class, 'createPost'])->name('vehicle.listpost');
    Route::get('/vehicles/create',                      [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles/create_form',                [VehicleController::class, 'create_form'])->name('vehicle.form');
    Route::get('/vehicles/attachments',                 [VehicleController::class, 'attachments'])->name('vehicle.attachments');
    Route::post('/vehicles/create',                     [VehicleController::class, 'create'])->name('vehicle.create');
    // Route::get('/vehicles/edit/{id?}',                  [VehicleController::class, 'edit'])->name('vehicle.edit');
    // Route::post('/vehicles/edit/{id?}',                 [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::get('/vehicles/delete/{id?}',                [VehicleController::class, 'delete'])->name('vehicle.delete');
    Route::get('/vehicles/update/{id?}',                [VehicleController::class, 'edit'])->name('vehicle.edit');

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
    Route::get('/vehicles/import',                      [VehicleController::class, 'import']);
    Route::post('/vehicles/imports',                    [VehicleController::class, 'import'])->name('vehicle.import');
    Route::post('/vehicle/vehicle_changeImages',        [VehicleController::class, 'changesImages'])->name('vehicle.changeImages');
    // Route::post('/vehicle/vehicle_changeImages',        [VehicleController::class, 'changesImages'])->name('vehicle.changeImages');
    
    Route::get('/vehicle/profile/{id?}',                [VehicleController::class, 'profile'])->name('vehicle.profile');
    Route::get('/vehicle/vehicle_informationTab',       [VehicleController::class, 'profile_tab'])->name('customer.profile_tab');
    
    Route::get('/vehicle/records',       [VehicleController::class, 'serverside'])->name('vehicle.records');

    Route::post('/vehicle/fetchVehciles',       [VehicleController::class, 'fetchVehicles'])->name('vehicle.fetchVehicles');

    Route::post('/vehicle/SelectedDelete',       [VehicleController::class, 'SelectedDelete'])->name('Vehicle.SelectedDelete');


    //Sticky Notes Routes
    Route::get('/stickynotes',                          [StickyController::class, 'index'])->name('sticky.list');
    Route::post('/stickynotes',                         [StickyController::class, 'create'])->name('sticky.create');

    // Shipment Routes
    Route::get('/shipment',                             [ShipmentController::class, 'index'])->name('shipment.list');
    Route::get('/shipments/create',                     [ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipments/create',                    [ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipments/general',                   [ShipmentController::class, 'create_form'])->name('shipment.createform');
    Route::get('/shipments/profile/{id?}',              [ShipmentController::class, 'profile'])->name('shipment.profile');
    Route::get('/shipments/delete/{id?}',              [ShipmentController::class, 'delete'])->name('shipment.delete');
    Route::get('/shipments/filtering',                  [ShipmentController::class, 'filtering'])->name('shipment.filter');
    Route::get('/shipments/records',                      [ShipmentController::class, 'serverside'])->name('shipments.records');

    Route::post('/shipments/filterShipment',                      [ShipmentController::class, 'filterShipmentt'])->name('shipments.filter');

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

    //Inventory
    Route::get('/inventory',                            function(){return "Coming Soon!";});
    //Inventory
    Route::get('/invoice',                              [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoices/create',                      [InvoiceController::class, 'create'])->name('invoice.create');

});

Route::get('/logout',                                   [HomeController::class, 'logout'])->middleware('auth')->name('auth.logout');
