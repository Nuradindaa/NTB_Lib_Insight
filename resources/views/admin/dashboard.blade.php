@extends('admin.layout')

@section('content')

<div class="min-h-screen bg-slate-100">

    <div class="max-w-7xl mx-auto px-6 py-8">

<div class="flex justify-between items-center mb-8">

        <div>

            <p class="text-sm text-gray-500">
                Home > Admin Master
            </p>

            <h1 class="text-4xl font-bold text-slate-800 mt-2">
                Dashboard Admin Master
            </h1>

            <p class="text-gray-500 mt-2">
                Sistem Monitoring dan Pengelolaan Perpustakaan NTB
            </p>

        </div>

        <div class="flex items-center gap-4">

            <div class="text-right">

                <div class="font-semibold">
                    Super Admin
                </div>

                <div class="text-sm text-gray-500">
                    NTB Lib Insights
                </div>

            </div>

            <div
                class="w-12 h-12 rounded-full bg-cyan-900 text-white flex items-center justify-center font-bold">

                A

            </div>

        </div>

    </div>

        {{-- Statistik --}}
        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">Total Perpustakaan</p>
                <h2 class="text-4xl font-bold text-black-500 mt-2">{{ number_format($totalPerpustakaan,0,',','.') }}</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">Pengajuan Pending</p>
                <h2 class="text-4xl font-bold text-orange-500 mt-2">{{ $pengajuanPending }}</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">Akun Aktif</p>
                <h2 class="text-4xl font-bold text-green-500 mt-2">{{ $akunAktif }}</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">Admin Perpustakaan</p>
                <h2 class="text-4xl font-bold text-cyan-700 mt-2">{{ $adminPerpus }}</h2>
            </div>

        </div>

        {{-- Menu Cepat --}}
        <div class="grid md:grid-cols-3 gap-6 mt-8">

            <a href="/admin/pengajuan-akun"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg">

                <h3 class="font-bold text-xl">
                    📋 Pengajuan Akun
                </h3>

                <p class="text-gray-500 mt-2">
                    Verifikasi akun pengelola perpustakaan.
                </p>

            </a>

            <a href="/admin/perpustakaan"
               class="bg-white p-6 rounded-2xl shadow hover:shadow-lg">

                <h3 class="font-bold text-xl">
                    🏛️ Data Perpustakaan
                </h3>

                <p class="text-gray-500 mt-2">
                    Kelola seluruh data perpustakaan.
                </p>

            </a>

            <div class="bg-white p-6 rounded-2xl shadow">
                <a href="{{ route('admin.akreditasi') }}"
                class="block bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">

                    <h3 class="text-xl font-bold">
                        📊 Perbarui Akreditasi
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Monitoring Status Akreditasi
                    </p>

                </a>

            </div>

        </div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">

    {{-- Tabel Pengajuan --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between mb-6">

            <h3 class="text-xl font-bold">
                Tabel Pengajuan Akun Terbaru
            </h3>

            <a
                href="{{ route('pengajuan.index') }}"
                class="text-cyan-700 font-medium">

                Lihat Semua

            </a>

        </div>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Perpustakaan
                    </th>

                    <th class="text-left py-3">
                        Pengelola
                    </th>

                    <th class="text-left py-3">
                        Kabupaten
                    </th>

                    <th class="text-left py-3">
                        Status
                    </th>

                </tr>

            </thead>

        <tbody>

        @foreach($pengajuanTerbaru as $item)

        <tr>

            <td class="py-3">
                {{ $item->nama_perpustakaan }}
            </td>

            <td class="py-3">
                {{ $item->nama_pengelola }}
            </td>

            <td class="py-3">
                {{ $item->kabupaten->nama_kabupaten ?? '-' }}
            </td>

            <td class="py-3">

                @if($item->status == 'pending')

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                        Pending
                    </span>

                @elseif($item->status == 'approved')

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                        Approved
                    </span>

                @else

                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                        Rejected
                    </span>

                @endif

            </td>

        </tr>

        @endforeach


        
        </tbody>

        </table>

    </div>

    {{-- Aktivitas --}}
    <div class="bg-white rounded-2xl shadow p-6">

        <h3 class="text-xl font-bold mb-6">
            Ringkasan Aktivitas
        </h3>

        <div class="space-y-4">

            @foreach($aktivitas as $item)

                <div class="border-b pb-3">

                    <div class="text-sm text-gray-700">
                        🟢 {{ $item->aktivitas }}
                    </div>

                    <div class="text-xs text-gray-400">
                        {{ $item->created_at->diffForHumans() }}
                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>
</div> {{-- max-w-7xl --}}
</div> {{-- min-h-screen --}}

@endsection