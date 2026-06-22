@extends('admin.layout')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-2">
        User Perpustakaan
    </h1>

    <p class="text-gray-500 mb-6">
        Daftar akun pengelola perpustakaan yang telah disetujui.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Total User</p>
            <h3 class="text-3xl font-bold text-blue-600">
                {{ $users->count() }}
            </h3>
        </div>

        <div class="bg-green-50 border border-green-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Perpus Sekolah</p>
            <h3 class="text-3xl font-bold text-green-600">
                -
            </h3>
        </div>

        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Perpus Desa</p>
            <h3 class="text-3xl font-bold text-yellow-600">
                -
            </h3>
        </div>

        <div class="bg-purple-50 border border-purple-200 rounded-2xl p-5">
            <p class="text-gray-500 text-sm">Komunitas/Khusus</p>
            <h3 class="text-3xl font-bold text-purple-600">
                -
            </h3>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow p-5 mb-6">

        <form method="GET" class="flex gap-3">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama pengelola..."
                class="flex-1 border rounded-xl px-4 py-3">

            <button
                type="submit"
                class="bg-sky-600 text-white px-6 rounded-xl">
                Cari
            </button>

        </form>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-4 text-left">Nama Perpustakaan</th>
                    <th class="p-4 text-left">Nama Pengelola</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">No HP</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                <tr class="border-b">

                    <td class="p-4">
                        {{ $user->nama_perpustakaan }}
                    </td>

                    <td class="p-4">
                        {{ $user->nama_pengelola }}
                    </td>

                    <td class="p-4">
                        {{ $user->email }}
                    </td>

                    <td class="p-4">
                        {{ $user->no_hp }}
                    </td>
                    <td class="p-4 text-center">

                        @if($user->status_akun == 'aktif')

                            <span
                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Aktif
                            </span>

                        @else

                            <span
                                class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Nonaktif
                            </span>

                        @endif

                    </td>
                    <td>
                        <form
                            action="{{ route('admin.user.toggle',$user->id) }}"
                            method="POST">

                            @csrf

                            @if($user->status_akun == 'aktif')

                                <button
                                    class="bg-red-600 text-white px-3 py-2 rounded-lg">
                                    Nonaktifkan
                                </button>

                            @else

                                <button
                                    class="bg-green-600 text-white px-3 py-2 rounded-lg">
                                    Aktifkan
                                </button>

                            @endif

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="p-6 text-center text-gray-500">
                        Belum ada user perpustakaan.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection