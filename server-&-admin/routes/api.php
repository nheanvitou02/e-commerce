<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CheckOutController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\WishlistController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// midleware
Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/user', [AuthController::class, 'getUser'])->name('auth.getUser');
    Route::post('/logout', [AuthController::class, 'logout'])->name('atuh.logout');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('atuh.changePassword');

    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/{invoice}', [InvoiceController::class, 'show'])->name('order.show');
    Route::post('/invoice/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::get('/invoice-tr', [InvoiceController::class, 'showTotalReceive'])->name('invoice.showTotalReceive');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::post('/cart/remove', [CartController::class, 'removeCart'])->name('cart.removeCart');

    Route::post('/checkout', [CheckOutController::class, 'store'])->name('checkOut.store');
});


Route::prefix('v1')->group(function () {

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{slug}', [CategoryController::class, 'show']);

    Route::get('/brands', [BrandController::class, 'index']);
    Route::get('/brands/{slug}', [BrandController::class, 'show']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/product-new', [ProductController::class, 'getNew']);
    Route::get('/product-similar', [ProductController::class, 'getSimilar']);
    Route::get('/products/{slug}', [ProductController::class, 'show']);

    Route::get('/sliders', [SliderController::class, 'index']);

    Route::post('/contacts', [ContactController::class, 'store']);
});