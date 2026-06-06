@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-6">

    <div class="bg-white rounded-3xl p-6 shadow-lg">

        <h2 class="text-3xl font-bold mb-6 text-red-600">
            🚨 Daftar Perpustakaan Expired
        </h2>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-4 text-left">Nama Perpustakaan</th>
                    <th class="p-4 text-left">Akreditasi</th>
                    <th class="p-4 text-left">Terbit</th>
                    <th class="p-4 text-left">Berakhir</th>
                </tr>

            </thead>

            <tbody>

                @foreach($data as $item)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $item->nama_perpustakaan }}
                    </td>

                    <td class="p-4">
                        {{ $item->nilai_akreditasi }}
                    </td>

                    <td class="p-4">
                        {{ $item->tahun_terbit }}
                    </td>

                    <td class="p-4 text-red-600 font-bold">
                        {{ $item->tahun_berakhir }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection