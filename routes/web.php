<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\clients\ClientController;
use App\Http\Controllers\clients\OrderController;
use App\Http\Controllers\orders\OrderController as OrdersOrderController;
use App\Http\Controllers\products\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SelesController;
use App\Http\Controllers\suppliers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\warehouses\WarehousController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// ==============================================================================================================
// =============================================FrontEnd Routs===================================================
// ==============================================================================================================
Route::group(['middleware' => ['guest']] , function(){
    Route::get('/', function () {
        return view('auth.login');
    });
});


// ==============================================================================================================
// =============================================FrontEnd Routs===================================================
// ==============================================================================================================

// ==============================================================================================================
// =============================================BackEnd Routs====================================================
// ==============================================================================================================

Route::group([
    'prefix' => LaravelLocalization::setLocale(), 
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth', 'verified']
], function(){
    //dashboard route & seles route
    Route::resource('/dashboard',AdminController::class);

    //user route
    Route::resource('/users', UserController::class);

    //role route
    Route::resource('/role' , RoleController::class);

    //categories route
    Route::resource('/categories' , CategoryController::class);

    //product route
    Route::resource('/products' , ProductController::class);
    Route::get('/get-products/{id}', [OrdersOrderController::class, 'getProductsByCategory'])->name('get.products');//route to get product by category id
    
    //client order route
    Route::resource('/clients' , ClientController::class);//clients route
    Route::resource('client/orders' , OrderController::class);//orders route
    Route::get('client/orders/create/{client}', [OrderController::class, 'create'])->name('client.orders.create');//create order for user
    Route::post('client/orders/{client}', [OrderController::class, 'store'])->name('client.orders.store');//store order for user
    Route::get('client/show_orders/{id}' , [OrderController::class , 'show_client_orders'])->name('client.orders.show');//route to get client orders

    //Orders Routes
    Route::get('/orders' , [OrdersOrderController::class , 'index'])->name('getAllOrders');//route to get all orders
    Route::get('/order_details/{id}' , [OrdersOrderController::class , 'getOrderDetails'])->name('order.detalis');//route to get order detali

    //suppliers Routes
    Route::resource('/suppliers' , SupplierController::class);

    //warehouese route
    Route::resource('/warehouses' , WarehousController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// ==============================================================================================================
// =============================================BackEnd Routs====================================================
// ==============================================================================================================

require __DIR__.'/auth.php';
