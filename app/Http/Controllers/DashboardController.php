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

        $chartKabupaten = AkreditasiPerpustakaan::selectRaw("
            kabupaten.nama_kabupaten,
            COUNT(*) as total
        ")
        ->join(
            'kabupaten',
            'akreditasi_perpustakaan.id_kabupaten',
            '=',
            'kabupaten.id_kabupaten'
        )
        ->groupBy('kabupaten.nama_kabupaten')
        ->orderByDesc('total')
        ->get();

        $expired = AkreditasiPerpustakaan::where('status', 'exp')
            ->count();

        $berlaku = AkreditasiPerpustakaan::where('status', 'Berlaku')
            ->count();

        $totalAkreditasi = AkreditasiPerpustakaan::count();
        $akanExpired = AkreditasiPerpustakaan::where(
            'tahun_berakhir',
            date('Y') + 1
            )->count();


        return view(
            'dashboard.index',
            compact(
                'total',
                'totalAkreditasi',
                'akreditasiA',
                'akreditasiB',
                'akreditasiC',
                'expired',
                'berlaku',
                'data',
                'kabupaten',
                'jenis',
                'chartKabupaten'
            )
        );
    }
    public function expired()
    {
        $data = AkreditasiPerpustakaan::where('status', 'exp')
            ->orderBy('tahun_berakhir')
            ->get();

        return view(
            'dashboard.expired',
            compact('data')
        );
    }

    public function berlaku()
    {
        $data = AkreditasiPerpustakaan::where('status', 'Berlaku')
            ->orderByDesc('tahun_berakhir')
            ->get();

        return view(
            'dashboard.berlaku',
            compact('data')
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

        $totalAkreditasi = AkreditasiPerpustakaan::count();

        $jumlahKabupaten = Kabupaten::count();

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
        $kabupaten = DB::table('kabupaten')->get();

        $sekolah = DB::table('perpustakaan_sekolah')
            ->selectRaw('id_kabupaten, COUNT(*) as total')
            ->groupBy('id_kabupaten')
            ->pluck('total', 'id_kabupaten');

        $desa = DB::table('perpustakaan_desa')
            ->selectRaw('id_kabupaten, COUNT(*) as total')
            ->groupBy('id_kabupaten')
            ->pluck('total', 'id_kabupaten');

        $khusus = DB::table('perpustakaan_khusus')
            ->selectRaw('id_kabupaten, COUNT(*) as total')
            ->groupBy('id_kabupaten')
            ->pluck('total', 'id_kabupaten');

        $komunitas = DB::table('perpustakaan_komunitas')
            ->selectRaw('id_kabupaten, COUNT(*) as total')
            ->groupBy('id_kabupaten')
            ->pluck('total', 'id_kabupaten');

        $koordinat = [
            [
                'id' => 1,
                'nama' => 'Kota Mataram',
                'lat' => -8.5833,
                'lng' => 116.1167
            ],
            [
                'id' => 8,
                'nama' => 'Kabupaten Lombok Barat',
                'lat' => -8.6853,
                'lng' => 116.1368
            ],
            [
                'id' => 7,
                'nama' => 'Kabupaten Lombok Tengah',
                'lat' => -8.7058,
                'lng' => 116.2751
            ],
            [
                'id' => 6,
                'nama' => 'Kabupaten Lombok Timur',
                'lat' => -8.6366,
                'lng' => 116.5298
            ],
            [
                'id' => 5,
                'nama' => 'Kabupaten Lombok Utara',
                'lat' => -8.3414,
                'lng' => 116.2415
            ],
            [
                'id' => 3,
                'nama' => 'Kabupaten Sumbawa Barat',
                'lat' => -8.7617,
                'lng' => 116.9217
            ],
            [
                'id' => 4,
                'nama' => 'Kabupaten Sumbawa',
                'lat' => -8.6653,
                'lng' => 117.4950
            ],
            [
                'id' => 9,
                'nama' => 'Kabupaten Dompu',
                'lat' => -8.5333,
                'lng' => 118.2333
            ],
            [
                'id' => 10,
                'nama' => 'Kabupaten Bima',
                'lat' => -8.5286,
                'lng' => 118.7107
            ],
            [
                'id' => 2,
                'nama' => 'Kota Bima',
                'lat' => -8.4552,
                'lng' => 118.7275
            ]
        ];

        $totalSekolah = DB::table('perpustakaan_sekolah')->count();

        $totalDesa = DB::table('perpustakaan_desa')->count();

        $totalKhusus = DB::table('perpustakaan_khusus')->count();

        $totalKomunitas = DB::table('perpustakaan_komunitas')->count();

        $totalPerpustakaan =
            $totalSekolah +
            $totalDesa +
            $totalKhusus +
            $totalKomunitas;

        return view('pemetaan.index', 
        compact(
            'kabupaten',
            'sekolah',
            'desa',
            'khusus',
            'komunitas',
            'koordinat',

            'totalSekolah',
            'totalDesa',
            'totalKhusus',
            'totalKomunitas',
            'totalPerpustakaan'
        ));
    }

    public function perpustakaanSekolah()
    {
        $data = DB::table('perpustakaan_sekolah')->get();

        return view(
            'pemetaan.perpustakaan_sekolah',
            compact('data')
        );
    }
}
