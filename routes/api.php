<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\EmailController;

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
        Route::get('/emailList',                  [EmailController::class,'emailList'])->name('emailList');
        Route::get('/emailDetails/{contactMsg}',  [EmailController::class, 'emailDetails']);
        Route::post('/emailReply/{contactMsg}',   [EmailController::class, 'emailReply']);

        Route::get('/bannerList',                   [BannerController::class, 'bannerList']);
        Route::get('/bannerDetails/{banner}',       [BannerController::class, 'bannerDetails']);
    });
