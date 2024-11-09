<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ---------- importer les controlleurs
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
// ---------- fin importer les controlleurs

Route::get('/kikuu', function () {
    return view('home-kikuu');
});

// --register admin
Route::get('/registerAdmin1234567890', [AdminController::class,'ViewRegister']);
Route::post('/registerAdmin1234567890', [AdminController::class,'registerAdmin'])->name('registerAdmin1234567890');
// --fin register admin

// --le dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// --le dashboard suivant est a factoriser
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// --fin le dashboard

// --les produits
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
// --fin les produits

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::resource('users', ProductController::class);
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin_products', ProductController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin_users', UserController::class);
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin_orders', OrderController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [PaymentController::class, 'processCheckout'])->name('checkout.process');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/account/settings', [AccountController::class, 'edit'])->name('account.settings.edit');
    Route::put('/account/settings', [AccountController::class, 'update'])->name('account.settings.update');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// require __DIR__.'/product.php';