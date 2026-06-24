@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Dashboard Pengelola Perpustakaan
    </h1>

    @if($perpustakaan)

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-2xl font-bold text-blue-700">
            {{ $perpustakaan->nama_perpustakaan }}
        </h2>

        <div class="mt-4 space-y-2">

            <p>
                <strong>Nomor Pokok:</strong>
                {{ $perpustakaan->nomor_pokok }}
            </p>

            <p>
                <strong>Alamat:</strong>
                {{ $perpustakaan->alamat }}
            </p>

        </div>

    </div>

    @else

    <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg">

        Data perpustakaan belum terhubung.

    </div>

    @endif

</div>

@endsection