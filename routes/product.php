<?php

use App\Http\Controllers\ProductController;

// General product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Administrative product routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin_products', [ProductController::class, 'index'])->name('admin_products.index');
    Route::get('/admin_products/create', [ProductController::class, 'create'])->name('admin_products.create');
    Route::post('/admin_products', [ProductController::class, 'store'])->name('admin_products.store');
    Route::get('/admin_products/{product}', [ProductController::class, 'show'])->name('admin_products.show');
    Route::get('/admin_products/{product}/edit', [ProductController::class, 'edit'])->name('admin_products.edit');
    Route::put('/admin_products/{product}', [ProductController::class, 'update'])->name('admin_products.update');
    Route::delete('/admin_products/{product}', [ProductController::class, 'destroy'])->name('admin_products.destroy');
});
