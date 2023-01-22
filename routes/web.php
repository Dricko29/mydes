<?php

use App\Http\Controllers\Akun\CommentUserController;
use App\Http\Controllers\Akun\PermohonanSuratController;
use App\Http\Controllers\Akun\StorePermohonanSuratController;
use App\Http\Controllers\Desa\Penduduk\LogPendudukLahirController;
use App\Http\Controllers\Desa\PermohonanSurat\TolakPermohonanSuratController;
use App\Http\Controllers\Desa\Setting\VisiMisiSettingController;
use App\Http\Controllers\Desa\Statistik\StatistikAgamaPendudukController;
use App\Http\Controllers\Statik\DetailBeritaController;
use App\Http\Controllers\Statik\ListBeritaController;
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

// Main Page Route
Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
// locale Route
Route::get('lang/{locale}', [\App\Http\Controllers\LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', \App\Http\Controllers\LoginDirectController::class)->name('dashboard');

    /* Route Admin*/
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', \App\Http\Controllers\Dashboard\AdminDashboardController::class)->name('dashboard');
    });
    /* Route Petugas*/
    Route::prefix('petugas')->name('petugas.')->middleware('role:petugas')->group(function () {
        Route::get('/dashboard', \App\Http\Controllers\Dashboard\PetugasDashboardController::class)->name('dashboard');
    });
    /* Route Kades*/
    Route::prefix('kades')->name('kades.')->middleware('role:kades')->group(function () {
        Route::get('/dashboard', \App\Http\Controllers\Dashboard\KadesDashboardController::class)->name('dashboard');
    });
    /* Route User*/
    Route::prefix('user')->name('user.')->middleware('role:user')->group(function () {
        Route::get('/dashboard', \App\Http\Controllers\Dashboard\UserDashboardController::class)->name('dashboard');
        Route::get('/biodata', \App\Http\Controllers\User\BiodataController::class)->name('biodata');
        Route::get('/keluarga', \App\Http\Controllers\User\KeluargaController::class)->name('keluarga');
        Route::get('/keluarga/print', \App\Http\Controllers\User\PrintKeluargaController::class)->name('keluarga.print');
        Route::get('/biodata/print', \App\Http\Controllers\User\PrintBiodataController::class)->name('biodata.print');
        Route::get('/surat', \App\Http\Controllers\Akun\SuratUserController::class)->name('surat.user');
        Route::get('/surat/ajukan', \App\Http\Controllers\Akun\AjukanSuratController::class)->name('surat.ajukan');
        Route::get('/form/surat/{id}', \App\Http\Controllers\Akun\FormSuratController::class)->name('form.surat');
        Route::post('kirim/permohonan', \App\Http\Controllers\Akun\StorePermohonanSuratController::class)->name('kirim.permohonan');
        Route::get('/arsip/surat', \App\Http\Controllers\Akun\ArsipSuratUserController::class)->name('arsip.surat');
    });
    Route::post('api/fetch-rw', [\App\Http\Controllers\DropdownController::class, 'fetchRw']);
    Route::post('api/fetch-rt', [\App\Http\Controllers\DropdownController::class, 'fetchRt']);
    Route::prefix('site')->name('site.')->group(function () {
        Route::prefix('settings')->name('settings.')->middleware('role:admin')->group(function () {
            Route::get('/umum', \App\Http\Controllers\Setting\UmumSettingController::class)->name('app.umum');
            Route::post('/umum', \App\Http\Controllers\Setting\StoreUmumSettingController::class)->name('app.umum.store');
            Route::get('/desa', \App\Http\Controllers\Setting\DesaSettingController::class)->name('app.desa');
            Route::post('/desa', \App\Http\Controllers\Setting\StoreDesaSettingController::class)->name('app.desa.store');
            Route::get('/visi_misi', \App\Http\Controllers\Setting\VisiMisiSettingController::class)->name('app.desa.visi.misi');
            Route::post('/visi_misi', \App\Http\Controllers\Setting\StoreVisiMisiSettingController::class)->name('app.desa.visi.misi');
        });

        Route::get('roles/list', [\App\Http\Controllers\Access\RoleController::class, 'listData'])->name('roles.list');
        Route::resource('roles', \App\Http\Controllers\Access\RoleController::class);
        Route::resource('permissions', \App\Http\Controllers\Access\PermissionController::class);
        // route pegawai
        Route::get('pegawai/{pegawai}/status', \App\Http\Controllers\Pegawai\PegawaiStatusController::class)->name('pegawai.status');
        Route::get('pegawai/{pegawai}/ttd', \App\Http\Controllers\Pegawai\PegawaiTtdController::class)->name('pegawai.ttd');
        Route::resource('pegawai', \App\Http\Controllers\Desa\PegawaiController::class);
        // route penduduk
        Route::get('penduduk/masuk', \App\Http\Controllers\Log\PendudukMasukController::class)->name('penduduk.masuk');
        Route::get('penduduk/lahir', \App\Http\Controllers\Log\PendudukLahirController::class)->name('penduduk.lahir');
        Route::post('penduduk/masuk', \App\Http\Controllers\Log\StorePendudukMasukController::class)->name('penduduk.masuk.store');
        Route::post('penduduk/lahir', \App\Http\Controllers\Log\StorePendudukLahirController::class)->name('penduduk.lahir.store');

        // log penduduk
        Route::get('logPendudukLahir', \App\Http\Controllers\Desa\Penduduk\LogPendudukLahirController::class)->name('log.penduduk.lahir');

        Route::get('penduduk/{penduduk}/print', \App\Http\Controllers\Desa\Penduduk\PrintBiodataPendudukController::class)->name('penduduk.print');
        Route::get('penduduk/{penduduk}/biodata', \App\Http\Controllers\Desa\Penduduk\BiodataPendudukController::class)->name('penduduk.biodata');
        Route::post('penduduk/bulkDelete', \App\Http\Controllers\Desa\Penduduk\BulkDeletePendudukController::class)->name('penduduk.bulkDelete');
        Route::resource('penduduk', \App\Http\Controllers\Desa\Penduduk\PendudukController::class);
        // route akun penduduk
        Route::prefix('akun')->name('akun.')->group(function () {
            Route::get('/penduduk/{penduduk}/create', \App\Http\Controllers\Akun\CreateAkunPendudukController::class)->name('penduduk.create');
            Route::post('/penduduk{penduduk}/store', \App\Http\Controllers\Akun\StoreAkunPendudukController::class)->name('penduduk.store');
        });
        // route keluarga
        Route::get('keluarga/{keluarga}/kartu', [\App\Http\Controllers\Desa\KeluargaController::class, 'kartu'])->name('keluarga.kartu');
        Route::get('keluarga/{keluarga}/print', [\App\Http\Controllers\Desa\KeluargaController::class, 'print'])->name('keluarga.print');
        Route::get('keluarga/create/pendudukMasuk', \App\Http\Controllers\Keluarga\CreatePendudukMasukController::class)->name('keluarga.pendudukMasuk');
        Route::get('keluarga/{keluarga}/tambah/anggota', \App\Http\Controllers\Keluarga\AddAnggotaKeluargaController::class)->name('keluarga.anggota.tambah');
        Route::post('keluarga/form/pendudukMasuk', \App\Http\Controllers\Keluarga\StorePendudukMasukController::class)->name('keluarga.pendudukMasuk.store');
        Route::put('keluarga/{keluarga}/update/anggota', \App\Http\Controllers\Keluarga\UpdateAnggotaKeluargaController::class)->name('keluarga.anggota.update');
        Route::delete('keluarga/{keluarga}/penduduk/{penduduk}/delete', \App\Http\Controllers\Keluarga\DeleteAnggotaKeluargaController::class)->name('keluarga.anggota.delete');
        Route::resource('keluarga', \App\Http\Controllers\Desa\KeluargaController::class);
        // Route layanan mandiri
        Route::get('layananMandiri/{layananMandiri}/user/{user}/reset', \App\Http\Controllers\LayananMandiri\ResetPasswordController::class)->name('layananMandiri.reset');
        Route::resource('layananMandiri', \App\Http\Controllers\LayananMandiri\LayananMandiriController::class);
        // route pembangunan
        Route::get('pembangunan/{pembangunan}/print', \App\Http\Controllers\Pembangunan\PrintPembangunanController::class)->name('pembangunan.print');
        Route::resource('pembangunan', \App\Http\Controllers\Desa\PembangunanController::class);
        // dokumentasi pembangunan detail
        Route::get('dokumentasi/pembangunan/{pembangunan}', \App\Http\Controllers\Pembangunan\DokumentasiPembangunanDetailController::class)->name('dokumentasi.pembangunan');
        Route::get('dokumentasi/pembangunan/{pembangunan}/create', \App\Http\Controllers\Pembangunan\CreateDokumentasiPembangunanDetailController::class)->name('dokumentasi.pembangunan.detail.create');
        Route::post('dokumentasi/pembangunan/{pembangunan}', \App\Http\Controllers\Pembangunan\StoreDokumentasiPembangunanDetailController::class)->name('dokumentasi.pembangunan.detail.store');
        Route::delete('dokumentasi/pembangunan/{pembangunan}/dokumentasiPembangunan/{dokumentasiPembangunan}', \App\Http\Controllers\Pembangunan\DeleteDokumentasiPembangunanDetailController::class)->name('dokumentasi.pembangunan.detail.delete');
        // dokumentasi pembangunan
        Route::resource('dokumentasiPembangunan', \App\Http\Controllers\Desa\DokumentasiPembangunanController::class);
        // route cetak laporan inventaris
        Route::get('formLaporanInventaris/{jenis}', \App\Http\Controllers\Laporan\FormCetakLaporanInventarisController::class)->name('form.laporan.cetak.inventaris');
        // route inventaris peralatan
        Route::post('cetakLaporanInventarisPeralatan', \App\Http\Controllers\Laporan\CetakLaporanInventarisPeralatanController::class)->name('cetak.laporan.inventaris.peralatan');
        Route::get('print/inventarisPeralatan/{inventarisPeralatan}', \App\Http\Controllers\Inventaris\PrintInventarisPeralatanController::class)->name('inventarisPeralatan.print');
        Route::resource('inventarisPeralatan', \App\Http\Controllers\Desa\InventarisPeralatanController::class);
        // inventaris tanah
        Route::post('cetakLaporanInventarisTanah', \App\Http\Controllers\Laporan\CetakLaporanInventarisTanahController::class)->name('cetak.laporan.inventaris.tanah');
        Route::get('print/inventarisTanah/{inventarisTanah}', \App\Http\Controllers\Inventaris\PrintInventarisTanahController::class)->name('inventarisTanah.print');
        Route::resource('inventarisTanah', \App\Http\Controllers\Desa\InventarisTanahController::class);
        // inventaris bangunan
        Route::post('cetakLaporanInventarisBangunan', \App\Http\Controllers\Laporan\CetakLaporanInventarisBangunanController::class)->name('cetak.laporan.inventaris.bangunan');
        Route::get('print/inventarisBangunan/{inventarisBangunan}', \App\Http\Controllers\Inventaris\PrintInventarisBangunanController::class)->name('inventarisBangunan.print');
        Route::resource('inventarisBangunan', \App\Http\Controllers\Desa\InventarisBangunanController::class);
        // inventaris asset tetap
        Route::post('cetakLaporanInventarisAssetTetap', \App\Http\Controllers\Laporan\CetakLaporanInventarisAssetTetapController::class)->name('cetak.laporan.inventaris.assetTetap');
        Route::get('print/inventarisAssetTetap/{inventarisAssetTetap}', \App\Http\Controllers\Inventaris\PrintInventarisAssetTetapController::class)->name('inventarisAssetTetap.print');
        Route::resource('inventarisAssetTetap', \App\Http\Controllers\Desa\InventarisAssetTetapController::class);
        // inventaris konstruksi berjalan
        Route::post('cetakLaporanInventarisKonstruksiBerjalan', \App\Http\Controllers\Laporan\CetakLaporanInventarisKonstruksiBerjalanController::class)->name('cetak.laporan.inventaris.konstruksiBerjalan');
        Route::get('print/inventarisKonstruksiBerjalan/{inventarisKonstruksiBerjalan}', \App\Http\Controllers\Inventaris\PrintInventarisKonstruksiBerjalanController::class)->name('inventarisKonstruksiBerjalan.print');
        Route::resource('inventarisKonstruksiBerjalan', \App\Http\Controllers\Desa\InventarisKonstruksiBerjalanController::class);
        Route::post('cetakLaporanSemuaAsset', \App\Http\Controllers\Laporan\CetakLaporanInventarisSemuaAssetController::class)->name('cetak.laporan.inventaris.semuaAsset');
        Route::get('semuaAssets', \App\Http\Controllers\Desa\SemuaAssetController::class)->name('inventarisSemuaAsset.index');
        // pengaduan
        Route::post('pengaduan/{pengaduan}/tanggapan', \App\Http\Controllers\TanggapanPengaduan\StoreTanggapanController::class)->name('tanggapan.pengaduan.store');
        Route::resource('pengaduan', \App\Http\Controllers\Desa\PengaduanController::class);
        // surat
        Route::post('klasifikasiSurat/bulkDelete', [\App\Http\Controllers\Desa\Surat\KlasifikasiSuratController::class, 'bulkDelete'])->name('kalsifikasiSurat.bulkDelete');
        Route::get('klasifikasiSurat/{klasifikasiSurat}/status', \App\Http\Controllers\Desa\Surat\StatusKlasifikasiSuratController::class)->name('klasifikasiSurat.staus');
        Route::resource('klasifikasiSurat', \App\Http\Controllers\Desa\Surat\KlasifikasiSuratController::class);
        Route::post('syaratSurat/bulkDelete', [\App\Http\Controllers\Desa\Surat\SyaratSuratController::class, 'bulkDelete'])->name('syaratSurat.bulkDelete');
        Route::resource('syaratSurat', \App\Http\Controllers\Desa\Surat\SyaratSuratController::class);
        Route::post('surat/bulkDelete', [\App\Http\Controllers\Desa\Surat\SuratController::class, 'bulkDelete'])->name('surat.bulkDelete');
        Route::get('surat/{surat}/status', \App\Http\Controllers\Desa\Surat\StatusSuratController::class)->name('surat.staus');
        Route::get('surat/{surat}/persyaratan', \App\Http\Controllers\Desa\Surat\PersyaratanSuratController::class)->name('persyaratan.surat');
        Route::post('surat/{surat}/assign', \App\Http\Controllers\Desa\Surat\AssignPersyaratanSuratController::class)->name('assign.persyaratan.surat');
        // cetak
        Route::get('cetakSurat/pengantar/{id}', \App\Http\Controllers\Desa\Surat\SuratPengantarController::class)->name('surat.pengantar');
        Route::post('cetakSurat/pengantar', \App\Http\Controllers\Desa\Surat\CetakSuratPengantarController::class)->name('surat.pengantar.proses');
        Route::get('cetakSurat/biodata/{id}', \App\Http\Controllers\Desa\Surat\SuratBiodataController::class)->name('surat.biodata');
        Route::post('cetakSurat/biodata', \App\Http\Controllers\Desa\Surat\CetakSuratBiodataController::class)->name('surat.biodata.proses');
        Route::get('cetakSurat', \App\Http\Controllers\Desa\Surat\CetakSuratController::class)->name('cetak.surat');
        Route::get('unduh/surat/{id}', \App\Http\Controllers\Desa\Surat\UnduhSuratController::class)->name('unduh.surat');
        Route::post('arsipSurat/bulkDelete', \App\Http\Controllers\Desa\Surat\BulkDeleteArsipSuratController::class)->name('arsipSurat.bulkDelete');
        Route::resource('surat', \App\Http\Controllers\Desa\Surat\SuratController::class);
        Route::resource('logSurat', \App\Http\Controllers\Desa\Surat\ArsipSuratController::class);

        // permohonan surat
        Route::get('permohonan/{permohonan}/surat/{surat}/penduduk/{penduduk}', \App\Http\Controllers\Desa\PermohonanSurat\PeriksaPermohonanController::class)->name('periksa.permohonan');
        Route::get('permohonan/{permohonan}/status/{status}', \App\Http\Controllers\Desa\PermohonanSurat\StatusPermohonanSuratController::class)->name('status.permohonanSurat');
        Route::post('permohonanSurat/bulkDelete', \App\Http\Controllers\Desa\PermohonanSurat\BulkDeletePermohonanSuratController::class)->name('permohonanSurat.bulkDelete');
        Route::post('permohonanSurat/{permohonanSurat}/tolak', TolakPermohonanSuratController::class)->name('permohonanSurat.tolak');
        Route::resource('permohonanSurat', \App\Http\Controllers\Desa\PermohonanSuratController::class);

        // blog
        Route::prefix('blog')->name('blog.')->group(function () {
            Route::get('cekSlugTag', \App\Http\Controllers\Blog\Slug\TagSlugController::class)->name('cek.slug.tag');
            Route::get('cekSlugCategory', \App\Http\Controllers\Blog\Slug\CategorySlugController::class)->name('cek.slug.category');
            Route::get('cekSlugBlog', \App\Http\Controllers\Blog\Slug\BlogSlugController::class)->name('cek.slug.blog');
            Route::post('tags/bulkDelete', \App\Http\Controllers\Blog\BulkDelete\BulkDeleteTagController::class)->name('tags.bulkDelete');
            Route::resource('tags', \App\Http\Controllers\Blog\TagController::class);
            Route::post('categories/bulkDelete', \App\Http\Controllers\Blog\BulkDelete\BulkDeleteCategoryController::class)->name('categories.bulkDelete');
            Route::resource('categories', \App\Http\Controllers\Blog\CategoryController::class);
            Route::post('blogs/bulkDelete', \App\Http\Controllers\Blog\BulkDelete\BulkDeleteBlogController::class)->name('blogs.bulkDelete');
            Route::resource('blogs', \App\Http\Controllers\Blog\BlogController::class);
            Route::post('comments/bulkDelete', \App\Http\Controllers\Blog\BulkDelete\BulkDeleteCommentController::class)->name('comments.bulkDelete');
            Route::get('comments/{comment}/status', \App\Http\Controllers\Blog\StatusCommentController::class)->name('comment.status');
            Route::resource('comments', \App\Http\Controllers\Blog\CommentController::class);
        });

        // statistik penduduk
        Route::prefix('statistik')->name('statistik.')->group(function(){
            Route::get('/form/cetak/{jenis}', \App\Http\Controllers\Desa\Statistik\FormCetakStatistikPendudukController::class)->name('form.cetak');
            Route::post('/cetak/laporan', \App\Http\Controllers\Desa\Statistik\CetakStatistikPendudukController::class)->name('cetak.laporan');
            Route::get('/agama', \App\Http\Controllers\Desa\Statistik\StatistikAgamaPendudukController::class)->name('agama.penduduk');
            Route::get('/pendidikan', \App\Http\Controllers\Desa\Statistik\StatistikPendidikanPendudukController::class)->name('pendidikan.penduduk');
        });
    });
    Route::prefix('filemanager')->middleware(['role:admin|petugas|kades'])->group(function(){  
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
// guest
// pengaduan
Route::get('pengaduan/{pengaduan}/detail', \App\Http\Controllers\Statik\DetailPengaduanController::class)->name('detail.pengaduan');
Route::get('pengaduan/list', \App\Http\Controllers\Statik\ListPengaduanController::class)->name('list.pengaduan');
Route::get('pengaduan', \App\Http\Controllers\Statik\CreatePengaduanController::class)->name('pengaduan');
Route::post('pengaduan', \App\Http\Controllers\Statik\StorePengaduanController::class)->name('pengaduan.store');

// berita
Route::get('berita', \App\Http\Controllers\Statik\Blog\ListBeritaController::class)->name('berita');
Route::get('berita/{slug}', \App\Http\Controllers\Statik\Blog\DetailBeritaController::class)->name('berita.detail');
Route::get('berita/category/{slug}', \App\Http\Controllers\Statik\Blog\BeritaCategoryController::class)->name('berita.category');
Route::get('berita/tag/{slug}', \App\Http\Controllers\Statik\Blog\BeritaTagController::class)->name('berita.tag');
Route::post('berita/comment/user', \App\Http\Controllers\Akun\CommentUserController::class)->name('berita.comment.user');

// register layanan mandiri
Route::get('layananMandiri/register', \App\Http\Controllers\Akun\LayananMandiri\RegisterLayananMandiriController::class)->name('layananMandiri.register');
Route::post('layananMandiri/register', \App\Http\Controllers\Akun\LayananMandiri\RegisteredLayananMandiriController::class)->name('layananMandiri.registered');

Route::get('pembangunan', \App\Http\Controllers\Statik\ListPembangunanController::class)->name('pembangunan');
Route::get('statistik', \App\Http\Controllers\Statik\StatistikController::class)->name('statistik');