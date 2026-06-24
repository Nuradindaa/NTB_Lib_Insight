@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Dashboard Admin Perpustakaan
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500">Status Akreditasi</h3>
            <p class="text-2xl font-bold text-green-600">B</p>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500">Jumlah SDM</h3>
            <p class="text-2xl font-bold">12</p>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500">Sarana Prasarana</h3>
            <p class="text-2xl font-bold">8</p>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <h3 class="text-gray-500">Pengajuan</h3>
            <p class="text-2xl font-bold">3</p>
        </div>

    </div>

</div>

@endsection