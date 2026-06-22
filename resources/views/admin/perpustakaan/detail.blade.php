@extends('admin.layout')

@section('content')

@php
    $fields = $data->toArray();
@endphp

@php
$hidden = [
    'id',
    'id_kabupaten',
    'id_kecamatan',
    'id_kelurahan',
    'id_jenis'
];
@endphp

<div class="bg-white rounded-3xl shadow p-8">
    <div class="bg-white rounded-3xl shadow p-8">

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold">
            Detail Perpustakaan
        </h2>

        <a href="{{ url('/admin/perpustakaan') }}"
           class="bg-gray-500 text-white px-5 py-2 rounded-xl">
            Kembali
        </a>
    </div>
<div class="grid grid-cols-2 gap-6">

    @foreach($fields as $field => $value)

        @if(!is_array($value) &&
            !in_array($field, [
                'id',
                'id_kabupaten',
                'id_kecamatan',
                'id_kelurahan',
                'id_jenis',
                'kabupaten'
            ]))

            <div>
                <p class="font-semibold text-gray-700">
                    {{ ucwords(str_replace('_', ' ', $field)) }}
                </p>

                <p>
                    {{ $value ?: '-' }}
                </p>
            </div>

        @endif

    @endforeach

    @if(isset($data->kabupaten))
    <div>
        <p class="font-semibold">
            Kabupaten/Kota
        </p>

        <p>
            {{ $data->kabupaten->nama_kabupaten }}
        </p>
    </div>
    @endif
</div>

@endsection