@extends('layouts.app')

@section('content')

<div class="bg-white rounded-2xl shadow p-6 mb-6">

    <h1 class="text-3xl font-bold text-gray-800">
        📚 Data Perpustakaan Sekolah
    </h1>

    <p class="text-gray-500 mt-2">
        Total: {{ number_format($data->count()) }} Perpustakaan
    </p>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

    <a href="{{ url('/dashboard-pemetaan') }}"
    class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

        ← Kembali ke Dashboard

    </a>

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

            <tr class="border-b hover:bg-gray-50 transition">

                <td class="px-6 py-3">
                    {{ $index + 1 }}
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