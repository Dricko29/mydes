<?php

use App\Http\Controllers\Access\PermissionController;
use App\Http\Controllers\Access\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginDirectController;
use App\Http\Controllers\Setting\DesaSettingController;
use App\Http\Controllers\Setting\UmumSettingController;
use App\Http\Controllers\Dashboard\UserDashboardController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\KadesDashboardController;
use App\Http\Controllers\Setting\StoreDesaSettingController;
use App\Http\Controllers\Setting\StoreUmumSettingController;
use App\Http\Controllers\Dashboard\PetugasDashboardController;

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

// Main Page Route
Route::get('/', HomeController::class)->name('home');
// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', LoginDirectController::class)->name('dashboard');

    /* Route Admin*/
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function(){
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
    });
    /* Route Petugas*/
    Route::prefix('petugas')->name('petugas.')->middleware('role:petugas')->group(function(){
        Route::get('/dashboard', PetugasDashboardController::class)->name('dashboard');
    });
    /* Route Kades*/
    Route::prefix('kades')->name('kades.')->middleware('role:kades')->group(function(){
        Route::get('/dashboard', KadesDashboardController::class)->name('dashboard');
    });
    /* Route User*/
    Route::prefix('user')->name('user.')->middleware('role:user')->group(function(){
        Route::get('/dashboard', UserDashboardController::class)->name('dashboard');
    });

    Route::prefix('site')->name('site.')->group(function(){
        Route::prefix('settings')->name('settings.')->middleware('role:admin')->group(function(){
           Route::get('/umum', UmumSettingController::class)->name('app.umum'); 
           Route::post('/umum', StoreUmumSettingController::class)->name('app.umum.store'); 
           Route::get('/desa', DesaSettingController::class)->name('app.desa'); 
           Route::post('/desa', StoreDesaSettingController::class)->name('app.desa.store'); 
        });

        Route::get('roles/list', [RoleController::class, 'listData'])->name('roles.list');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });

});