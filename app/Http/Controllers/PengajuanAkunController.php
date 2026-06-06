<?php

namespace App\Http\Controllers;

use App\Models\PengajuanAkun;
use App\Models\Kabupaten;
use App\Models\JenisPerpustakaan;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        PengajuanAkun::create([
            'nama_perpustakaan' => $request->nama_perpustakaan,
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
}
