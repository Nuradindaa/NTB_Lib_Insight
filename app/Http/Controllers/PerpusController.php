<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\PerpustakaanSekolah;
use App\Models\PerpustakaanDesa;
use App\Models\PerpustakaanKhusus;
use App\Models\PerpustakaanKomunitas;
use App\Models\AkreditasiPerpustakaan;
use App\Models\PengajuanAkreditasi;

class PerpusController extends Controller
{
    private function getPerpustakaan()
    {
        $user = Auth::user();

        switch ($user->jenis_perpustakaan) {

            case 'SEKOLAH':
                return PerpustakaanSekolah::find($user->perpustakaan_id);

            case 'DESA':
                return PerpustakaanDesa::find($user->perpustakaan_id);

            case 'KHUSUS':
                return PerpustakaanKhusus::find($user->perpustakaan_id);

            case 'KOMUNITAS':
                return PerpustakaanKomunitas::find($user->perpustakaan_id);

            default:
                return null;
        }
    }

    public function index()
    {
        return view('perpus.dashboard',[
            'user' => Auth::user(),
            'perpustakaan' => $this->getPerpustakaan()
        ]);
    }

    public function profil()
    {
        return view('perpus.profil',[
            'perpustakaan' => $this->getPerpustakaan()
        ]);
    }

    public function editProfil()
{
    return view('perpus.edit-profil', [
        'perpustakaan' => $this->getPerpustakaan()
    ]);
}

    public function updateProfil(Request $request)
    {
        $perpustakaan = $this->getPerpustakaan();

        $request->validate([
            'nama_perpustakaan' => 'required',
            'nomor_pokok' => 'nullable',
            'alamat' => 'required',
            'lembaga_induk' => 'nullable'
        ]);

        $perpustakaan->update([
            'nama_perpustakaan' => $request->nama_perpustakaan,
            'nomor_pokok' => $request->nomor_pokok,
            'alamat' => $request->alamat,
            'lembaga_induk' => $request->lembaga_induk
        ]);

        return redirect('/perpus/profil')
                ->with('success', 'Profil berhasil diperbarui.');
    }

    public function updateAkreditasi()
    {
        $user = Auth::user();
        $perpustakaan = $this->getPerpustakaan();

        $akreditasi = AkreditasiPerpustakaan::where(
            'nama_perpustakaan',
            $perpustakaan->nama_perpustakaan
        )->first();

        $riwayatPengajuan = PengajuanAkreditasi::where('user_id', $user->id)
            ->latest()
            ->get();

        return view('perpus.update-akreditasi', compact(
            'akreditasi',
            'perpustakaan',
            'riwayatPengajuan'
        ));
    }

    public function submitAkreditasi(Request $request)
    {
        $user = Auth::user();
        $perpustakaan = $this->getPerpustakaan();

        $request->validate([
            'akreditasi_baru' => 'required|string',
            'tahun_terbit' => 'required|integer|min:2000|max:2099',
            'tahun_berakhir' => 'required|integer|min:2000|max:2099',
            'dokumen_bukti' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $dokumenPath = null;
        if ($request->hasFile('dokumen_bukti')) {
            $dokumenPath = $request->file('dokumen_bukti')
                ->store('dokumen-akreditasi', 'public');
        }

        $akreditasi = AkreditasiPerpustakaan::where(
            'nama_perpustakaan',
            $perpustakaan->nama_perpustakaan
        )->first();

        PengajuanAkreditasi::create([
            'user_id' => $user->id,
            'id_akreditasi' => $akreditasi?->id_akreditasi,
            'nama_perpustakaan' => $perpustakaan->nama_perpustakaan,
            'akreditasi_lama' => $akreditasi?->nilai_akreditasi,
            'akreditasi_baru' => $request->akreditasi_baru,
            'tahun_terbit' => $request->tahun_terbit,
            'tahun_berakhir' => $request->tahun_berakhir,
            'dokumen_bukti' => $dokumenPath,
            'keterangan' => $request->keterangan,
            'status' => 'pending',
        ]);

        return redirect('/perpus/update-akreditasi')
            ->with('success', 'Pengajuan update akreditasi berhasil dikirim.');
    }
}