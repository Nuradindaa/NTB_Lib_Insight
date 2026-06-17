<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanAkunController;
use App\Models\PerpustakaanSekolah;


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


/*admin*/
Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});
Route::get('/admin/perpustakaan', function () {

    $data = PerpustakaanSekolah::paginate(20);

    return view('admin.perpustakaan.index', compact('data'));

})->middleware('auth');

/*
| Dashboard Ringkasan
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
    '/admin/pengajuan-akun',
    [PengajuanAkunController::class, 'index']
)->name('pengajuan.index');

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