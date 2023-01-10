<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Access\RoleController;
use App\Http\Controllers\LoginDirectController;
use App\Http\Controllers\Desa\PegawaiController;
use App\Http\Controllers\Desa\KeluargaController;
use App\Http\Controllers\Access\PermissionController;
use App\Http\Controllers\Setting\DesaSettingController;
use App\Http\Controllers\Setting\UmumSettingController;
use App\Http\Controllers\Akun\BiodataPendudukController;
use App\Http\Controllers\Dashboard\UserDashboardController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\KadesDashboardController;
use App\Http\Controllers\Setting\StoreDesaSettingController;
use App\Http\Controllers\Setting\StoreUmumSettingController;
use App\Http\Controllers\Akun\PrintBiodataPendudukController;
use App\Http\Controllers\Akun\KartuKeluargaPendudukController;
use App\Http\Controllers\Dashboard\PetugasDashboardController;
use App\Http\Controllers\Keluarga\AddAnggotaKeluargaController;
use App\Http\Controllers\Keluarga\StorePendudukMasukController;
use App\Http\Controllers\Keluarga\CreatePendudukMasukController;
use App\Http\Controllers\Keluarga\DeleteAnggotaKeluargaController;
use App\Http\Controllers\Keluarga\UpdateAnggotaKeluargaController;
use App\Http\Controllers\Akun\PrintKartuKeluargaPendudukController;
use App\Http\Controllers\Desa\LayananMandiriController;
use App\Http\Controllers\Penduduk\ResetPasswordController;
use App\Http\Controllers\User\BiodataController;

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
        Route::get('/biodata',\App\Http\Controllers\User\BiodataController::class)->name('biodata');
        Route::get('/keluarga',\App\Http\Controllers\User\KeluargaController::class)->name('keluarga');
        Route::get('/keluarga/print',\App\Http\Controllers\User\PrintKeluargaController::class)->name('keluarga.print');
        Route::get('/biodata/print',\App\Http\Controllers\User\PrintBiodataController::class)->name('biodata.print');
    });
    Route::post('api/fetch-rw', [DropdownController::class, 'fetchRw']);
    Route::post('api/fetch-rt', [DropdownController::class, 'fetchRt']);
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
        Route::resource('pegawai', PegawaiController::class);
        Route::get('penduduk/masuk', \App\Http\Controllers\Log\PendudukMasukController::class)->name('penduduk.masuk');
        Route::get('penduduk/lahir', \App\Http\Controllers\Log\PendudukLahirController::class)->name('penduduk.lahir');
        Route::post('penduduk/masuk', \App\Http\Controllers\Log\StorePendudukMasukController::class)->name('penduduk.masuk.store');
        Route::post('penduduk/lahir', \App\Http\Controllers\Log\StorePendudukLahirController::class)->name('penduduk.lahir.store');
        Route::get('penduduk/{penduduk}/print', [\App\Http\Controllers\Desa\PendudukController::class, 'print'])->name('penduduk.print');
        Route::get('penduduk/{penduduk}/biodata', [\App\Http\Controllers\Desa\PendudukController::class, 'biodata'])->name('penduduk.biodata');
        Route::resource('penduduk', \App\Http\Controllers\Desa\PendudukController::class);
        // route akun penduduk
        Route::prefix('akun')->name('akun.')->group(function(){
            Route::get('/penduduk/{penduduk}/create', \App\Http\Controllers\Akun\CreateAkunPendudukController::class)->name('penduduk.create');
            Route::post('/penduduk{penduduk}/store', \App\Http\Controllers\Akun\StoreAkunPendudukController::class)->name('penduduk.store');
       });
        // route keluarga
        Route::get('keluarga/{keluarga}/kartu', [\App\Http\Controllers\Desa\KeluargaController::class, 'kartu'])->name('keluarga.kartu');
        Route::get('keluarga/{keluarga}/print', [\App\Http\Controllers\Desa\KeluargaController::class, 'print'])->name('keluarga.print');
        Route::get('keluarga/create/pendudukMasuk', CreatePendudukMasukController::class)->name('keluarga.pendudukMasuk');
        Route::get('keluarga/{keluarga}/tambah/anggota', AddAnggotaKeluargaController::class)->name('keluarga.anggota.tambah');
        Route::post('keluarga/form/pendudukMasuk', StorePendudukMasukController::class)->name('keluarga.pendudukMasuk.store');
        Route::put('keluarga/{keluarga}/update/anggota', UpdateAnggotaKeluargaController::class)->name('keluarga.anggota.update');
        Route::delete('keluarga/{keluarga}/penduduk/{penduduk}/delete', DeleteAnggotaKeluargaController::class)->name('keluarga.anggota.delete');
        Route::resource('keluarga', KeluargaController::class);

        Route::get('layananMandiri/{layananMandiri}/user/{user}/reset', ResetPasswordController::class)->name('layananMandiri.reset');
        Route::resource('layananMandiri', LayananMandiriController::class);
    });

    // user
    // Route::get('biodata', BiodataPendudukController::class)->name('biodata.penduduk');
    // Route::get('biodata/print', PrintBiodataPendudukController::class)->name('biodata.print');
    // Route::get('kartu-keluarga', KartuKeluargaPendudukController::class)->name('kk.penduduk');
    // Route::get('kartu-keluarga/print', PrintKartuKeluargaPendudukController::class)->name('kk.print');


});