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

Route::group(['middleware' => ['auth', 'checksellerstore'], 'prefix' => 'seller', 'as' => 'seller'], function ()
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
    Route::any('suggestion-modal/{userId}/{productId}', [App\Http\Controllers\Seller\ProductController::class, 'suggestionModal'])->name('SuggestionModal');
    Route::any('send-suggestion-notifcation', [App\Http\Controllers\Seller\ProductController::class, 'sendSuggestionNotifcation'])->name('SendSuggestionNotifcation');
    Route::get('offer-listing/{productId}', [App\Http\Controllers\Seller\ProductController::class, 'offerListing'])->name('OfferListing');

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


    Route::any('user-post', [App\Http\Controllers\Seller\UserPostController::class, 'index'])->name('UserPost');
    Route::any('add-user-post', [App\Http\Controllers\Seller\UserPostController::class, 'create'])->name('AddUserPost');
    Route::any('store-user-post', [App\Http\Controllers\Seller\UserPostController::class, 'store'])->name('StoreUserPost');
    Route::any('edit-user-post/{id}', [App\Http\Controllers\Seller\UserPostController::class, 'edit'])->name('EditUserPost');
    Route::any('update-user-post', [App\Http\Controllers\Seller\UserPostController::class, 'update'])->name('UpdateUserPost');
    Route::any('view-user-post/{id}', [App\Http\Controllers\Seller\UserPostController::class, 'show'])->name('ViewUserPost');
    Route::any('delete-user-post/{id}', [App\Http\Controllers\Seller\UserPostController::class, 'destroy'])->name('DeleteUserPost');
    Route::any('delete-user-post-file/{id}', [App\Http\Controllers\Seller\UserPostController::class, 'deleteUserPostFile'])->name('DeleteUserPostFile');

    Route::any('/add-advertisement', [App\Http\Controllers\Seller\AdvertisementController::class,'create'])->name('AddAdvertisement');
    Route::any('/store-advertisement', [App\Http\Controllers\Seller\AdvertisementController::class,'store'])->name('StoreAdvertisement');
    Route::any('/edit-advertisement/{id}', [App\Http\Controllers\Seller\AdvertisementController::class,'edit'])->name('EditAdvertisement');
    Route::any('/update-advertisement', [App\Http\Controllers\Seller\AdvertisementController::class,'update'])->name('UpdateAdvertisement');
    Route::get('/view-advertisement/{id}', [App\Http\Controllers\Seller\AdvertisementController::class,'show'])->name('ViewAdvertisement');
    Route::get('/advertisement', [App\Http\Controllers\Seller\AdvertisementController::class,'index'])->name('ListAdvertisement');
    Route::get('/delete-advertisement/{id}', [App\Http\Controllers\Seller\AdvertisementController::class,'destroy'])->name('DeleteAdvertisement');
    
});

Route::group(['middleware' => ['auth'], 'prefix' => 'seller', 'as' => 'seller'], function ()
{
    // Route::any('add-store', [App\Http\Controllers\Seller\SellerStoreController::class, 'create'])->name('AddStore');
    Route::any('add-store', [App\Http\Controllers\Seller\SellerStoreController::class, 'store'])->name('Store');
});

Route::get('logout', [App\Http\Controllers\LandingController::class, 'logout']);

Route::group(['middleware' => ['auth'], 'prefix' => 'buyer'], function () {
    Route::any('/', [App\Http\Controllers\BuyerController::class, 'index'])->name('buyer.index');
    Route::any('dashboard', [App\Http\Controllers\BuyerController::class, 'dashboard'])->name('buyer.dashboard');
    Route::any('/edit-profile', [App\Http\Controllers\BuyerController::class, 'edit_profile'])->name('buyer.edit_profile');
    Route::any('/view-profile', [App\Http\Controllers\BuyerController::class, 'view_profile'])->name('buyer.view_profile');
    Route::any('/followers', [App\Http\Controllers\BuyerController::class, 'get_followers'])->name('buyer.followers');
    Route::any('/checkout', [App\Http\Controllers\BuyerController::class, 'checkout'])->name('buyer.checkout');
    Route::any('/save-order', [App\Http\Controllers\BuyerController::class, 'saveOrder'])->name('save.order');
    Route::any('/add-new-address', [App\Http\Controllers\BuyerController::class, 'address'])->name('buyer.address');

    Route::any('/followers/delete/{id}', [App\Http\Controllers\BuyerController::class, 'delete_followers'])->name('buyerDeleteFollower');
    Route::get('logout', [App\Http\Controllers\LandingController::class, 'logout'])->name('logout');


    Route::any('user-post', [App\Http\Controllers\UserPostController::class, 'index'])->name('buyerUserPost');
    Route::any('add-user-post', [App\Http\Controllers\UserPostController::class, 'create'])->name('buyerAddUserPost');
    Route::any('store-user-post', [App\Http\Controllers\UserPostController::class, 'store'])->name('buyerStoreUserPost');
    Route::any('edit-user-post/{id}', [App\Http\Controllers\UserPostController::class, 'edit'])->name('buyerEditUserPost');
    Route::any('update-user-post', [App\Http\Controllers\UserPostController::class, 'update'])->name('buyerUpdateUserPost');
    Route::any('like-post/{post_id}', [App\Http\Controllers\UserPostController::class, 'likePost'])->name('LikePost');
    Route::post('comment-post/', [App\Http\Controllers\UserPostController::class, 'commentPost'])->name('CommentPost');
    
    Route::any('delete-user-post/{id}', [App\Http\Controllers\UserPostController::class, 'destroy'])->name('buyerDeleteUserPost');
    Route::any('delete-user-post-file/{id}', [App\Http\Controllers\UserPostController::class, 'deleteUserPostFile'])->name('buyerDeleteUserPostFile');

    Route::any('address', [App\Http\Controllers\Buyer\AddressController::class, 'index'])->name('buyerAddress');
    Route::any('add-address', [App\Http\Controllers\Buyer\AddressController::class, 'create'])->name('buyerAddAddress');
    Route::any('store-address', [App\Http\Controllers\Buyer\AddressController::class, 'store'])->name('buyerStoreAddress');
    Route::any('edit-address/{id}', [App\Http\Controllers\Buyer\AddressController::class, 'editAddress'])->name('buyerEditAddress');
    Route::any('update-address', [App\Http\Controllers\Buyer\AddressController::class, 'update'])->name('buyerUpdateAddress');
    Route::any('view-address/{id}', [App\Http\Controllers\Buyer\AddressController::class, 'show'])->name('ViewAddress');
    Route::any('delete-address/{id}', [App\Http\Controllers\Buyer\AddressController::class, 'delete'])->name('buyerDeleteAddress');

    Route::any('product/favourite', [App\Http\Controllers\Buyer\ProductController::class, 'productFavourite'])->name('buyerFavouriteProduct');
    Route::any('product/favourite/delete/{id}', [App\Http\Controllers\Buyer\ProductController::class, 'delete_favourite'])->name('buyerDeleteFavourite');
    Route::any('orders', [App\Http\Controllers\Buyer\OrderController::class, 'orderList'])->name('buyerOrderList');
    Route::any('order/{id}', [App\Http\Controllers\Buyer\OrderController::class, 'viewOrder'])->name('buyerViewOrder');
});

Route::any('view-user-post/{id}', [App\Http\Controllers\UserPostController::class, 'show'])->name('buyerViewUserPost');


Route::get('carts', [App\Http\Controllers\LandingController::class, 'carts'])->name('carts');
Route::get('increase-decrease-cart/{cart_id}', [App\Http\Controllers\LandingController::class, 'increaseOrDecreaseCart'])->name('increase-decrease-cart');
Route::get('remove-cart/{cart_id}', [App\Http\Controllers\LandingController::class, 'removeCart'])->name('remove-cart');
Route::get('remove-all-cart', [App\Http\Controllers\LandingController::class, 'removeAllCart'])->name('remove-all-cart');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::any('dashboard', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.dashboard');
    //Route::any('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::any('products', [App\Http\Controllers\AdminController::class, 'products'])->name('admin.products');
    Route::any('add-product', [App\Http\Controllers\AdminController::class, 'add_product'])->name('adminAddProduct');
    Route::get('logout', [App\Http\Controllers\LandingController::class, 'logout'])->name('admin.logout');

    Route::any('buyers', [App\Http\Controllers\AdminController::class, 'buyers'])->name('admin.buyers');
    Route::any('sellers', [App\Http\Controllers\AdminController::class, 'sellers'])->name('admin.sellers');
    Route::any('advertisements', [App\Http\Controllers\AdminController::class, 'advertisements'])->name('admin.advertisements');
    Route::any('orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders');
    Route::any('order/{id}', [App\Http\Controllers\AdminController::class, 'viewOrder'])->name('adminViewOrder');
    Route::any('/edit-profile', [App\Http\Controllers\AdminController::class, 'edit_profile'])->name('admin.edit_profile');

    Route::any('faq', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('adminFaq');
    Route::any('add-faq', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('adminAddFaq');
    Route::any('store-faq', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('adminStoreFaq');
    Route::any('edit-faq/{id}', [App\Http\Controllers\Admin\FaqController::class, 'editFaq'])->name('adminEditFaq');
    Route::any('update-faq', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('adminUpdateFaq');
    Route::any('view-faq/{id}', [App\Http\Controllers\Admin\FaqController::class, 'show'])->name('ViewFaq');
    Route::any('delete-faq/{id}', [App\Http\Controllers\Admin\FaqController::class, 'delete'])->name('adminDeleteFaq');

    Route::any('chat', [App\Http\Controllers\Admin\ChatController::class, 'chat'])->name('admin.chat');
    Route::any('saveChat', [App\Http\Controllers\Admin\ChatController::class,'saveChat'])->name('adminSaveChat');
    Route::get('unreadMessage', [App\Http\Controllers\AdminChat\ChatController::class,'unreadMessage'])->name('unreadMessage');

    Route::get('/buyers/{id}/{status}', [App\Http\Controllers\AdminController::class, 'buyerStatusUpdate'])->name('admin.buyer.status');
    Route::get('/advertisements/{id}/{status}', [App\Http\Controllers\AdminController::class, 'advertisementStatusUpdate'])->name('admin.advertisement.status');
});



Route::get('get-started', [App\Http\Controllers\ProductController::class, 'getStarted'])->name('get-started');
Route::get('products', [App\Http\Controllers\ProductController::class, 'getProducts'])->name('products');
Route::get('search-results', [App\Http\Controllers\ProductController::class, 'searchresults'])->name('search-products');

Route::get('collection/{id}/products', [App\Http\Controllers\ProductController::class, 'getCollectionProducts'])->name('get-collectionproducts');

Route::post('get-pagination-records', [App\Http\Controllers\ProductController::class, 'paginationRecords'])->name('pagination-records');
Route::get('/products/{sku?}', [App\Http\Controllers\ProductController::class, 'productDetails'])->name('product-detail');

Route::get('get-pagination-records', [App\Http\Controllers\ProductController::class, 'paginationRecords'])->name('pagination-records');


Route::any('chat', [App\Http\Controllers\Chat\ChatController::class, 'chat'])->name('chat');
Route::any('saveChat', [App\Http\Controllers\Chat\ChatController::class,'saveChat'])->name('SaveChat');
Route::get('unreadMessage', [App\Http\Controllers\Chat\ChatController::class,'unreadMessage'])->name('unreadMessage');

Route::get('guest-buyer/{id}', [App\Http\Controllers\LandingController::class, 'guestBuyer'])->name('guest-buyer');
Route::get('pro-seller/{id}', [App\Http\Controllers\LandingController::class, 'proSeller'])->name('pro-seller');
Route::post('add-follow-user', [App\Http\Controllers\LandingController::class, 'addFollowUser'])->name('add-follow-user');
Route::post('add-wishlist-product', [App\Http\Controllers\LandingController::class, 'addWishlistProduct'])->name('add-wishlist-product');
Route::post('add-favourite-product', [App\Http\Controllers\LandingController::class, 'addFavouriteProduct'])->name('add-favourite-product');
Route::post('add-to-cart', [App\Http\Controllers\LandingController::class, 'addToCart'])->name('add-to-cart');
Route::get('buy-now/{product_id}', [App\Http\Controllers\LandingController::class, 'buyNow'])->name('buy-now');


Route::any('newsletter', [App\Http\Controllers\NewsletterController::class, 'sendNewsLetter'])->name('sendNewsLetter');

Route::get('profile/{user_id}', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
