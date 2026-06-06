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