<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AkreditasiPerpustakaan;
use Illuminate\Http\Request;
use App\Models\PengajuanAkreditasi;

class PengajuanAkreditasiController extends Controller
{
    public function index(Request $request)
{
    $query = AkreditasiPerpustakaan::query();

    if ($request->search) {

        $query->where(
            'nama_perpustakaan',
            'like',
            '%' . $request->search . '%'
        );
    }

    $akreditasi = $query->paginate(20);

    $pengajuan = PengajuanAkreditasi::with('user')->latest()->get();

    $pending = PengajuanAkreditasi::where('status', 'pending')->count();

    $approved = PengajuanAkreditasi::where('status', 'approved')->count();

    $rejected = PengajuanAkreditasi::where('status', 'rejected')->count();

    return view(
        'admin.akreditasi.index',
        compact(
            'akreditasi',
            'pengajuan',
            'pending',
            'rejected',
            'approved'
        )
);
}

    public function edit($id)
{
    $akreditasi = AkreditasiPerpustakaan::findOrFail($id);

    return view(
        'admin.akreditasi.edit',
        compact('akreditasi')
    );
}

    public function update(Request $request, $id)
{
    $request->validate([
        'nilai_akreditasi' => 'required',
        'tahun_terbit' => 'required',
        'jangka_waktu' => 'required',
        'tahun_berakhir' => 'required',
        'status' => 'required',
    ]);

    $akreditasi = AkreditasiPerpustakaan::findOrFail($id);

    $akreditasi->update([
        'nilai_akreditasi' => $request->nilai_akreditasi,
        'tahun_terbit' => $request->tahun_terbit,
        'jangka_waktu' => $request->jangka_waktu,
        'tahun_berakhir' => $request->tahun_berakhir,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('admin.akreditasi')
        ->with('success', 'Data berhasil diperbarui');
}  

    public function pengajuan()
{
    return view('admin.akreditasi.pengajuan');
}

public function approve($id)
{
    $pengajuan = PengajuanAkreditasi::findOrFail($id);

    AkreditasiPerpustakaan::where(
        'id_akreditasi',
        $pengajuan->id_akreditasi
    )->update([

        'nilai_akreditasi' => $pengajuan->akreditasi_baru,
        'tahun_terbit'     => $pengajuan->tahun_terbit,
        'tahun_berakhir'   => $pengajuan->tahun_berakhir,

    ]);

    $pengajuan->update([
        'status' => 'approved'
    ]);

    return back()->with(
        'success',
        'Pengajuan disetujui'
    );
}

public function reject($id)
{
    $pengajuan = PengajuanAkreditasi::findOrFail($id);

    $pengajuan->update([
        'status' => 'rejected'
    ]);

    return back()->with(
        'success',
        'Pengajuan ditolak'
    );
}
}