<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;

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
        Route::get('/contactList',                  [ContactController::class,'contactList'])->name('contactList');
        Route::get('/contactDetails/{contactMsg}',  [ContactController::class, 'contactDetails']);
        Route::post('/contactReply/{contactMsg}',   [ContactController::class, 'contactReply']);

        Route::get('/bannerList',                   [BannerController::class, 'bannerList']);
        Route::get('/bannerDetails/{banner}',       [BannerController::class, 'bannerDetails']);
    });
