<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
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
    Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.details');
    Route::get('/catalog/all', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
    Route::get('/category/{id}', [App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.show');
    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings');
    Route::get('/settings/create', [App\Http\Controllers\SettingController::class, 'show'])->name('product.create');
    Route::post('/settings/create', [App\Http\Controllers\ProductController::class, 'create']);
    Route::get('/settings/edit', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.edit');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guest.index');
});
