<!-- @extends('admin.layout')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-2">
        📩 Pengajuan Reakreditasi
    </h1>

    <p class="text-gray-500 mb-6">
        Verifikasi pengajuan perubahan akreditasi dari perpustakaan.
    </p>

    <div class="grid grid-cols-3 gap-4 mb-6">

        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Pending</p>
            <h3 class="text-3xl font-bold text-yellow-600">5</h3>
        </div>

        <div class="bg-green-50 border border-green-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Disetujui</p>
            <h3 class="text-3xl font-bold text-green-600">12</h3>
        </div>

        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Ditolak</p>
            <h3 class="text-3xl font-bold text-red-600">1</h3>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

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

                <tr class="border-b">

                    <td class="p-4">
                        SDN 10 Montong Betok
                    </td>

                    <td class="p-4">
                        Ahmad Fauzi
                    </td>

                    <td class="p-4 text-center">
                        C
                    </td>

                    <td class="p-4 text-center">
                        B
                    </td>

                    <td class="p-4 text-center">

                        <a href="#"
                           class="bg-sky-600 text-white px-3 py-2 rounded-lg">
                            Lihat Bukti
                        </a>

                    </td>

                    <td class="p-4 text-center">

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            Pending
                        </span>

                    </td>

                    <td class="p-4 text-center">

                        <button
                            class="bg-green-600 text-white px-3 py-2 rounded-lg">
                            Approve
                        </button>

                        <button
                            class="bg-red-600 text-white px-3 py-2 rounded-lg ml-2">
                            Tolak
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection -->