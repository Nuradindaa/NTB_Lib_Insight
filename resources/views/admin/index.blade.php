@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Kelola Data Perpustakaan
        </h1>

        <a href="/admin/perpustakaan/create"
           class="bg-green-600 text-white px-4 py-2 rounded-xl">

            + Tambah Data

        </a>

    </div>

    <div class="bg-white rounded-2xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Kabupaten</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @foreach($data as $item)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $item->nama_perpustakaan }}
                    </td>

                    <td class="p-4">
                        {{ $item->kabupaten ?? '-' }}
                    </td>

                    <td class="p-4">

                        <a href="#"
                           class="text-blue-600">
                            Edit
                        </a>

                        |

                        <a href="#"
                           class="text-red-600">
                            Hapus
                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection