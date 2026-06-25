<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PengajuanAkun;
use App\Models\Kabupaten;
use App\Models\JenisPerpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PerpustakaanDesa;
use App\Models\PerpustakaanKomunitas;
use App\Models\PerpustakaanSekolah;
use App\Models\PerpustakaanKhusus;

class PengajuanAkunController extends Controller
{
    public function create()
    {
        $kabupaten = Kabupaten::orderBy('nama_kabupaten')->get();

        $jenis = JenisPerpustakaan::orderBy('nama_jenis')->get();

        return view(
            'pengajuan.create',
            compact('kabupaten', 'jenis')
        );
    }

    public function getPerpustakaan($jenis, $kabupaten)
    {
        if ($jenis == 1) {

            $desa = PerpustakaanDesa::where(
                'id_kabupaten',
                $kabupaten
            )
            ->select('id','nama_perpustakaan')
            ->get();

            $komunitas = PerpustakaanKomunitas::where(
                'id_kabupaten',
                $kabupaten
            )
            ->select('id','nama_perpustakaan')
            ->get();

            return $desa->merge($komunitas);
        }

        if ($jenis == 2) {

            return PerpustakaanSekolah::where(
                'id_kabupaten',
                $kabupaten
            )
            ->select('id','nama_perpustakaan')
            ->orderBy('nama_perpustakaan')
            ->get();
        }

        if ($jenis == 3) {

            return PerpustakaanKhusus::where(
                'id_kabupaten',
                $kabupaten
            )
            ->select('id','nama_perpustakaan')
            ->orderBy('nama_perpustakaan')
            ->get();
        }

        return [];
    }

    public function store(Request $request)
    {

        $request->validate([
            'perpustakaan_id' => 'required|integer',
            'id_jenis'        => 'required|integer',
            'id_kabupaten'    => 'required|integer',
            'nama_pengelola'  => 'required',
            'email'           => 'required|email',
            'no_hp'           => 'required',
            'alasan'          => 'required',
        ]);

        PengajuanAkun::create([
            'perpustakaan_id'   => $request->perpustakaan_id,
            'id_jenis'          => $request->id_jenis,
            'id_kabupaten'      => $request->id_kabupaten,
            'nama_pengelola'    => $request->nama_pengelola,
            'email'             => $request->email,
            'no_hp'             => $request->no_hp,
            'alasan'            => $request->alasan,
        ]);

        return redirect('/')
            ->with(
                'success',
                'Pengajuan akun berhasil dikirim.'
            );
    }
    public function index()
    {
        $pengajuan = PengajuanAkun::with('kabupaten')
            ->latest()
            ->get();

        return view(
            'pengajuan.index',
            compact('pengajuan')
            );
        }

    public function approve($id)
    {
        $pengajuan = PengajuanAkun::findOrFail($id);

        // Hindari membuat user dua kali
        if (User::where('email', $pengajuan->email)->exists()) {

            return back()->with(
                'error',
                'Email sudah terdaftar sebagai user.'
            );
        }

        // Ambil nama jenis perpustakaan
        $jenis = JenisPerpustakaan::find($pengajuan->id_jenis);

        $password = Str::password(12);

        User::create([
            'name' => $pengajuan->nama_pengelola,
            'email' => $pengajuan->email,
            'password' => Hash::make($password),
            'role' => 'perpus',
            'perpustakaan_id' => $pengajuan->perpustakaan_id,
            'jenis_perpustakaan' => $jenis->nama_jenis,
        ]);

        $pengajuan->update([
            'status' => 'approved'
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil disetujui.'
        );
    }

    public function tolak($id)
    {
        $pengajuan = PengajuanAkun::findOrFail($id);

        $pengajuan->update([
            'status' => 'rejected'
        ]);

        return back()->with(
            'success',
            'Pengajuan berhasil ditolak'
        );
    }

   public function searchPerpustakaan(Request $request)
    {
        $keyword = $request->keyword;
        $jenis = $request->jenis;

        // UMUM
        if ($jenis == 1) {

            $desa = PerpustakaanDesa::where(
                'nama_perpustakaan',
                'like',
                "%{$keyword}%"
            )
            ->limit(5)
            ->get([
                'id',
                'nama_perpustakaan'
            ]);

            $komunitas = PerpustakaanKomunitas::where(
                'nama_perpustakaan',
                'like',
                "%{$keyword}%"
            )
            ->limit(5)
            ->get([
                'id',
                'nama_perpustakaan'
            ]);

            return $desa->merge($komunitas);
        }

        // SEKOLAH
        if ($jenis == 2) {

            return PerpustakaanSekolah::where(
                'nama_perpustakaan',
                'like',
                "%{$keyword}%"
            )
            ->limit(10)
            ->get([
                'id',
                'nama_perpustakaan'
            ]);
        }

        // KHUSUS
        if ($jenis == 3) {

            return PerpustakaanKhusus::where(
                'nama_perpustakaan',
                'like',
                "%{$keyword}%"
            )
            ->limit(10)
            ->get([
                'id',
                'nama_perpustakaan'
            ]);
        }

        return [];
    }
}
