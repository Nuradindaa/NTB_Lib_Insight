@extends('layouts.app')

@section('content')

@include('components.navbar')

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="flex justify-between items-start mb-8">

        <div>
            <p class="text-sm text-gray-500 mb-2">
                Home > Akreditasi
            </p>

            <h1 class="text-4xl font-bold text-slate-800">
                Dashboard Akreditasi Perpustakaan NTB
            </h1>

            <p class="text-gray-500 mt-2">
                Monitoring status akreditasi perpustakaan di Provinsi Nusa Tenggara Barat
            </p>
        </div>

    </div>

    {{-- STATISTIK --}}
    @include('dashboard.stats')

    {{-- FILTER --}}
    <div class="mt-8">
        @include('dashboard.filters')
    </div>
    
    {{-- GRAFIK --}}
    <div class="mt-8">

        @include('dashboard.chart')

    </div>

    {{-- STATUS --}}
    <div class="mt-8">
        @include('dashboard.accreditation')
    </div>

    {{-- TABEL --}}
    <div class="mt-8">
        @include('dashboard.table')
    </div>


</div>

@endsection