<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    public function approve($id)
    {
    $pengajuan = PengajuanAkun::findOrFail($id);

    User::create([
        'name'     => $pengajuan->nama_pengelola,
        'email'    => $pengajuan->email,
        'password' => Hash::make('password123'),
        'role'     => 'perpus'
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
}
