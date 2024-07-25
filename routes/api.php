<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// ======================================= API =======================================
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/detail/{id}',[ProductController::class,'product_detail']);
    // Route::post('/add-to-cart',[OrderController::class,'addToCard']);
    Route::get('/product-home',[HomeController::class,'index']);
});
Route::prefix('category')->name('category.')->group(function () {
    Route::get('/category-header',[CategoryController::class,'header_nav']);
    Route::get('/category_detail/{id}',[CategoryController::class,'category_detail']);
});