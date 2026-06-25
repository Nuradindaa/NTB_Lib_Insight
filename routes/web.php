<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanAkunController;
use App\Http\Controllers\Admin\PerpustakaanController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\PengajuanAkreditasiController;
use App\Http\Controllers\PerpusController;


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::get(
    '/get-kecamatan/{id}',
    [PerpustakaanController::class, 'getKecamatan']
);

Route::get(
    '/get-kelurahan/{id}',
    [PerpustakaanController::class, 'getKelurahan']
);

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [DashboardAdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::post(
        '/admin/pengajuan-akun/{id}/approve',
        [PengajuanAkunController::class, 'approve']
    )->name('pengajuan.approve');

    Route::post(
        '/admin/pengajuan-akun/{id}/tolak',
        [PengajuanAkunController::class, 'tolak']
    )->name('pengajuan.tolak');

    Route::get('/admin/pengajuan-akun', [PengajuanAkunController::class, 'index'])
        ->name('pengajuan.index');

    Route::get('/admin/perpustakaan', [PerpustakaanController::class, 'index'])
        ->name('admin.perpustakaan.index');
    Route::get(
        '/admin/perpustakaan/detail/{jenis}/{id}',
        [PerpustakaanController::class, 'detail']
    )->name('admin.perpustakaan.detail');

    Route::get(
        '/admin/perpustakaan/edit/{jenis}/{id}',
        [PerpustakaanController::class, 'edit']
    );

    Route::put(
        '/admin/perpustakaan/update/{jenis}/{id}',
        [PerpustakaanController::class, 'update']
    );

    Route::delete(
        '/admin/perpustakaan/hapus/{jenis}/{id}',
        [PerpustakaanController::class, 'destroy']
    );

    Route::get(
        '/admin/perpustakaan/tambah',
        [PerpustakaanController::class, 'create']
    );

    Route::post(
        '/admin/perpustakaan/store',
        [PerpustakaanController::class, 'store']
    );

    Route::get(
        '/admin/perbarui-akreditasi',
        [PengajuanAkreditasiController::class, 'index']
    )->name('admin.akreditasi');

    Route::get(
        '/admin/perbarui-akreditasi/{id}/edit',
        [PengajuanAkreditasiController::class, 'edit']
    )->name('admin.akreditasi.edit');

    Route::put(
        '/admin/perbarui-akreditasi/{id}',
        [PengajuanAkreditasiController::class, 'update']
    )->name('admin.akreditasi.update');

    Route::get(
        '/admin/pengajuan-akreditasi',
        [PengajuanAkreditasiController::class, 'pengajuan']
    )->name('admin.pengajuan-akreditasi');

    Route::post(
        '/admin/pengajuan-akreditasi/{id}/approve',
        [PengajuanAkreditasiController::class, 'approve']
    )->name('akreditasi.approve');

    Route::post(
        '/admin/pengajuan-akreditasi/{id}/reject',
        [PengajuanAkreditasiController::class, 'reject']
    )->name('akreditasi.reject');

    Route::get(
        '/admin/user-perpustakaan',
        [PerpustakaanController::class, 'userPerpustakaan']
    )->name('admin.user-perpustakaan');

    Route::post(
        '/admin/user-perpustakaan/{id}/toggle',
        [PerpustakaanController::class,'toggleUser']
    )->name('admin.user.toggle');

});

/* Pengajuan Akreditasi (public) */
Route::get(
    '/pengajuan-akreditasi',
    [PengajuanAkreditasiController::class, 'index']
);

Route::post(
    '/pengajuan-akreditasi',
    [PengajuanAkreditasiController::class, 'store']
);

/*
| Landing page
*/

Route::get('/', [DashboardController::class, 'ringkasan'])
    ->name('dashboard.ringkasan');
Route::get(
    '/pengajuan-akun',
    [PengajuanAkunController::class, 'create']
)->name('pengajuan.create');

Route::post(
    '/pengajuan-akun',
    [PengajuanAkunController::class, 'store']
)->name('pengajuan.store');

Route::get(
    '/get-perpustakaan/{jenis}/{kabupaten}',
    [PengajuanAkunController::class, 'getPerpustakaan']
);

Route::get(
    '/search-perpustakaan',
    [PengajuanAkunController::class, 'searchPerpustakaan']
);

/*
| Dashboard Akreditasi
*/

Route::get('/dashboard-akreditasi', [DashboardController::class, 'index'])
    ->name('dashboard.akreditasi');
Route::get(
    '/reakreditasi/expired',[DashboardController::class, 'expired'])
    ->name('reakreditasi.expired');
Route::get('/reakreditasi/berlaku', [DashboardController::class, 'berlaku'])
    ->name('reakreditasi.berlaku');

/*
| Dashboard Pemetaan
*/

Route::get('/dashboard-pemetaan', [DashboardController::class, 'pemetaan'])
    ->name('dashboard.pemetaan');

Route::middleware('auth')->group(function () {

    // nanti route tambah/edit/hapus disini

});

Route::get(
    '/perpustakaan-sekolah',
    [DashboardController::class, 'perpustakaanSekolah']
)->name('perpustakaan.sekolah');

Route::get(
    '/perpustakaan-desa',
    [DashboardController::class,'perpustakaanDesa']
)->name('perpustakaan.desa');

Route::get(
    '/perpustakaan-khusus',
    [DashboardController::class,'perpustakaanKhusus']
)->name('perpustakaan.khusus');

Route::get(
    '/perpustakaan-komunitas',
    [DashboardController::class,'perpustakaanKomunitas']
)->name('perpustakaan.komunitas');

/*
| Dashboard Admin Perpustakaan
*/

Route::get('/admin-perpustakaan/{id}', function ($id) {
    return view('admin_perpustakaan.dashboard', compact('id'));
})->name('admin.perpustakaan.dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/perpus', [PerpusController::class,'index']);
    Route::get('/perpus/profil', [PerpusController::class,'profil']);
    Route::get('/perpus/profil/edit', [PerpusController::class, 'editProfil']);
    Route::put('/perpus/profil/update', [PerpusController::class, 'updateProfil']);

    Route::get('/perpus/update-akreditasi', [PerpusController::class, 'updateAkreditasi']);
    Route::post('/perpus/update-akreditasi', [PerpusController::class, 'submitAkreditasi']);

});

