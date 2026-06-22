@extends('layouts.app')

@section('content')

<div class="min-h-screen lg:grid lg:grid-cols-5">

{{-- PANEL KIRI --}}
<div
    class="hidden lg:flex lg:col-span-2 relative items-center"
    style="
        background-image: url('{{ asset('assets/Perpus_NTB.png') }}');
        background-size:cover;
        background-position:center;
    ">

    <div class="absolute inset-0 bg-cyan-950/80"></div>

    <div class="relative z-10 text-white px-12 max-w-lg">

        <h1 class="text-4xl xl:text-5xl font-bold leading-tight mb-6">
            Menjadi Bagian dari Transformasi Perpustakaan NTB
        </h1>

        <p class="text-gray-200 mb-8">
            Ajukan akun pengelola untuk mengelola data perpustakaan,
            memperbarui informasi, dan mendukung proses akreditasi
            perpustakaan di Provinsi Nusa Tenggara Barat.
        </p>

        <div class="space-y-4">

            <div class="flex gap-3">
                <span>📚</span>
                <span>Kelola data perpustakaan secara mandiri</span>
            </div>

            <div class="flex gap-3">
                <span>✅</span>
                <span>Mendukung proses akreditasi</span>
            </div>

            <div class="flex gap-3">
                <span>📊</span>
                <span>Terintegrasi dengan dashboard NTB Lib-Insights</span>
            </div>

        </div>

        <div class="mt-12 text-sm text-cyan-200">
            WEST NUSA TENGGARA LIBRARY & ARCHIVES OFFICE
        </div>

    </div>

</div>

{{-- PANEL KANAN --}}
<div class="lg:col-span-3 bg-gray-50 flex items-center justify-center p-8">

    <div class="bg-white rounded-3xl shadow-lg p-10 w-full max-w-3xl">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-cyan-900">
                Pengajuan Akun Pengelola
            </h2>

            <p class="text-gray-500 mt-2">
                Lengkapi data berikut untuk mengajukan akun pengelola perpustakaan.
            </p>

        </div>

        <form action="{{ route('pengajuan.store') }}" method="POST">

            @csrf

            <div class="mb-4">

                <label class="block mb-2 font-medium">
                    Nama Perpustakaan
                </label>

                <input
                    type="text"
                    name="nama_perpustakaan"
                    class="w-full border rounded-xl p-3"
                    placeholder="Masukkan nama perpustakaan">

            </div>

            <div class="grid md:grid-cols-2 gap-4 mb-4">

                <div>

                    <label class="block mb-2 font-medium">
                        Jenis Perpustakaan
                    </label>

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

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Kabupaten/Kota
                    </label>

                    <select
                        name="id_kabupaten"
                        class="w-full border rounded-xl p-3">

                        <option>Pilih Kabupaten</option>

                        @foreach($kabupaten as $item)
                            <option value="{{ $item->id_kabupaten }}">
                                {{ $item->nama_kabupaten }}
                            </option>
                        @endforeach

                    </select>

                </div>

            </div>

            <div class="grid md:grid-cols-2 gap-4 mb-4">

                <div>

                    <label class="block mb-2 font-medium">
                        Nama Pengelola
                    </label>

                    <input
                        type="text"
                        name="nama_pengelola"
                        class="w-full border rounded-xl p-3">

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="w-full border rounded-xl p-3">

                </div>

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-medium">
                    Nomor HP / WhatsApp
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="w-full border rounded-xl p-3">

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-medium">
                    Alasan Pengajuan
                </label>

                <textarea
                    name="alasan"
                    rows="4"
                    class="w-full border rounded-xl p-3"
                    placeholder="Jelaskan kebutuhan akun Anda"></textarea>

            </div>

            <div class="flex flex-wrap gap-4 items-center">

                <button
                    type="submit"
                    class="bg-cyan-900 hover:bg-cyan-800 text-white px-8 py-3 rounded-xl">

                    Kirim Pengajuan

                </button>

                <a
                    href="/"
                    class="text-cyan-700 hover:underline">

                    Kembali ke Beranda

                </a>

            </div>

        </form>

        <div class="mt-8 bg-cyan-50 border border-cyan-100 rounded-xl p-4 text-sm text-cyan-900">

            ℹ️ Setelah pengajuan dikirim, Admin Master akan melakukan
            verifikasi sebelum akun diaktifkan. Notifikasi akan dikirim
            melalui email.

        </div>

    </div>

</div>

</div>

@endsection
