<?php

namespace App\Http\Controllers;

use App\Models\AkreditasiPerpustakaan;
use App\Models\Kabupaten;
use App\Models\JenisPerpustakaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalSekolah = DB::table('perpustakaan_sekolah')->count();

        $totalDesa = DB::table('perpustakaan_desa')->count();

        $totalKomunitas = DB::table('perpustakaan_komunitas')->count();

        $totalKhusus = DB::table('perpustakaan_khusus')->count();

        $total =
            $totalSekolah +
            $totalDesa +
            $totalKomunitas +
            $totalKhusus;

        $filterKabupaten = $request->kabupaten;
        $filterAkreditasi = $request->akreditasi;

        $statQuery = AkreditasiPerpustakaan::query();

        if ($filterKabupaten) {
            $statQuery->where('id_kabupaten', $filterKabupaten);
        }

        $akreditasiA = (clone $statQuery)
            ->where('nilai_akreditasi', 'A')
            ->count();

        $akreditasiB = (clone $statQuery)
            ->where('nilai_akreditasi', 'B')
            ->count();

        $akreditasiC = (clone $statQuery)
            ->where('nilai_akreditasi', 'C')
            ->count();
            
        $query = AkreditasiPerpustakaan::query();

        if ($filterKabupaten) {
            $query->where('id_kabupaten', $filterKabupaten);
        }

        if ($filterAkreditasi) {
            $query->where('nilai_akreditasi', $filterAkreditasi);
        }

        $data = $query->limit(20)->get();
        $kabupaten = Kabupaten::orderBy('nama_kabupaten')->get();
        $jenis = JenisPerpustakaan::orderBy('nama_jenis')->get();
        
        return view(
            'dashboard.index',
            compact(
                'total',
                'akreditasiA',
                'akreditasiB',
                'akreditasiC',
                'data',
                'kabupaten',
                'jenis'
            )
        );
    }
    public function ringkasan()
{
    $totalSekolah = DB::table('perpustakaan_sekolah')->count();

    $totalDesa = DB::table('perpustakaan_desa')->count();

    $totalKomunitas = DB::table('perpustakaan_komunitas')->count();

    $totalKhusus = DB::table('perpustakaan_khusus')->count();

    $totalPerpustakaan =
        $totalSekolah +
        $totalDesa +
        $totalKomunitas +
        $totalKhusus;

    $totalAkreditasi =
        AkreditasiPerpustakaan::count();

    $jumlahKabupaten =
        Kabupaten::count();

    return view(
        'ringkasan.index',
        compact(
            'totalPerpustakaan',
            'totalAkreditasi',
            'jumlahKabupaten',
            'totalSekolah',
            'totalDesa',
            'totalKomunitas',
            'totalKhusus'
        )
    );
}

public function pemetaan()
{
    return view('pemetaan.index');
}
}