<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PerpustakaanSekolah;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $perpustakaan = null;

        if ($user->jenis_perpustakaan == 'sekolah') {

            $perpustakaan = PerpustakaanSekolah::find(
                $user->perpustakaan_id
            );
        }

        return view(
            'pengelola.dashboard',
            compact('perpustakaan')
        );
    }
}