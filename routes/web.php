<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\clients\ClientController;
use App\Http\Controllers\products\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    Route::get('/dashboard',[ AdminController::class , 'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/role' , RoleController::class);
    Route::resource('/categories' , CategoryController::class);
    Route::resource('/products' , ProductController::class);
    Route::resource('/clients' , ClientController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// ==============================================================================================================
// =============================================BackEnd Routs====================================================
// ==============================================================================================================

require __DIR__.'/auth.php';
