@extends('admin.layout')

@section('content')

<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        ✏️ Edit Akreditasi
    </h1>

    <form method="POST"
          action="{{ route('admin.akreditasi.update',$akreditasi->id_akreditasi) }}">

        @csrf
        @method('PUT')

        <div class="bg-white p-6 rounded-2xl shadow">

            <div class="mb-4">

                <label class="font-semibold">
                    Nama Perpustakaan
                </label>

                <input
                    type="text"
                    value="{{ $akreditasi->nama_perpustakaan }}"
                    class="w-full border rounded-lg p-3 bg-gray-100"
                    readonly>

            </div>

            <div class="mb-4">

                <label>Nilai Akreditasi</label>

                <select
                    name="nilai_akreditasi"
                    class="w-full border rounded-lg p-3">

                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>

                </select>

            </div>

            <div class="mb-4">

                <label>Tahun Terbit</label>

                <input
                    type="number"
                    name="tahun_terbit"
                    value="{{ $akreditasi->tahun_terbit }}"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label>Jangka Waktu</label>

                <input
                    type="number"
                    name="jangka_waktu"
                    value="{{ $akreditasi->jangka_waktu }}"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label>Tahun Berakhir</label>

                <input
                    type="number"
                    name="tahun_berakhir"
                    value="{{ $akreditasi->tahun_berakhir }}"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-6">

                <label>Status</label>

                <select
                    name="status"
                    class="w-full border rounded-lg p-3">

                    <option value="berlaku">Berlaku</option>
                    <option value="expired">Expired</option>

                </select>

            </div>

            <button
                class="bg-green-600 text-white px-6 py-3 rounded-lg">

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection