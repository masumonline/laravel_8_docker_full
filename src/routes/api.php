<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ShowController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BrandController;
use App\Http\Controllers\api\CategoryController;
use App\Models\Product;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'throttle:100'], function () {

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/categories', [ShowController::class, 'category']);
    Route::get('/footer', [HomeController::class, 'footer']);

    Route::get('category/{cat}/{sort?}', [CategoryController::class, 'index']);
    Route::get('brand/{brand}', [BrandController::class, 'index']);

    Route::get('/products', function () {
        return Product::with('api')->where('status', 1)->paginate(20)->setPath('api/products');
    });
});
