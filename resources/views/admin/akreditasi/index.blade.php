@extends('admin.layout')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-2">
        📊 Perbarui Akreditasi
    </h1>

    <p class="text-gray-500 mb-6">
        Kelola dan perbarui data akreditasi perpustakaan.
    </p>

    <div class="grid grid-cols-3 gap-4 mb-6">

        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Pending</p>
            <h3 class="text-3xl font-bold text-yellow-600">
                {{ $pending }}
            </h3>
        </div>

        <div class="bg-green-50 border border-green-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Disetujui</p>
            <h3 class="text-3xl font-bold text-green-600">
                {{ $approved }}
            </h3>
        </div>

        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Ditolak</p>
            <h3 class="text-3xl font-bold text-red-600">
                {{ $rejected }}
            </h3>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden mb-8">

    <div class="px-6 py-4 border-b bg-gray-50">
        <h2 class="text-xl font-bold">
            📩 Pengajuan Reakreditasi
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Verifikasi perubahan akreditasi yang diajukan oleh pengelola perpustakaan.
        </p>
    </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-4 text-left">Perpustakaan</th>
                    <th class="p-4 text-left">Pengaju</th>
                    <th class="p-4 text-center">Lama</th>
                    <th class="p-4 text-center">Baru</th>
                    <th class="p-4 text-center">Bukti</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

@foreach($pengajuan as $item)

        <tr class="border-b">

            <td class="p-4">
                {{ $item->nama_perpustakaan }}
            </td>

            <td class="p-4">
                {{ $item->user_id }}
            </td>

            <td class="p-4 text-center">
                {{ $item->akreditasi_lama }}
            </td>

            <td class="p-4 text-center">
                {{ $item->akreditasi_baru }}
            </td>

            <td class="p-4 text-center">

                <a href="{{ asset('storage/'.$item->dokumen_bukti) }}"
                    target="_blank"
                    class="bg-sky-600 text-white px-3 py-2 rounded-lg">

                    Lihat Bukti

                </a>

            </td>

            <td class="p-4 text-center">

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                    {{ ucfirst($item->status) }}
                </span>

            </td>

            <td class="p-4 text-center">

                <form action="{{ route('akreditasi.approve',$item->id) }}"
                    method="POST"
                    class="inline">

                    @csrf

                    <button
                        type="submit"
                        class="bg-green-600 text-white px-3 py-2 rounded-lg">

                        Approve

                    </button>

                </form>

                <form action="{{ route('akreditasi.reject',$item->id) }}"
                    method="POST"
                    class="inline ml-2">

                    @csrf

                    <button
                        type="submit"
                        class="bg-red-600 text-white px-3 py-2 rounded-lg">

                        Tolak

                    </button>

                </form>

            </td>

        </tr>

        @endforeach
            </tbody>

        </table>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mb-8">

    <!-- Search -->
     
    <div class="lg:col-span-4 bg-white p-5 rounded-2xl shadow">
        <form method="GET" class="flex gap-3">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama perpustakaan..."
                class="flex-1 border rounded-xl px-4 py-3">

            <button
                type="submit"
                class="bg-sky-600 text-white px-6 rounded-xl">
                Cari
            </button>

            <a href="{{ url('/admin/perbarui-akreditasi') }}"
                class="bg-gray-200 px-6 py-3 rounded-xl">
                Reset
            </a>

        </form>
    </div>

</div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="px-6 py-4 border-b bg-gray-50">
            <h2 class="text-xl font-bold">
                Data Akreditasi Perpustakaan
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Kelola data akreditasi perpustakaan yang telah terverifikasi.
            </p>
        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">
                        Nama Perpustakaan
                    </th>

                    <th class="p-4 text-left">
                        Akreditasi
                    </th>

                    <th class="p-4 text-left">
                        Tahun Terbit
                    </th>

                    <th class="p-4 text-left">
                        Tahun Berakhir
                    </th>

                    <th class="p-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($akreditasi as $item)

                <tr class="border-b">

                    <td class="p-4">
                        {{ $item->nama_perpustakaan }}
                    </td>

                    <td class="p-4">
                        {{ $item->nilai_akreditasi }}
                    </td>

                    <td class="p-4">
                        {{ $item->tahun_terbit }}
                    </td>

                    <td class="p-4">
                        {{ $item->tahun_berakhir }}
                    </td>

                    <td class="p-4 text-center">

                    <a href="{{ route('admin.akreditasi.edit',$item->id_akreditasi) }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg">

                        Edit

                    </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="p-6 text-center text-gray-500">

                        Belum ada data.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-4">
        {{ $akreditasi->appends(request()->query())->links() }}
    </div>

</div>

@endsection