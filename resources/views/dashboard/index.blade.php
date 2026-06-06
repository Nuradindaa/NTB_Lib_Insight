@extends('layouts.app')

@section('content')

@include('components.navbar')

<div class="max-w-7xl mx-auto px-6 py-6">

    {{-- STATISTIK --}}
    @include('dashboard.stats')

    {{-- FILTER --}}
    <div class="mt-8">
        @include('dashboard.filters')
    </div>
    
    {{-- GRAFIK --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

        @include('dashboard.chart')

        @include('dashboard.chart-kabupaten')

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