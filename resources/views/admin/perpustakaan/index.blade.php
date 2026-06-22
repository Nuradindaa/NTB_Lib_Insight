@extends('admin.layout')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="flex justify-between items-start mb-8">

        <div>

            <h1 class="text-4xl font-bold text-slate-800">
                Data Perpustakaan
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola data dan informasi seluruh perpustakaan di Provinsi Nusa Tenggara Barat.
            </p>

        </div>

        <a href="{{ url('/admin/perpustakaan/tambah') }}"
        class="bg-cyan-700 text-white px-6 py-3 rounded-xl font-semibold">
            + Tambah Perpustakaan
        </a>

    </div>

</div>
    {{-- Filter --}}
<div class="bg-white rounded-2xl shadow-sm p-5 mb-6">
<form method="GET">


    <div class="grid grid-cols-4 gap-4">

        <input
            type="text"
            name="keyword"
            value="{{ request('keyword') }}"
            placeholder="Nama Perpustakaan..."
        >

        <select name="kabupaten">

            <option value="">
                Semua Kabupaten/Kota
            </option>

            @foreach($daftarKabupaten as $item)

            <option
                value="{{ $item->id_kabupaten }}"
                {{ request('kabupaten') == $item->id_kabupaten ? 'selected' : '' }}>

                {{ $item->nama_kabupaten }}

            </option>

            @endforeach

        </select>

        <select name="jenis">

            <option value="">
                Semua Jenis
            </option>

            <option value="sekolah">
                Sekolah
            </option>

            <option value="desa">
                Desa
            </option>

            <option value="khusus">
                Khusus
            </option>

            <option value="komunitas">
                Komunitas
            </option>

        </select>

        <button
            type="submit"
            class="bg-cyan-700 text-white px-4 py-2 rounded">

            Cari

        </button>

    </div>
<!-- <div class="grid grid-cols-3 gap-4"> -->
<!-- </div>
{{-- Akreditasi --}}
<div class="grid grid-cols-2 gap-6 mb-6">

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <p class="text-sm text-slate-500">
            Akan Reakreditasi
        </p>

        <h2 class="text-4xl font-bold text-orange-500 mt-2">
            12
        </h2>

        <p class="text-slate-500 mt-2">
            Perpustakaan yang masa akreditasinya akan berakhir.
        </p>

    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6">

        <p class="text-sm text-slate-500">
            Sudah Kedaluwarsa
        </p>

        <h2 class="text-4xl font-bold text-red-500 mt-2">
            5
        </h2>

        <p class="text-slate-500 mt-2">
            Perlu dilakukan pembaruan akreditasi.
        </p>

    </div>

</div> -->


    {{-- tabel --}}
<div class="bg-white rounded-2xl shadow overflow-hidden mt-8">

    <table class="w-full">

        <thead class="bg-slate-50 border-b">

            <tr>

            <th class="p-4 text-left">Nama Perpustakaan</th>
            <th class="p-4 text-left">Jenis</th>
            <th class="p-4 text-left">Kabupaten/Kota</th>
            <th class="p-4 text-left">Alamat</th>
            <th class="p-4 text-left">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($data as $item)

            <tr class="border-b hover:bg-slate-50">

                <td class="p-4 font-medium">
                    {{ $item->nama_perpustakaan }}
                </td>

                <td class="p-4">
                    {{ $item->jenis_tampilan }}
                </td>

                <td class="p-4">
                    {{ $item->kabupaten->nama_kabupaten ?? '-' }}
                </td>

                <td class="p-4 max-w-xs truncate">
                    {{ $item->alamat ?? '-' }}
                </td>

                <td class="p-4">

                    <div class="flex gap-4 text-lg">

                        <a href="{{ route(
                            'admin.perpustakaan.detail',
                            [$item->jenis_asli, $item->id]
                        ) }}"
                        class="text-sky-500">
                            👁
                        </a>
                        <a href="{{ url('/admin/perpustakaan/edit/'.$item->jenis_url.'/'.$item->id) }}">
                            ✏
                        </a>

                        <form
                            action="{{ url('/admin/perpustakaan/hapus/'.$item->jenis_url.'/'.$item->id) }}"
                            method="POST"
                            class="inline delete-form">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-500 text-white px-3 py-2 rounded-lg">
                                🗑
                            </button>
                        </form>


                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection