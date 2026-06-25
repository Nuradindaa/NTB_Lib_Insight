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

            <div class="grid md:grid-cols-2 gap-4 mb-4">

                <div>

                    <label class="block mb-2 font-medium">
                        Jenis Perpustakaan
                    </label>

                    <select
                        id="id_jenis"
                        name="id_jenis"
                        class="w-full border rounded-xl p-3"
                        required>

                        <option value="">Pilih Jenis</option>

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
                        id="id_kabupaten"
                        name="id_kabupaten"
                        class="w-full border rounded-xl p-3"
                        required>

                        <option value="">Pilih Kabupaten</option>

                        @foreach($kabupaten as $item)
                            <option value="{{ $item->id_kabupaten }}">
                                {{ $item->nama_kabupaten }}
                            </option>
                        @endforeach

                    </select>

                </div>

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-medium">
                    Nama Perpustakaan
                </label>

                <select
                    id="perpustakaan_id"
                    name="perpustakaan_id"
                    disabled
                    class="w-full border rounded-xl p-3 bg-gray-100"
                    required>

                    <option value="">
                        Pilih Jenis dan Kabupaten terlebih dahulu
                    </option>

                </select>

                <div
                    class="border rounded-lg mt-1 bg-white hidden">
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

<script>

document.addEventListener('DOMContentLoaded', function () {

    const jenis = document.getElementById('id_jenis');
    const kabupaten = document.getElementById('id_kabupaten');
    const perpustakaan = document.getElementById('perpustakaan_id');

    function loadPerpustakaan() {

        if (jenis.value === "" || kabupaten.value === "") {

            perpustakaan.disabled = true;

            perpustakaan.innerHTML =
                '<option value="">Pilih Jenis dan Kabupaten terlebih dahulu</option>';

            return;
        }

        fetch(`/get-perpustakaan/${jenis.value}/${kabupaten.value}`)
        .then(response => response.json())
        .then(data => {

            perpustakaan.disabled = false;

            perpustakaan.innerHTML =
                '<option value="">Pilih Perpustakaan</option>';

            data.forEach(item => {

                perpustakaan.innerHTML += `
                    <option value="${item.id}">
                        ${item.nama_perpustakaan}
                    </option>
                `;

            });

        })
        .catch(error => {

            console.error(error);

        });

    }

    jenis.addEventListener('change', loadPerpustakaan);
    kabupaten.addEventListener('change', loadPerpustakaan);

});

</script>

@endsection