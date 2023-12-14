<?php

use App\Http\Controllers\Api\V1\Admin\CategoryController;
use App\Http\Controllers\Api\V1\Admin\OrderController;
use App\Http\Controllers\Api\V1\Admin\OrderDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\V1\Admin\UserController;
use App\Models\Product;
use Doctrine\DBAL\Driver\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('auth.')->group(function () {
    
    Route::post('register',[AuthController::class,'register'])->name('register');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum')->name('logout');

});

//Route::get('users',[UserController::class,'index'])->name('users');

// auth routes
Route::middleware(['auth:sanctum','check_user_active'])->group(function () {

    Route::middleware('check_user_type:admin')->group(function () {
        
        Route::apiresource('users', UserController::class);
        Route::apiresource('categories', CategoryController::class);
        Route::apiresource('products', Product::class);
        Route::apiresource('orders', OrderController::class);
        Route::apiresource('orders.detail', OrderDetailController::class);
    });

    Route::middleware(['check_user_type'])->group(function () {
        
    });
    
});
