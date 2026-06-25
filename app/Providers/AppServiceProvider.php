<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\PerpustakaanSekolah;
use App\Models\PerpustakaanDesa;
use App\Models\PerpustakaanKhusus;
use App\Models\PerpustakaanKomunitas;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useTailwind();

        View::composer('perpus.*', function ($view) {
            $user = Auth::user();
            $perpustakaan = null;

            if ($user) {
                $perpustakaan = match ($user->jenis_perpustakaan) {
                    'SEKOLAH' => PerpustakaanSekolah::find($user->perpustakaan_id),
                    'DESA' => PerpustakaanDesa::find($user->perpustakaan_id),
                    'KHUSUS' => PerpustakaanKhusus::find($user->perpustakaan_id),
                    'KOMUNITAS' => PerpustakaanKomunitas::find($user->perpustakaan_id),
                    default => null,
                };
            }

            $view->with('perpustakaan', $perpustakaan);
        });
    }
}
