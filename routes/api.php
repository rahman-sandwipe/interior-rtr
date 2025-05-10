<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

/* ----------------- | API Routes | ----------------- */
Route::group(['middleware' => ['api']], function () {        
    /** Product API Routes */
    Route::controller(ProductController::class)->group(function(){
        Route::get('/productList',                     'productList')->name('productList');
        Route::post('/product-insert',                 'productInsert')->name('productInsert');
        Route::get('/getProduct/{product}',            'getProduct')->name('getProduct');
        Route::get('/product-edit/{product}',          'editProduct')->name('productEdit');
        Route::post('/product-update',                 'updateProduct')->name('productUpdate');
        Route::get('/product-delete/{product}',        'destroyProduct')->name('productDelete');
    });

    /** Supplier API Routes */
    Route::controller(SupplierController::class)->group(function(){
        Route::get('/supplierList',                     'supplierList')->name('supplierList');
        Route::post('/supplier-insert',                 'supplierInsert')->name('supplierInsert');
        Route::get('/getSupplier/{supplier}',           'getSupplier')->name('getSupplier');
        Route::get('/supplier-edit/{supplier}',         'editSupplier')->name('supplierEdit');
        Route::post('/supplier-update/{supplier}',      'updateSupplier')->name('supplierUpdate');
        Route::get('/supplier-delete/{supplier}',       'destroySupplier')->name('supplierDelete');
    });
    
    /** Category API Routes */
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categoryList',                     'categoryList')->name('categoryList');
        Route::post('/category-insert',                 'categoryInsert')->name('categoryInsert');
        Route::get('/getCategory/{category}',           'getCategory')->name('getCategory');
        Route::get('/category-edit/{category}',         'editCategory')->name('categoryEdit');
        Route::get('/category-delete/{category}',       'destroyCategory')->name('categoryDelete');
        Route::post('/category-update',                 'updateCategory')->name('categoryUpdate');
    });

    /** Email API Route */
    Route::controller(EmailController::class)->group(function(){
        Route::get('/emailList',                        'emailList')->name('emailList');
        Route::post('/emailSend',                       'emailSend')->name('emailSend');
        Route::get('/emailDetails/{contactMsg}',        'emailDetails');
        Route::post('/emailReply/{contactMsg}',         'emailReply');
        Route::delete('/emailDelete/{contactMsg}',      'emailDelete');
    });

    /** Service API Route */
    Route::controller(ServiceController::class)->group(function(){
        Route::get('/getServices',                      'getServices');
        Route::get('/getService/{service}',             'getServiceDetails');
        Route::post('/service-insert',                  'serviceInsert')->name('serviceInsert');
    });

    /** Banner API Route */
    Route::controller(BannerController::class)->group(function(){
        Route::get('/bannerDetails/{banner}',           'bannerDetails');
        Route::get('/bannerList',                       'bannerList')->name('bannerList');
        Route::post('/banner-insert',                   'bannerInsert')->name('bannerInsert');
        Route::get('/getBanner/{banner}',               'getBanner')->name('getBanner');
        Route::get('/banner-edit/{banner}',             'editBanner')->name('bannerEdit');
        Route::post('/banner-update',                   'updateBanner')->name('bannerUpdate');
        Route::get('/banner-delete/{banner}',           'destroyBanner')->name('bannerDelete');
    });

    Route::controller(CustomerController::class)->group(function(){
        Route::get('/customerList',                     'customerList')->name('customerList');
        Route::post('/customer-insert',                 'customerInsert')->name('customerInsert');
        Route::get('/getCustomer/{customer}',           'getCustomer')->name('getCustomer');
        Route::get('/customer-edit/{customer}',         'editCustomer')->name('customerEdit');
        Route::post('/customer-update/{customer}',      'updateCustomer')->name('customerUpdate');
        Route::get('/customer-delete/{customer}',       'destroyCustomer')->name('customerDelete');
    });
});