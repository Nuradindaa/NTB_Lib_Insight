<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\PerpustakaanSekolah;
use App\Models\PerpustakaanDesa;
use App\Models\PerpustakaanKhusus;
use App\Models\PerpustakaanKomunitas;
use App\Models\PengajuanAkun;
use App\Models\User;
use App\Models\Aktivitas;

class DashboardAdminController extends Controller
{
public function index()
{
    $totalPerpustakaan =
        PerpustakaanSekolah::count() +
        PerpustakaanDesa::count() +
        PerpustakaanKhusus::count() +
        PerpustakaanKomunitas::count();

    $pengajuanPending =
        PengajuanAkun::where(
        'status',
        'pending'
    )->count();

    $pengajuanTerbaru =
        PengajuanAkun::latest()
        ->take(5)
        ->get();

    $akunAktif = User::where(
        'role',
        'perpus'
    )->count();

    $adminPerpus = User::where(
        'role',
        'perpus'
    )->count();

    $aktivitas = Aktivitas::latest()
        ->take(5)
        ->get();

    return view(
        'admin.dashboard',
        compact(
            'totalPerpustakaan',
            'pengajuanPending',
            'akunAktif',
            'adminPerpus',
            'pengajuanTerbaru',
            'aktivitas'

        )
    );
}
}