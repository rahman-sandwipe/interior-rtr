<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

    Route::group(['middleware' => ['api']], function () {
        Route::get('/emailList',                    [EmailController::class, 'emailList'])->name('emailList');
        Route::post('/emailSend',                   [EmailController::class, 'emailSend'])->name('emailSend');
        Route::get('/emailDetails/{contactMsg}',    [EmailController::class, 'emailDetails']);
        Route::post('/emailReply/{contactMsg}',     [EmailController::class, 'emailReply']);
        Route::delete('/emailDelete/{contactMsg}',  [EmailController::class, 'emailDelete']);

        Route::get('/bannerList',                   [BannerController::class, 'bannerList']);
        Route::get('/bannerDetails/{banner}',       [BannerController::class, 'bannerDetails']);
        
        Route::get('/getServices',                  [ServiceController::class, 'getServices']);
        Route::get('/getService/{service}',         [ServiceController::class, 'getServiceDetails']);
        Route::post('/service-insert',              [ServiceController::class, 'serviceInsert'])->name('serviceInsert');
    
    
        /** Category API Routes */
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/categoryList',                     'categoryList')->name('categoryList');
            Route::post('/category-insert',                 'categoryInsert')->name('categoryInsert');
            Route::get('/getCategory/{category}',           'getCategory')->name('getCategory');
            Route::get('/category-edit/{category}',         'editCategory')->name('categoryEdit');
            Route::get('/category-delete/{category}',       'destroyCategory')->name('categoryDelete');
            Route::post('/category-update',                 'updateCategory')->name('categoryUpdate');
        });
    });