@extends('layouts.app')

@section('content')

@include('components.navbar')
<a href="{{ route('pengajuan.create') }}"
   class="bg-orange-500 text-white px-6 py-3 rounded-xl">

   Ajukan Akun Pengelola

</a>

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-4xl font-bold mb-8">
        Dashboard Ringkasan NTB Lib-Insights
    </h1>

    <div class="grid md:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3>Total Perpustakaan</h3>
            <p class="text-4xl font-bold mt-2">
                {{ number_format($totalPerpustakaan) }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3>Terakreditasi</h3>
            <p class="text-4xl font-bold mt-2">
                {{ $totalAkreditasi }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3>Kabupaten/Kota</h3>
            <p class="text-4xl font-bold mt-2">
                {{ $jumlahKabupaten }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3>Tingkat Akreditasi</h3>
            <p class="text-4xl font-bold mt-2">
                {{ round(($totalAkreditasi / $totalPerpustakaan) * 100, 1) }}%
            </p>
        </div>

    </div>

</div>

<div class="grid md:grid-cols-2 gap-6 mt-8">
        <a
        class="bg-blue-600 text-white px-6 py-3 rounded-xl">
            Buka Dashboard Akreditasi
        </a>

        <a
        class="bg-green-600 text-white px-6 py-3 rounded-xl">
            Buka Dashboard Pemetaan
        </a>

    <a href="/dashboard-akreditasi"
       class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-xl">

        <h2 class="text-2xl font-bold mb-3">
            📚 Dashboard Akreditasi
        </h2>

        <p class="text-gray-600">
            Kelola data akreditasi perpustakaan.
        </p>

    </a>

    <a href="/dashboard-pemetaan"
       class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-xl">

        <h2 class="text-2xl font-bold mb-3">
            🗺 Dashboard Pemetaan
        </h2>

        <p class="text-gray-600">
            Menampilkan persebaran perpustakaan di NTB.
        </p>

    </a>

</div>
<div class="bg-white rounded-3xl shadow-lg p-6 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Komposisi Perpustakaan NTB
    </h2>

    <div class="grid md:grid-cols-4 gap-4">

        <div class="bg-cyan-50 rounded-xl p-4">
            <h4 class="font-semibold">Sekolah</h4>
            <p class="text-3xl font-bold">
                {{ number_format($totalSekolah) }}
            </p>
        </div>

        <div class="bg-green-50 rounded-xl p-4">
            <h4 class="font-semibold">Desa</h4>
            <p class="text-3xl font-bold">
                {{ number_format($totalDesa) }}
            </p>
        </div>

        <div class="bg-yellow-50 rounded-xl p-4">
            <h4 class="font-semibold">Komunitas</h4>
            <p class="text-3xl font-bold">
                {{ number_format($totalKomunitas) }}
            </p>
        </div>

        <div class="bg-purple-50 rounded-xl p-4">
            <h4 class="font-semibold">Khusus</h4>
            <p class="text-3xl font-bold">
                {{ number_format($totalKhusus) }}
            </p>
        </div>

    </div>

</div>

{{-- lalu tempel komposisi perpustakaan di bawahnya --}}

@endsection