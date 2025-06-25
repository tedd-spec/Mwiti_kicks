<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SneakerController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;

// =========================
// 📦 Public Routes
// =========================

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/brands', [SiteController::class, 'brands'])->name('brands');
Route::get('/collections', [SiteController::class, 'collections'])->name('collections');
Route::get('/new-arrivals', [SneakerController::class, 'newArrivals'])->name('new.arrivals');
Route::get('/order/{sneaker}', [SneakerController::class, 'order'])->name('order');

// Wishlist
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

// Home page with new arrivals + testimonials
Route::get('/', [SiteController::class, 'welcome'])->name('home');

// Search sneakers
Route::get('/search', [SneakerController::class, 'search'])->name('search');

// Optional: individual sneaker detail page
Route::get('/sneakers/{id}', [SneakerController::class, 'show'])->name('sneakers.show');

// WhatsApp Order
Route::post('/send-whatsapp', [OrderController::class, 'send'])->name('send.whatsapp');

// =========================
// 🛠 Admin Routes (Sneakers)
// =========================

Route::prefix('admin/sneakers')->name('admin.sneakers.')->group(function () {
    Route::get('/', [SneakerController::class, 'index'])->name('index');          // List all sneakers
    Route::get('/create', [SneakerController::class, 'create'])->name('create');  // Show form
    Route::post('/', [SneakerController::class, 'store'])->name('store');         // Handle form POST
    Route::get('/{id}/edit', [SneakerController::class, 'edit'])->name('edit');   // Show edit form
    Route::put('/{id}', [SneakerController::class, 'update'])->name('update');    // Update sneaker
    Route::delete('/{id}', [SneakerController::class, 'destroy'])->name('destroy'); // Delete sneaker
});
