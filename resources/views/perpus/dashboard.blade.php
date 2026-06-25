@extends('perpus.layout')

@section('content')

<div class="p-6">

    <div class="bg-white rounded-xl shadow p-6">

        <div class="mt-6 grid md:grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500">Role</p>
                <p class="font-semibold">{{ $user->role }}</p>
            </div>

            <div>
                <p class="text-gray-500">Jenis Perpustakaan</p>
                <p class="font-semibold">{{ $user->jenis_perpustakaan }}</p>
            </div>

            <div>
                <p class="text-gray-500">Nama Perpustakaan</p>
                <p class="font-semibold">
                    {{ $perpustakaan->nama_perpustakaan ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Kabupaten</p>
                <p class="font-semibold">
                    {{ $perpustakaan->kabupaten->nama_kabupaten ?? '-' }}
                </p>
            </div>

            <div class="md:col-span-2">
                <p class="text-gray-500">Alamat</p>
                <p class="font-semibold">
                    {{ $perpustakaan->alamat ?? '-' }}
                </p>
            </div>

        </div>

    </div>

</div>

@endsection