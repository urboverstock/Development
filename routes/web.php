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

Route::group(['middleware' => ['auth'], 'prefix' => 'seller', 'as' => 'seller'], function ()
{
    Route::any('/dashboard', [App\Http\Controllers\SellerController::class, 'dashboard'])->name('Dashboard');
    Route::any('/edit-profile', [App\Http\Controllers\SellerController::class, 'edit_profile'])->name('Edit_profile');
    Route::any('/edit-profile-documents', [App\Http\Controllers\SellerController::class, 'edit_profile_documents'])->name('Edit_profile_documents');
    Route::any('/view-profile', [App\Http\Controllers\SellerController::class, 'view_profile'])->name('View_profile');
    
    // Route::any('add-product', [App\Http\Controllers\SellerController::class, 'add_product'])->name('add_product');
    // Route::any('edit-product/{product_id}', [App\Http\Controllers\SellerController::class, 'edit_product'])->name('edit_product');

    Route::any('add-product', [App\Http\Controllers\Seller\ProductController::class, 'addProduct'])->name('AddProduct');
    Route::any('edit-product/{id}', [App\Http\Controllers\Seller\ProductController::class, 'editProduct'])->name('EditProduct');
    Route::any('view-product/{id}', [App\Http\Controllers\Seller\ProductController::class, 'viewProduct'])->name('ViewProduct');
    Route::any('delete-image/{id}', [App\Http\Controllers\Seller\ProductController::class, 'deleteImage'])->name('DeleteImage');
    Route::any('product/wishlist', [App\Http\Controllers\Seller\ProductController::class, 'productWishlist'])->name('WishlistProduct');

    Route::any('coupon', [App\Http\Controllers\Seller\CouponController::class, 'index'])->name('Coupon');
    Route::any('add-coupon', [App\Http\Controllers\Seller\CouponController::class, 'create'])->name('AddCoupon');
    Route::any('store-coupon', [App\Http\Controllers\Seller\CouponController::class, 'store'])->name('StoreCoupon');
    Route::any('edit-coupon/{id}', [App\Http\Controllers\Seller\CouponController::class, 'editCoupon'])->name('EditCoupon');
    Route::any('update-coupon', [App\Http\Controllers\Seller\CouponController::class, 'update'])->name('UpdateCoupon');
    Route::any('view-coupon/{id}', [App\Http\Controllers\Seller\CouponController::class, 'show'])->name('ViewCoupon');
    Route::any('delete-coupon/{id}', [App\Http\Controllers\Seller\CouponController::class, 'delete'])->name('DeleteCoupon');

    Route::any('orders', [App\Http\Controllers\Seller\OrderController::class, 'orderList'])->name('OrderList');
    Route::any('order/{id}', [App\Http\Controllers\Seller\OrderController::class, 'viewOrder'])->name('ViewOrder');
    Route::any('order-status/{orderId}/{orderStatus}', [App\Http\Controllers\Seller\OrderController::class, 'updateOrderStatus'])->name('UpdateOrderStatus');
    
});

Route::get('logout', [App\Http\Controllers\LandingController::class, 'logout']);

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
