<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\TopBoxController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\HomeCategoriesController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DataController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'media'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::get('/erpdata', [ProductController::class, 'select']);

    Route::resource('/orders', OrderController::class);

    Route::get('/productssearch', [ProductController::class,'search']);
    Route::resource('/products', ProductController::class);

    Route::get('/apiproductssearch', [ApiProductController::class,'search']);
    Route::get('/apiproducts', [ApiProductController::class, 'index'])->name('erpproduct');
    Route::put('/apiproducts', [ApiProductController::class, 'update'])->name('erpput');

    Route::resource('/brands', BrandController::class);
    Route::resource('/branches', BranchController::class);

    Route::get('/categorysearch', [CategoryController::class,'search']);
    Route::resource('/category', CategoryController::class);

    Route::resource('/gallerys', GalleryController::class);

    Route::resource('/sliders', SliderController::class);

    Route::resource('/topboxes', TopBoxController::class);

    Route::resource('/features', FeatureController::class);

    Route::resource('/homecategorys', HomeCategoriesController::class);

    Route::resource('/sections', SectionController::class);

    Route::resource('/admins', AdminController::class);

    Route::resource('/users', UserController::class);

    Route::resource('/payments', PaymentController::class);

    Route::resource('/socials', SocialController::class);

    Route::resource('/emails', EmailController::class);


    Route::resource('/settings', SettingsController::class);

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::post('/menu', [MenuController::class, 'savemenu'])->name('menu.save');
    Route::resource('/page', PageController::class);
});
