@extends('perpus.layout')

@section('content')

        <div class="max-w-5xl mx-auto">

            <h1 class="text-3xl font-bold mb-8">
                Edit Profil Perpustakaan
            </h1>

            <div class="bg-white rounded-2xl shadow p-8">

                <form action="/perpus/profil/update" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="space-y-6">

                        <div>

                            <label class="font-medium">
                            Nama Perpustakaan
                            </label>

                            <input
                            type="text"
                            name="nama_perpustakaan"
                            value="{{ old('nama_perpustakaan',$perpustakaan->nama_perpustakaan) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                        </div>

                        <div>

                            <label class="font-medium">
                            Nomor Pokok
                            </label>

                            <input
                            type="text"
                            name="nomor_pokok"
                            value="{{ old('nomor_pokok',$perpustakaan->nomor_pokok) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                        </div>

                        <div>

                            <label class="font-medium">
                            Alamat
                            </label>

                            <textarea
                            name="alamat"
                            rows="4"
                            class="w-full border rounded-lg p-3 mt-2">{{ old('alamat',$perpustakaan->alamat) }}</textarea>

                        </div>

                    @if(isset($perpustakaan->lembaga_induk))

                        <div>

                            <label class="font-medium">
                            Lembaga Induk
                            </label>

                            <input
                            type="text"
                            name="lembaga_induk"
                            value="{{ old('lembaga_induk',$perpustakaan->lembaga_induk) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                        </div>

                        @endif

                        <div class="pt-4">

                            <button
                            class="bg-cyan-700 hover:bg-cyan-800 text-white px-6 py-3 rounded-lg">

                            Simpan Perubahan

                            </button>

                            <a
                            href="/perpus/profil"
                            class="ml-3 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                            Batal

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

@endsection