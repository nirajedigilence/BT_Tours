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
// Route::get('/', function () {
//     return view('welcome');
// });
//cron
//Route::get('/GetInFile', [App\Http\Controllers\CronController::class, 'GetInFile'])->name('GetInFile');
Route::get('/getsoketdata', function () {
       event(new \App\Events\MessagePushed());
       dd('Event run sucessfully');
    });
Route::get('/admin/users/fetch_data', [App\Http\Controllers\Admin\UserController::class, 'fetch_data'])->name('fetch_data');
Route::get('/admin/users/get_state', [App\Http\Controllers\Admin\UserController::class, 'get_state'])->name('get_state');
Route::get('/admin/users/get_city', [App\Http\Controllers\Admin\UserController::class, 'get_city'])->name('get_city');
Route::get('/admin/users/get_area', [App\Http\Controllers\Admin\UserController::class, 'get_area'])->name('get_area');

// Admin User
Route::get('/admin/admin_user/fetch_data', [App\Http\Controllers\Admin\AdminUserController::class, 'fetch_data'])->name('fetch_data');

// Delivery User
Route::get('/admin/delivery_user/fetch_data', [App\Http\Controllers\Admin\DeliveryUserController::class, 'fetch_data'])->name('fetch_data');
// category
Route::get('/admin/category/fetch_data', [App\Http\Controllers\Admin\CategoryController::class, 'fetch_data'])->name('fetch_data');
Route::get('/admin/category/status', [App\Http\Controllers\Admin\CategoryController::class, 'status'])->name('status');

// Offers
Route::get('/admin/offers/fetch_data', [App\Http\Controllers\Admin\OffersController::class, 'fetch_data'])->name('fetch_data');
// brand management
Route::get('/admin/brand_management/fetch_data', [App\Http\Controllers\Admin\BrandManagementController::class, 'fetch_data'])->name('fetch_data');
// Product management
Route::get('/admin/product_management/fetch_data', [App\Http\Controllers\Admin\ProductController::class, 'fetch_data'])->name('fetch_data');
Route::get('/admin/product_management/get_mrp_price', [App\Http\Controllers\Admin\ProductController::class, 'get_mrp_price'])->name('get_mrp_price');
// Product management
Route::get('/admin/tip_management/fetch_data', [App\Http\Controllers\Admin\TipController::class, 'fetch_data'])->name('fetch_data');

// promocode
Route::get('/admin/promocode/fetch_data', [App\Http\Controllers\Admin\PromoCodeController::class, 'fetch_data'])->name('fetch_data');
// contect us 
Route::get('/admin/contect_us/fetch_data', [App\Http\Controllers\Admin\ContectUsController::class, 'fetch_data'])->name('fetch_data');

// fetch view 
Route::get('/admin/order_management/fetch_data', [App\Http\Controllers\Admin\OrderManagementController::class, 'fetch_data'])->name('fetch_data');
// Route::get('/admin/order_management/assign/fetch_data', [App\Http\Controllers\Admin\OrderManagementController::class, 'fetch_data_assign'])->name('fetch_data_assign');
// Route::get('/admin/order_management/delivered/fetch_data', [App\Http\Controllers\Admin\OrderManagementController::class, 'fetch_data'])->name('fetch_data');

Route::get('/admin/delivery_zipcode/fetch_data', [App\Http\Controllers\Admin\DeliveryZipCodeController::class, 'fetch_data'])->name('fetch_data');

// View 
// Route::get('/admin/order_management/pending', [App\Http\Controllers\Admin\OrderManagementController::class, 'index'])->name('index');
// Route::get('/admin/order_management/assign', [App\Http\Controllers\Admin\OrderManagementController::class, 'index'])->name('index');
Route::get('/admin/order_management/{id}', [App\Http\Controllers\Admin\OrderManagementController::class, 'index'])->name('index');
// CMS
Route::get('/admin/cms/fetch_data', [App\Http\Controllers\Admin\CMSManagementController::class, 'fetch_data'])->name('fetch_data');
Route::get('/admin/order_management/status_store', [App\Http\Controllers\Admin\OrderManagementController::class, 'status_store'])->name('status_store');
Route::get('/admin/product_management/product_sku', [App\Http\Controllers\Admin\ProductController::class, 'product_sku'])->name('product_sku');
Route::get('/admin/product_management/status', [App\Http\Controllers\Admin\ProductController::class, 'status'])->name('status');


Route::prefix('admin')->middleware(['auth', 'admin.auth'])->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //user
    Route::get   ('/users/{id}/show', 'App\Http\Controllers\Admin\UserController@show')->name('users.show');
    Route::resource('/users', 'App\Http\Controllers\Admin\UserController')->name('*', 'users');

    // Admin Users

    Route::get('/admin_user/{id}/show', 'App\Http\Controllers\Admin\AdminUserController@show')->name('admin_user.show');
    Route::resource('/admin_user', 'App\Http\Controllers\Admin\AdminUserController')->name('*', 'admin_user');

    // Delivery Users
    Route::get('/delivery_user/rider_restore', 'App\Http\Controllers\Admin\DeliveryUserController@rider_restore')->name('delivery_user.rider_restore');
    Route::post('/delivery_user/rider_restore_store', 'App\Http\Controllers\Admin\DeliveryUserController@rider_restore_store')->name('delivery_user.rider_restore_store');
    Route::get('/delivery_user/{id}/show', 'App\Http\Controllers\Admin\DeliveryUserController@show')->name('delivery_user.show');
    Route::resource('/delivery_user', 'App\Http\Controllers\Admin\DeliveryUserController')->name('*', 'delivery_user');

     // category 

    Route::get('/category/{id}/show', 'App\Http\Controllers\Admin\CategoryController@show')->name('category.show');
    Route::resource('/category', 'App\Http\Controllers\Admin\CategoryController')->name('*', 'category');
    

    // offers 

    Route::get('/offers/{id}/show', 'App\Http\Controllers\Admin\OffersController@show')->name('offers.show');
    Route::resource('/offers', 'App\Http\Controllers\Admin\OffersController')->name('*', 'offers');

    // brand management 

    Route::get('/brand_management/{id}/show', 'App\Http\Controllers\Admin\BrandManagementController@show')->name('brand_management.show');
    Route::resource('/brand_management', 'App\Http\Controllers\Admin\BrandManagementController')->name('*', 'brand_management');

    // Product management 

    Route::get('/product_management/{id}/show', 'App\Http\Controllers\Admin\ProductController@show')->name('product_management.show');
    Route::resource('/product_management', 'App\Http\Controllers\Admin\ProductController')->name('*', 'product_management');
    Route::get('/product_management/delete_id', 'App\Http\Controllers\Admin\ProductController@delete_image')->name('product_management.delete_image');
    // Route::delete('/deleteimage/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteimage']);
    // Route::delete('/deleteimage/{id}', 'App\Http\Controllers\Admin\ProductController@deleteimage')->name('*', 'deleteimage');
    // PromoCode

    Route::get('/promocode/{id}/show', 'App\Http\Controllers\Admin\PromoCodeController@show')->name('promocode.show');
    Route::resource('/promocode', 'App\Http\Controllers\Admin\PromoCodeController')->name('*', 'promocode');

    // Tip Management

    Route::get('/tip_management/{id}/show', 'App\Http\Controllers\Admin\TipController@show')->name('tip_management.show');
    Route::resource('/tip_management', 'App\Http\Controllers\Admin\TipController')->name('*', 'tip_management');

    // Order Management

    Route::get('/order_status/{id}/show', 'App\Http\Controllers\Admin\OrderManagementController@show')->name('order_management.show');
    Route::resource('/order_status', 'App\Http\Controllers\Admin\OrderManagementController')->name('*', 'order_management');
    Route::get('/order_status/{id}/order_status', 'App\Http\Controllers\Admin\OrderManagementController@order_status')->name('order_status.order_status');

    Route::post('/order_status/status_store', 'App\Http\Controllers\Admin\OrderManagementController@status_store')->name('order_management.status_store');

    Route::get('/order_status/{id}/assign_rider', 'App\Http\Controllers\Admin\OrderManagementController@assign_rider')->name('order_management.assign_rider');
    Route::post('/order_status/assign_rider', 'App\Http\Controllers\Admin\OrderManagementController@assign_rider_store')->name('order_management.assign_rider_store');
    
    Route::get('/order_status/{id}/show', 'App\Http\Controllers\Admin\OrderManagementController@show')->name('order_management.show');
    Route::get('/order_status/{id}/delivered_images', 'App\Http\Controllers\Admin\OrderManagementController@delivered_images')->name('order_management.delivered_images');
    Route::get('/order_status/{id}/large_image', 'App\Http\Controllers\Admin\OrderManagementController@delivered_large_images')->name('order_management.delivered_large_images');
    Route::get('/order_status/{id}/upload_large_proof_image', 'App\Http\Controllers\Admin\OrderManagementController@upload_large_proof_image')->name('order_management.upload_large_proof_image');

    // CMS Management

    Route::get('/cms/{id}/show', 'App\Http\Controllers\Admin\CMSManagementController@show')->name('cms.show');
    Route::resource('/cms', 'App\Http\Controllers\Admin\CMSManagementController')->name('*', 'cms');
    // settings

    Route::get('/settings/{id}/show', 'App\Http\Controllers\Admin\SettingsController@show')->name('settings.show');
    Route::resource('/settings', 'App\Http\Controllers\Admin\SettingsController')->name('*', 'settings');

    // contect us
    // settings
    // Route::get('/contect_us/{id}/create', 'App\Http\Controllers\Admin\ContectUsController@assign_rider')->name('contect_us.cretae');

    Route::get('/contect_us/{id}/show', 'App\Http\Controllers\Admin\ContectUsController@show')->name('contect_us.show');
    Route::resource('/contect_us', 'App\Http\Controllers\Admin\ContectUsController')->name('*', 'contect_us');

    Route::get('/delivery_zipcode/{id}/show', 'App\Http\Controllers\Admin\DeliveryZipCodeController@show')->name('delivery_zipcode.show');
    Route::resource('/delivery_zipcode', 'App\Http\Controllers\Admin\DeliveryZipCodeController')->name('*', 'delivery_zipcode');







});

/*Route::prefix('yusen')->middleware(['auth', 'yusen.auth'])->group(function () {

    Route::get('/', function () {
        return view('yusen.dashboard');
    })->name('yusen');
    
   
});*/
/* Route::get('/', function () {
        return view('home');
    })->name('home');*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/demoupload', [App\Http\Controllers\CronController::class, 'demoupload'])->name('demoupload');

/*Route::prefix('/')->middleware(['auth','customer.auth'])->group(function () {

});
*/
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms-condition', [App\Http\Controllers\HomeController::class, 'terms_condition'])->name('terms_condition');
Route::get('/send_mail', [App\Http\Controllers\HomeController::class, 'send_mail'])->name('send_mail');
