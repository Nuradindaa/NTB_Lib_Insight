@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-6">
            🏛️ Pengajuan Akun Pengelola Perpustakaan
        </h1>

        <form action="{{ route('pengajuan.store') }}"
              method="POST">

            @csrf

            <div class="space-y-4">

                <input
                    type="text"
                    name="nama_perpustakaan"
                    placeholder="Nama Perpustakaan"
                    class="w-full border rounded-xl p-3">

                <input
                    type="text"
                    name="nama_pengelola"
                    placeholder="Nama Pengelola"
                    class="w-full border rounded-xl p-3">

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full border rounded-xl p-3">

                <input
                    type="text"
                    name="no_hp"
                    placeholder="Nomor HP"
                    class="w-full border rounded-xl p-3">

                <select
                    name="id_kabupaten"
                    class="w-full border rounded-xl p-3">

                    <option>Pilih Kabupaten</option>

                    @foreach($kabupaten as $item)
                        <option value="{{ $item->id_kabupaten }}">
                            {{ $item->kabupaten->nama_kabupaten ?? '-' }}
                        </option>
                    @endforeach

                </select>

                <select
                    name="id_jenis"
                    class="w-full border rounded-xl p-3">

                    <option>Pilih Jenis</option>

                    @foreach($jenis as $item)
                        <option value="{{ $item->id_jenis }}">
                            {{ $item->nama_jenis }}
                        </option>
                    @endforeach

                </select>

                <textarea
                    name="alasan"
                    rows="4"
                    placeholder="Alasan pengajuan akun"
                    class="w-full border rounded-xl p-3"></textarea>

                <button
                    class="bg-cyan-700 text-white px-6 py-3 rounded-xl">

                    Kirim Pengajuan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection