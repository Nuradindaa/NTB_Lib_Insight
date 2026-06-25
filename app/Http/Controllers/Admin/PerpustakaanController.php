<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerpustakaanSekolah;
use App\Models\PerpustakaanDesa;
use App\Models\PerpustakaanKhusus;
use App\Models\PerpustakaanKomunitas;
use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Aktivitas;
use App\Models\PengajuanAkun;

class PerpustakaanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $kabupaten = $request->kabupaten;
        $jenis = $request->jenis;

        $querySekolah = PerpustakaanSekolah::with('kabupaten');
        $queryDesa = PerpustakaanDesa::with('kabupaten');
        $queryKhusus = PerpustakaanKhusus::with('kabupaten');
        $queryKomunitas = PerpustakaanKomunitas::with('kabupaten');

        if ($kabupaten) {
            $querySekolah->where('id_kabupaten', $kabupaten);
            $queryDesa->where('id_kabupaten', $kabupaten);
            $queryKhusus->where('id_kabupaten', $kabupaten);
            $queryKomunitas->where('id_kabupaten', $kabupaten);
        }

        if ($keyword) {
            $querySekolah->where('nama_perpustakaan', 'like', "%{$keyword}%");
            $queryDesa->where('nama_perpustakaan', 'like', "%{$keyword}%");
            $queryKhusus->where('nama_perpustakaan', 'like', "%{$keyword}%");
            $queryKomunitas->where('nama_perpustakaan', 'like', "%{$keyword}%");
        }

        $sekolah = $querySekolah->get()->map(function ($item) {
            $item->jenis_tampilan = 'Sekolah';
            $item->jenis_asli = 'sekolah';
            $item->jenis_url = 'sekolah';
            return $item;
        });

        $desa = $queryDesa->get()->map(function ($item) {
            $item->jenis_tampilan = 'Desa/Kelurahan';
            $item->jenis_asli = 'desa';
            $item->jenis_url = 'desa';
            return $item;
        });

        $khusus = $queryKhusus->get()->map(function ($item) {
            $item->jenis_tampilan = 'Khusus';
            $item->jenis_asli = 'khusus';
            $item->jenis_url = 'khusus';
            return $item;
        });

        $komunitas = $queryKomunitas->get()->map(function ($item) {
            $item->jenis_tampilan = 'Komunitas';
            $item->jenis_asli = 'komunitas';
            $item->jenis_url = 'komunitas';
            return $item;
        });

        $data = collect()
            ->merge($sekolah)
            ->merge($desa)
            ->merge($khusus)
            ->merge($komunitas);

        if ($jenis) {
            $data = $data->where('jenis_url', $jenis);
        }

        $daftarKabupaten = Kabupaten::all();

        return view('admin.perpustakaan.index', compact('data', 'daftarKabupaten'));
    }

    public function detail($jenis, $id)
    {
        switch ($jenis) {

            case 'sekolah':
                $data = PerpustakaanSekolah::with('kabupaten')
                    ->findOrFail($id);
                break;

            case 'desa':
                $data = PerpustakaanDesa::with('kabupaten')
                    ->findOrFail($id);
                break;

            case 'khusus':
                $data = PerpustakaanKhusus::with('kabupaten')
                    ->findOrFail($id);
                break;

            case 'komunitas':
                $data = PerpustakaanKomunitas::with('kabupaten')
                    ->findOrFail($id);
                break;

            default:
                abort(404);
        }

        return view(
            'admin.perpustakaan.detail',
            compact('data', 'jenis')
        );
    }

    public function edit($jenis, $id)
    {
        switch ($jenis) {

            case 'sekolah':
                $data = PerpustakaanSekolah::findOrFail($id);
                break;

            case 'desa':
                $data = PerpustakaanDesa::findOrFail($id);
                break;

            case 'khusus':
                $data = PerpustakaanKhusus::findOrFail($id);
                break;

            case 'komunitas':
                $data = PerpustakaanKomunitas::findOrFail($id);
                break;

            default:
                abort(404);
        }

        return view(
            'admin.perpustakaan.edit',
            compact('data', 'jenis')
        );
    }

    public function update(Request $request, $jenis, $id)
    {
        switch ($jenis) {

            case 'sekolah':
                $data = PerpustakaanSekolah::findOrFail($id);
                break;

            case 'desa':
                $data = PerpustakaanDesa::findOrFail($id);
                break;

            case 'khusus':
                $data = PerpustakaanKhusus::findOrFail($id);
                break;

            case 'komunitas':
                $data = PerpustakaanKomunitas::findOrFail($id);
                break;

            default:
                abort(404);
        }
            $data->nomor = $request->nomor;
            $data->jumlah_per_kabupaten = $request->jumlah_per_kabupaten;
            $data->desa_kelurahan = $request->desa_kelurahan;
            $data->kecamatan = $request->kecamatan;
            $data->nama_perpustakaan = $request->nama_perpustakaan;
            $data->nomor_pokok = $request->nomor_pokok;
            $data->lembaga_induk = $request->lembaga_induk;
            $data->subjenis = $request->subjenis;
            $data->alamat = $request->alamat;

            $data->save();

            Aktivitas::create([
                'aktivitas' =>
                    'Perpustakaan '
                    .$request->nama_perpustakaan.
                    ' memperbarui data profil'
            ]);

            return redirect()
                ->to('/admin/perpustakaan')
                ->with('success', 'Data berhasil diperbarui');

        }
    public function destroy($jenis, $id)
    {
        switch ($jenis) {

            case 'sekolah':
                $data = PerpustakaanSekolah::findOrFail($id);
                break;

            case 'desa':
                $data = PerpustakaanDesa::findOrFail($id);
                break;

            case 'khusus':
                $data = PerpustakaanKhusus::findOrFail($id);
                break;

            case 'komunitas':
                $data = PerpustakaanKomunitas::findOrFail($id);
                break;

            default:
                abort(404);
        }

        Aktivitas::create([
            'aktivitas' =>
                'Perpustakaan ' .
                $data->nama_perpustakaan .
                ' berhasil dihapus'
        ]);

        $data->delete();

        return redirect()
            ->to('/admin/perpustakaan')
            ->with('success', 'Data berhasil dihapus');
    }

    public function create()
    {
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view(
            'admin.perpustakaan.create',
            compact(
                'kabupaten',
                'kecamatan',
                'kelurahan'
            )
        );
    }

    // dd($request->all());
    public function store(Request $request)
    {
        switch ($request->jenis) {

            case 'sekolah':

                PerpustakaanSekolah::create([
                    'nama_perpustakaan' => $request->nama_perpustakaan,
                    'nomor_pokok'       => $request->nomor_pokok,
                    'lembaga_induk'     => $request->lembaga_induk,
                    'subjenis'          => $request->subjenis,
                    'alamat'            => $request->alamat,
                    'id_kabupaten'      => $request->id_kabupaten,
                    'id_kecamatan'      => $request->id_kecamatan,
                    'id_kelurahan'      => $request->id_kelurahan,
                ]);

                break;

            case 'desa':

                PerpustakaanDesa::create([
                    'nama_perpustakaan' => $request->nama_perpustakaan,
                    'alamat'            => $request->alamat,
                    'id_kabupaten'      => $request->id_kabupaten,
                    'id_kecamatan'      => $request->id_kecamatan,
                    'id_kelurahan'      => $request->id_kelurahan,
                ]);

                break;

            case 'khusus':

                PerpustakaanKhusus::create([
                    'nama_perpustakaan' => $request->nama_perpustakaan,
                    'nomor_pokok'       => $request->nomor_pokok,
                    'lembaga_induk'     => $request->lembaga_induk,
                    'subjenis'          => $request->subjenis,
                    'alamat'            => $request->alamat,
                    'id_kabupaten'      => $request->id_kabupaten,
                    'id_kecamatan'      => $request->id_kecamatan,
                    'id_kelurahan'      => $request->id_kelurahan,
                ]);

                break;

            case 'komunitas':

                PerpustakaanKomunitas::create([
                    'nama_perpustakaan' => $request->nama_perpustakaan,
                    'alamat'            => $request->alamat,
                    'id_kabupaten'      => $request->id_kabupaten,
                    'id_kecamatan'      => $request->id_kecamatan,
                    'id_kelurahan'      => $request->id_kelurahan,
                ]);

                break;
        }

        Aktivitas::create([
            'aktivitas' =>
                'Perpustakaan ' .
                $request->nama_perpustakaan .
                ' berhasil ditambahkan'
        ]);

        return redirect('/admin/perpustakaan')
            ->with('success', 'Data perpustakaan berhasil ditambahkan');
    }

    public function getKecamatan($id)
    {
        return Kecamatan::where(
            'id_kabupaten',
            $id
        )->get();
    }

    public function getKelurahan($id)
    {
        return Kelurahan::where(
            'id_kecamatan',
            $id
        )->get();
    }


    // public function store(Request $request)
    // {
    //     switch ($request->jenis) {

    //         case 'sekolah':

    //             PerpustakaanSekolah::create([
    //                 'nama_perpustakaan' => $request->nama_perpustakaan,
    //                 'alamat' => $request->alamat,
    //             ]);

    //             break;

    //         case 'desa':

    //             PerpustakaanDesa::create([
    //                 'nama_perpustakaan' => $request->nama_perpustakaan,
    //                 'alamat' => $request->alamat,
    //             ]);

    //             break;

    //         case 'khusus':

    //             PerpustakaanKhusus::create([
    //                 'nama_perpustakaan' => $request->nama_perpustakaan,
    //                 'alamat' => $request->alamat,
    //             ]);

    //             break;

    //         case 'komunitas':

    //             PerpustakaanKomunitas::create([
    //                 'nama_perpustakaan' => $request->nama_perpustakaan,
    //                 'alamat' => $request->alamat,
    //             ]);

    //             break;
    //     }

    //     return redirect()
    //         ->to('/admin/perpustakaan')
    //         ->with('success', 'Data berhasil ditambahkan');
    // }

    // User perpus
    public function userPerpustakaan(Request $request)
    {
        $query = PengajuanAkun::where(
            'status',
            'approved'
        );

        if ($request->search) {

            $query->where(
                'nama_pengelola',
                'like',
                '%' . $request->search . '%'
            );

        }

        $users = $query->paginate(10);

        $totalUser = PengajuanAkun::where(
            'status',
            'approved'
        )->count();

        return view(
            'admin.userPerpustakaan',
            compact(
                'users',
                'totalUser'
            )
        );
    }
    public function toggleUser($id)
    {
        $user = PengajuanAkun::findOrFail($id);

        $user->status_akun =
            $user->status_akun == 'aktif'
            ? 'nonaktif'
            : 'aktif';

        $user->save();

        return back()->with(
            'success',
            'Status akun berhasil diperbarui'
        );
    }
}