@extends('perpus.layout')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Profil Perpustakaan
    </h1>

    <div class="bg-white rounded-2xl shadow p-8">

        <div class="grid grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500">Nama Perpustakaan</p>

                <h2 class="font-bold text-xl">
                    {{ $perpustakaan->nama_perpustakaan }}
                </h2>
            </div>

            <div>
                <p class="text-gray-500">Nomor Pokok</p>

                <h2 class="font-bold">
                    {{ $perpustakaan->nomor_pokok }}
                </h2>
            </div>

            <div>
                <p class="text-gray-500">Kabupaten</p>

                <h2 class="font-bold">
                    {{ $perpustakaan->kabupaten->nama_kabupaten }}
                </h2>
            </div>

            <div>
                <p class="text-gray-500">Kecamatan</p>

                <h2 class="font-bold">
                    {{ $perpustakaan->kecamatan }}
                </h2>
            </div>

            <div>
                <p class="text-gray-500">Alamat</p>

                <h2 class="font-bold">
                    {{ $perpustakaan->alamat }}
                </h2>
            </div>

            @if(isset($perpustakaan->lembaga_induk))

            <div>
                <p class="text-gray-500">Lembaga Induk</p>

                <h2 class="font-bold">
                    {{ $perpustakaan->lembaga_induk }}
                </h2>
            </div>

            @endif

        </div>

        <div class="mt-10">

            <a href="/perpus/profil/edit"
               class="bg-cyan-700 hover:bg-cyan-800 text-white px-6 py-3 rounded-lg">

                Edit Profil

            </a>

        </div>

    </div>

</div>

@endsection