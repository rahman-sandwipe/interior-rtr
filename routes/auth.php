<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AboutsController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\AuthenticateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Authentication Route inclode in [auth.php] file
Route::controller(AuthenticateController::class)->middleware('guest')->group(function(){
    Route::get('/register',                 'registerPage')->name('register');
    Route::post('/register',                'registerFrom');

    Route::get('/login',                    'loginPage')->name('login');
    Route::post('/login',                   'loginFrom');

    Route::get('/forgot-password',          'forgotPasswordPage')->name('forget.password');
    Route::post('/forgot-password',         'forgotPasswordFrom');

    Route::get('/logout',                   'logout')->name('Logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',                 [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout',                   [AuthenticateController::class, 'logout'])->name('logout');

    Route::controller(AboutsController::class)->group(function(){
        Route::get('/abouts',                'index')->name('abouts.index');
        Route::post('/abouts',               'update')->name('abouts.update');
        Route::get('/abouts/{id}',           'show')->name('abouts.show');
        Route::put('/abouts/{id}',           'update')->name('abouts.update');
        Route::delete('/abouts/{id}',        'destroy')->name('abouts.destroy');
    });     // Abouts Route

    Route::controller(ServiceController::class)->group(function(){
        Route::get('/service',                'index')->name('service.index');
        Route::post('/service',               'store')->name('service.store');
        Route::get('/service/{id}',           'show')->name('service.show');
        Route::put('/service/{id}',           'update')->name('service.update');
        Route::delete('/service/{id}',        'destroy')->name('service.destroy');
    });     // Service Route
    
    Route::controller(BannersController::class)->group(function(){
        Route::get('/banners',                'index')->name('banner.index');
        Route::post('/banners',               'store')->name('banner.store');
        Route::get('/banners/{id}',           'edit')->name('banner.edit');
        Route::put('/banners/{id}',           'update')->name('banner.update');
        Route::delete('/banners/{id}',        'destroy')->name('banner.destroy');
    });     // Banners Route
});