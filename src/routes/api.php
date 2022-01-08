<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ShowController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\BrandController;
use App\Http\Controllers\api\SearchController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/categories', [ShowController::class, 'category']);
Route::get('/footer', [HomeController::class, 'footer']);

Route::get('category/{cat}/{sort?}', [CategoryController::class, 'index']);
Route::get('brand/{brand}/{sort?}', [BrandController::class, 'index']);
Route::get('product/{slug}', [ProductController::class, 'index']);
Route::get('search/{slug}', [SearchController::class, 'index']);
Route::get('/order', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/return_url', [OrderController::class, 'return_url']);
Route::get('/cancel_url', [OrderController::class, 'cancel_url']);

Route::get('/products', function () {
    return Product::with('api')->where('status', 1)->paginate(20)->setPath('api/products');
});
