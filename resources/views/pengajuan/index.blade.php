@extends('admin.layout')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        📋 Daftar Pengajuan Akun
    </h1>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-4 text-left">Perpustakaan</th>
                    <th class="p-4 text-left">Pengelola</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Kabupaten</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @foreach($pengajuan as $item)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $item->nama_perpustakaan }}
                    </td>

                    <td class="p-4">
                        {{ $item->nama_pengelola }}
                    </td>

                    <td class="p-4">
                        {{ $item->email }}
                    </td>

                    <td class="p-4">
                        {{ $item->kabupaten->nama_kabupaten ?? '-' }}
                    </td>

                    <td class="p-4">

                        @if($item->status == 'pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                Pending
                            </span>

                        @elseif($item->status == 'approved')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                Approved
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                Rejected
                            </span>

                        @endif

                    </td>

                <td class="p-4 text-center">

                    @if($item->status == 'pending')

                        <form
                            action="{{ route('pengajuan.approve', $item->id) }}"
                            method="POST"
                            class="inline">

                            @csrf

                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">

                                Setujui

                            </button>

                        </form>

                        <form
                            action="{{ route('pengajuan.tolak', $item->id) }}"
                            method="POST"
                            class="inline">

                            @csrf

                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                Tolak

                            </button>

                        </form>

                    @else

                    <span class="text-gray-400 italic">
                        Selesai
                    </span>

                    @endif

                </td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection