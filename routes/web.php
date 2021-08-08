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
    Route::any('/seller-dashboard', [App\Http\Controllers\SellerController::class, 'dashboard'])->name('seller_dashboard');
    Route::any('/seller-edit-profile', [App\Http\Controllers\SellerController::class, 'edit_profile'])->name('seller_edit_profile');
    Route::any('/seller-edit-profile-documents', [App\Http\Controllers\SellerController::class, 'edit_profile_documents'])->name('seller_edit_profile_documents');
    Route::any('/seller-view-profile', [App\Http\Controllers\SellerController::class, 'view_profile'])->name('seller_view_profile');
    Route::any('add-product', [App\Http\Controllers\SellerController::class, 'add_product'])->name('add_product');
    Route::any('edit-product/{product_id}', [App\Http\Controllers\SellerController::class, 'edit_product'])->name('edit_product');

    Route::get('logout', [App\Http\Controllers\LandingController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'buyer'], function () {
    Route::any('dashboard', [App\Http\Controllers\BuyerController::class, 'dashboard'])->name('buyer.dashboard');
    Route::any('/edit-profile', [App\Http\Controllers\BuyerController::class, 'edit_profile'])->name('buyer.edit_profile');
    Route::any('/view-profile', [App\Http\Controllers\BuyerController::class, 'view_profile'])->name('buyer.view_profile');
    Route::get('logout', [App\Http\Controllers\LandingController::class, 'logout'])->name('logout');
});


Route::get('get-started', [App\Http\Controllers\ProductController::class, 'getStarted'])->name('get-started');
Route::get('products', [App\Http\Controllers\ProductController::class, 'getProducts'])->name('products');
Route::get('search-results', [App\Http\Controllers\ProductController::class, 'searchresults'])->name('search-products');
Route::get('get-pagination-records', [App\Http\Controllers\ProductController::class, 'paginationRecords'])->name('pagination-records');
Route::get('guest-buyer/{id}', [App\Http\Controllers\LandingController::class, 'guestBuyer'])->name('guest-buyer');
Route::post('add-follow-user', [App\Http\Controllers\LandingController::class, 'addFollowUser'])->name('add-follow-user');
Route::post('add-wishlist-product', [App\Http\Controllers\LandingController::class, 'addWishlistProduct'])->name('add-wishlist-product');