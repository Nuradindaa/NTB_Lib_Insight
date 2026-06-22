@extends('admin.layout')

@section('content')
<div class="bg-white rounded-3xl shadow p-8">

    <h2 class="text-3xl font-bold mb-8">
        Edit Perpustakaan
    </h2>

    <form action="{{ url('/admin/perpustakaan/update/'.$jenis.'/'.$data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="font-semibold">Nomor</label>
                <input type="text"
                       name="nomor"
                       value="{{ $data->nomor }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">Jumlah Per Kabupaten</label>
                <input type="text"
                       name="jumlah_per_kabupaten"
                       value="{{ $data->jumlah_per_kabupaten }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">Desa/Kelurahan</label>
                <input type="text"
                       name="desa_kelurahan"
                       value="{{ $data->desa_kelurahan }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">Kecamatan</label>
                <input type="text"
                       name="kecamatan"
                       value="{{ $data->kecamatan }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">Nama Perpustakaan</label>
                <input type="text"
                       name="nama_perpustakaan"
                       value="{{ $data->nama_perpustakaan }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">Nomor Pokok</label>
                <input type="text"
                       name="nomor_pokok"
                       value="{{ $data->nomor_pokok }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">Lembaga Induk</label>
                <input type="text"
                       name="lembaga_induk"
                       value="{{ $data->lembaga_induk }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

            <div>
                <label class="font-semibold">Subjenis</label>
                <input type="text"
                       name="subjenis"
                       value="{{ $data->subjenis }}"
                       class="w-full border rounded-xl p-3 mt-2">
            </div>

        </div>

        <div class="mt-6">
            <label class="font-semibold">Alamat</label>
            <textarea name="alamat"
                      rows="4"
                      class="w-full border rounded-xl p-3 mt-2">{{ $data->alamat }}</textarea>
        </div>

        <div class="mt-8">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>
@endsection