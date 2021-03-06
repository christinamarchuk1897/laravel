<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('productDetails');
    Route::get('/catalog/all', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
    Route::get('/category/{id}', [App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.show');
    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings');
    Route::get('/settings/product/create', [App\Http\Controllers\ProductController::class, 'showForm'])->name('product.create');
    Route::post('/settings/product/create', [App\Http\Controllers\ProductController::class, 'create']);
    Route::get('/settings/edit', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.edit');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('shoppingCart');
    Route::post('/cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/cart/update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('changeQty');
    Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('deleteFromCart');
    Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('clearCart');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [App\Http\Controllers\Guest\GuestController::class, 'index'])->name('guestIndex');
    Route::get('/guest/cart', [App\Http\Controllers\Guest\GuestCartController::class, 'index'])->name('guestShoppingCart');
    Route::post('/guest/cart', [App\Http\Controllers\Guest\GuestCartController::class, 'addToCart'])->name('guestCartStore');
    Route::post('/guest/cart/update-cart', [App\Http\Controllers\Guest\GuestCartController::class, 'updateCart'])->name('guestCartUpdate');
    Route::post('/guest/cart/remove', [App\Http\Controllers\Guest\GuestCartController::class, 'removeCart'])->name('guestCartRemove');
    Route::post('/guest/cart/clear', [App\Http\Controllers\Guest\GuestCartController::class, 'clearAllCart'])->name('guestCartClear');
    Route::get('/guest/catalog/all', [App\Http\Controllers\Guest\GuestCatalogController::class, 'index'])->name('guestCatalog');
    Route::get('/guest/category/{id}', [App\Http\Controllers\Guest\GuestCatalogController::class, 'show'])->name('guestCatalogShow');
    Route::get('/guest/product/{id}', [\App\Http\Controllers\Guest\GuestProductController::class, 'show'])->name('guestProductDetails');
});

