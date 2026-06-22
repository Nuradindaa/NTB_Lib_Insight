<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanAkunController;
use App\Models\PerpustakaanSekolah;
use App\Http\Controllers\Admin\PerpustakaanController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\PengajuanAkreditasiController;


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


/*admin MASTER*/
Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});

Route::get(
    '/admin',
    [DashboardAdminController::class, 'index']
);


/* 
Route::get('/admin/perpustakaan', function () {

    $data = PerpustakaanSekolah::paginate(20);

    return view('admin.perpustakaan.index', compact('data'));

})->middleware('auth');
*/

Route::post(
    '/admin/pengajuan-akun/{id}/approve',
    [PengajuanAkunController::class, 'approve']
)->name('pengajuan.approve');

Route::post(
    '/admin/pengajuan-akun/{id}/tolak',
    [PengajuanAkunController::class, 'tolak']
)->name('pengajuan.tolak');

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
    '/get-kecamatan/{id}',
    [PerpustakaanController::class, 'getKecamatan']
);

Route::get(
    '/get-kelurahan/{id}',
    [PerpustakaanController::class, 'getKelurahan']
);

Route::get(
    '/pengajuan-akreditasi',
    [PengajuanAkreditasiController::class, 'index']
);

Route::post(
    '/pengajuan-akreditasi',
    [PengajuanAkreditasiController::class, 'store']
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