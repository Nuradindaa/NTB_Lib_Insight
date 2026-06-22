@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl">

    <h1 class="text-3xl font-bold mb-6">
        Tambah Perpustakaan
    </h1>
<form action="{{ url('/admin/perpustakaan/store') }}"
      method="POST">

    @csrf

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label>Jenis Perpustakaan</label>

            <select
                name="jenis"
                class="w-full border rounded-lg p-3">

                <option value="sekolah">Sekolah</option>
                <option value="desa">Desa</option>
                <option value="khusus">Khusus</option>
                <option value="komunitas">Komunitas</option>

            </select>
        </div>

        <div>
            <label>Nama Perpustakaan</label>

            <input
                type="text"
                name="nama_perpustakaan"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label>Kabupaten</label>

            <select
                id="kabupaten"
                name="id_kabupaten"
                class="w-full border rounded-lg p-3">
                    

                @foreach($kabupaten as $item)

                <option
                    value="{{ $item->id_kabupaten }}">

                    {{ $item->nama_kabupaten }}

                </option>

                @endforeach

            </select>
        </div>

        <div>
            <label>Kecamatan</label>

            <select
                id="kecamatan"
                name="id_kecamatan"
                class="w-full border rounded-lg p-3">

                @foreach($kecamatan as $item)

                <option
                    value="{{ $item->id_kecamatan }}">

                    {{ $item->nama_kecamatan }}

                </option>

                @endforeach

            </select>
        </div>

        <div>
            <label>Kelurahan</label>

            <select
                id="kelurahan"
                name="id_kelurahan"
                class="w-full border rounded-lg p-3">

                @foreach($kelurahan as $item)

                <option
                    value="{{ $item->id_kelurahan }}">

                    {{ $item->nama_kelurahan }}

                </option>

                @endforeach

            </select>
        </div>

        <div>
            <label>Nomor Pokok</label>

            <input
                type="text"
                name="nomor_pokok"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label>Lembaga Induk</label>

            <input
                type="text"
                name="lembaga_induk"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label>Subjenis</label>

            <input
                type="text"
                name="subjenis"
                class="w-full border rounded-lg p-3">
        </div>

    </div>

    <div class="mt-4">

        <label>Alamat</label>

        <textarea
            name="alamat"
            rows="4"
            class="w-full border rounded-lg p-3"></textarea>

    </div>

    <button
        type="submit"
        class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg">

        Simpan

    </button>

</form>

</div>

<script>

document
.getElementById('kabupaten')
.addEventListener('change', function () {

    let idKabupaten = this.value;

    fetch('/get-kecamatan/' + idKabupaten)
        .then(response => response.json())
        .then(data => {

            let kecamatan =
                document.getElementById('kecamatan');

            kecamatan.innerHTML = '';

            data.forEach(item => {

                kecamatan.innerHTML += `
                    <option value="${item.id_kecamatan}">
                        ${item.nama_kecamatan}
                    </option>
                `;
            });

            kecamatan.dispatchEvent(
                new Event('change')
            );
        });
});

document
.getElementById('kecamatan')
.addEventListener('change', function () {

    let idKecamatan = this.value;

    fetch('/get-kelurahan/' + idKecamatan)
        .then(response => response.json())
        .then(data => {

            let kelurahan =
                document.getElementById('kelurahan');

            kelurahan.innerHTML = '';

            data.forEach(item => {

                kelurahan.innerHTML += `
                    <option value="${item.id_kelurahan}">
                        ${item.nama_kelurahan}
                    </option>
                `;
            });

        });

});

</script>

@endsection