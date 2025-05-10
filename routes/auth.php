<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EmailController;
use App\Http\Controllers\AboutsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
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
    Route::get('/dashboard',    [DashboardController::class, 'dashboard'])->name('dashboard'); /* Display dashboard page */
    Route::get('/products',     [ProductController::class, 'productPage'])->name('products.index'); /* Display product page */
    Route::get('/suppliers',    [SupplierController::class, 'supplierPage'])->name('supplier.index'); /* Display supplier page */
    Route::get('/categories',   [CategoryController::class, 'categoryPage'])->name('category.index'); /* Display category page */
    Route::get('/emails',       [EmailController::class,        'emailPage'])->name('email.index'); /* Display email page */
    Route::get('/abouts',       [AboutsController::class,       'aboutsPage'])->name('about.index'); /* Display abouts page */
    Route::get('/contacts',     [ContactController::class,      'contactPage'])->name('contact.index'); /* Display contact page */
    Route::get('/service',      [ServiceController::class,      'servicePage'])->name('service.index'); /* Display service page */
    Route::post('/logout',      [AuthenticateController::class, 'logout'])->name('logout');    /* Display dashboard page */
    Route::get('/banners',      [BannerController::class,      'bannerPage'])->name('banner.index'); /* Display banner page */
});
