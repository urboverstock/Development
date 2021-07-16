<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return Redirect::back()->with('success', 'All cache cleared successfully.');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [App\Http\Controllers\LandingController::class, 'home']);
    Route::any('/signup', [App\Http\Controllers\LandingController::class, 'register'])->name('signup');
    Route::any('/signin', [App\Http\Controllers\LandingController::class, 'signIn'])->name('signin');
    Route::any('/forgot-password', [App\Http\Controllers\LandingController::class, 'forgot_password'])->name('forgot_password');
});

Route::group(['middleware' => ['auth']], function () {
    Route::any('/seller-dashboard', [App\Http\Controllers\LandingController::class, 'seller_dashboard'])->name('seller_dashboard');
    Route::get('logout', [App\Http\Controllers\LandingController::class, 'logout'])->name('logout');

});



Route::get('get-started', [App\Http\Controllers\ProductController::class, 'getStarted'])->name('get-started');
Route::get('products', [App\Http\Controllers\ProductController::class, 'getProducts'])->name('products');
Route::get('search-results', [App\Http\Controllers\ProductController::class, 'searchresults'])->name('search-products');
Route::get('get-pagination-records', [App\Http\Controllers\ProductController::class, 'paginationRecords'])->name('pagination-records');

