<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\admin\AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\admin\AdminController::class, 'login'])->name('login.submit');
    Route::get('/logout', [App\Http\Controllers\admin\AdminController::class, 'logout'])->name('logout');

        Route::middleware('auth:admin')->group(function () {
            Route::get('/index', [App\Http\Controllers\admin\AdminController::class, 'show'])->name('admin.index');
            Route::get('/main', [App\Http\Controllers\admin\AdminController::class, 'showmain'])->name('admin.main');
            Route::group(['prefix' => 'domain'], function () {
                Route::get('/', [App\Http\Controllers\admin\DomainController::class, 'index'])->name('domain.index');
                Route::get('/create', [App\Http\Controllers\admin\DomainController::class, 'create'])->name('domain.create');
                Route::post('/store', [App\Http\Controllers\admin\DomainController::class, 'store'])->name('domain.store');
                Route::get('/edit/{id}', [App\Http\Controllers\admin\DomainController::class, 'edit'])->name('domain.edit');
                Route::post('/update/{id}', [App\Http\Controllers\admin\DomainController::class, 'update'])->name('domain.update');
                Route::post('/delete/{id}', [App\Http\Controllers\admin\DomainController::class, 'delete'])->name('domain.delete');
            });
            Route::group(['prefix' => 'service'], function () {
                Route::get('/', [App\Http\Controllers\admin\ServiceController::class, 'index'])->name('service.index');
                Route::get('/create', [App\Http\Controllers\admin\ServiceController::class, 'create'])->name('service.create');
                Route::post('/store', [App\Http\Controllers\admin\ServiceController::class, 'store'])->name('service.store');
                Route::get('/edit/{id}', [App\Http\Controllers\admin\ServiceController::class, 'edit'])->name('service.edit');
                Route::post('/update/{id}', [App\Http\Controllers\admin\ServiceController::class, 'update'])->name('service.update');
                Route::post('/delete/{id}', [App\Http\Controllers\admin\ServiceController::class, 'delete'])->name('service.delete');
            });
            Route::group(['prefix' => 'SiteSetting'], function () {
                Route::get('/', [App\Http\Controllers\admin\SiteSettingController::class, 'index'])->name('SiteSetting.index');
                Route::get('/create', [App\Http\Controllers\admin\SiteSettingController::class, 'create'])->name('SiteSetting.create');
                Route::post('/store', [App\Http\Controllers\admin\SiteSettingController::class, 'store'])->name('SiteSetting.store');
                Route::get('/edit/{siteSetting}', [App\Http\Controllers\admin\SiteSettingController::class, 'edit'])->name('SiteSetting.edit');
                Route::post('/update/{siteSetting}', [App\Http\Controllers\admin\SiteSettingController::class, 'update'])->name('SiteSetting.update');
                Route::post('/delete/{siteSetting}', [App\Http\Controllers\admin\SiteSettingController::class, 'delete'])->name('SiteSetting.delete');
            });
            Route::group(['prefix' => 'accessory'], function () {
                Route::get('/', [App\Http\Controllers\admin\AccessoryController::class, 'index'])->name('accessory.index');
                Route::get('/create', [App\Http\Controllers\admin\AccessoryController::class, 'create'])->name('accessory.create');
                Route::post('/store', [App\Http\Controllers\admin\AccessoryController::class, 'store'])->name('accessory.store');
                Route::get('/edit/{id}', [App\Http\Controllers\admin\AccessoryController::class, 'edit'])->name('accessory.edit');
                Route::post('/update/{id}', [App\Http\Controllers\admin\AccessoryController::class, 'update'])->name('accessory.update');
                Route::post('/delete/{id}', [App\Http\Controllers\admin\AccessoryController::class, 'delete'])->name('accessory.delete');
            });
            Route::group(['prefix' => 'type'], function () {
                Route::get('/', [App\Http\Controllers\admin\TypeController::class, 'index'])->name('type.index');
                Route::get('/create', [App\Http\Controllers\admin\TypeController::class, 'create'])->name('type.create');
                Route::post('/store', [App\Http\Controllers\admin\TypeController::class, 'store'])->name('type.store');
                Route::get('/edit/{id}', [App\Http\Controllers\admin\TypeController::class, 'edit'])->name('type.edit');
                Route::post('/update/{id}', [App\Http\Controllers\admin\TypeController::class, 'update'])->name('type.update');
                Route::post('/delete/{id}', [App\Http\Controllers\admin\TypeController::class, 'delete'])->name('type.delete');
            });
            Route::group(['prefix' => 'estimate'], function () {
                Route::get('/', [App\Http\Controllers\admin\EstimateController::class, 'index'])->name('estimate.index');
                Route::post('/delete/{estimate}', [App\Http\Controllers\admin\EstimateController::class, 'delete'])->name('estimate.delete');
                Route::get('/detail/{estimate}', [App\Http\Controllers\admin\EstimateController::class, 'details'])->name('estimate.detail');
            });
            Route::group(['prefix' => 'profile'], function () {
                Route::get('/', [App\Http\Controllers\admin\AdminController::class, 'index'])->name('profile.index');
                // Route::get('/create', [App\Http\Controllers\admin\AdminController::class, 'create'])->name('profile.create');
                // Route::post('/store', [App\Http\Controllers\admin\AdminController::class, 'store'])->name('profile.store');
                Route::get('/edit/{id}', [App\Http\Controllers\admin\AdminController::class, 'edit'])->name('profile.edit');
                Route::post('/update/{id}', [App\Http\Controllers\admin\AdminController::class, 'update'])->name('profile.update');
                // Route::post('/delete/{id}', [App\Http\Controllers\admin\AdminController::class, 'delete'])->name('profile.delete');
            });

        });
});

Route::post('/send', [App\Http\Controllers\admin\estimateController::class, 'send'])->name('estimate.send');
Route::get('/home', [App\Http\Controllers\site\FrontController::class ,'sitesetting']);
Route::get('/contact', [App\Http\Controllers\site\FrontController::class ,'contact'])->name('contact');
Route::get('/domain/{id}', [App\Http\Controllers\site\FrontController::class ,'domainD'])->name('domaind');
Route::get('/service/{id}', [App\Http\Controllers\site\FrontController::class ,'service'])->name('service');
Route::get('/accessory', [App\Http\Controllers\site\FrontController::class, 'Accessory'])->name('accessory');
Route::get('/', [App\Http\Controllers\site\FrontController::class, 'frontData']);




