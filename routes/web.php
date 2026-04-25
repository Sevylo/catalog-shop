<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return redirect()->route('catalog.index');
});

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('catalog.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
