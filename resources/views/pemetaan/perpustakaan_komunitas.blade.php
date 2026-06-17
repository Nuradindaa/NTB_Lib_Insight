@extends('layouts.app')

@section('content')

<div class="bg-white rounded-2xl shadow p-6 mb-6">

    <h1 class="text-3xl font-bold text-gray-800">
        📚 Data Perpustakaan Komunitas
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-6">

    </div>

    <div class="flex justify-between items-center mb-6">

        <a href="{{ url('/dashboard-pemetaan') }}"
        class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

            Kembali ke Dashboard

        </a>

        <form method="GET"
            action="{{ url('/perpustakaan-komunitas') }}"
            class="flex gap-2 w-1/2">

             <input
            type="text"
            name="search"
            value="{{ $keyword ?? '' }}"
            placeholder="Cari nama perpustakaan..."
            class="flex-1 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 rounded-lg">

                Cari

            </button>

            <a href="{{ url('/perpustakaan-komunitas') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                Reset

            </a>

        </form>

    </div>

    <table class="w-full">

        <thead class="bg-slate-800 text-white">

            <tr>
                <th class="px-6 py-4 text-left">
                    No
                </th>

                <th class="px-6 py-4 text-left">
                    Nama Perpustakaan
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($data as $index => $item)

            <tr class="border-b hover:bg-blue-50 cursor-pointer transition duration-200">

                <td class="px-6 py-3">
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                        {{ $index + 1 }}
                    </span>
                </td>

                <td class="px-6 py-3">
                    {{ $item->nama_perpustakaan }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection