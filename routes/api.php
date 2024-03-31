<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/seller', SellerController::class, 'create');

Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::post('/', 'create');
    Route::get('/', 'index');
    Route::get('/{product}', 'show');
    Route::put('/{product}', 'update');
    Route::delete('/{product}', 'destroy');
});
