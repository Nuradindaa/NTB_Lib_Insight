@php
$nilaiAkreditasi = ['A', 'B', 'C'];
@endphp

@extends('perpus.layout')

@section('content')
<div class="p-8 max-w-3xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Update Akreditasi</h1>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6 mb-8">
        <h2 class="text-lg font-semibold mb-4">Akreditasi Saat Ini</h2>

        @if ($akreditasi)
        <table class="w-full text-sm">
            <tr>
                <td class="py-2 text-gray-600 w-40">Nilai</td>
                <td class="py-2 font-semibold">{{ $akreditasi->nilai_akreditasi }}</td>
            </tr>
            <tr>
                <td class="py-2 text-gray-600">Tahun Terbit</td>
                <td class="py-2">{{ $akreditasi->tahun_terbit }}</td>
            </tr>
            <tr>
                <td class="py-2 text-gray-600">Tahun Berakhir</td>
                <td class="py-2">{{ $akreditasi->tahun_berakhir }}</td>
            </tr>
            <tr>
                <td class="py-2 text-gray-600">Status</td>
                <td class="py-2">
                    <span class="px-2 py-1 rounded text-xs
                        {{ $akreditasi->status == 'Berlaku' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $akreditasi->status }}
                    </span>
                </td>
            </tr>
        </table>
        @else
        <p class="text-gray-500">Belum ada data akreditasi.</p>
        @endif
    </div>

    <div class="bg-white rounded-xl shadow p-6 mb-8">
        <h2 class="text-lg font-semibold mb-4">Ajukan Update Akreditasi</h2>

        <form method="POST" action="/perpus/update-akreditasi" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Akreditasi Baru</label>
                <select name="akreditasi_baru" required
                    class="w-full border rounded-lg px-3 py-2 @error('akreditasi_baru') border-red-500 @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($nilaiAkreditasi as $nilai)
                    <option value="{{ $nilai }}" {{ old('akreditasi_baru') == $nilai ? 'selected' : '' }}>{{ $nilai }}</option>
                    @endforeach
                </select>
                @error('akreditasi_baru')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" min="2000" max="2099" value="{{ old('tahun_terbit') }}"
                        class="w-full border rounded-lg px-3 py-2 @error('tahun_terbit') border-red-500 @enderror">
                    @error('tahun_terbit')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Berakhir</label>
                    <input type="number" name="tahun_berakhir" min="2000" max="2099" value="{{ old('tahun_berakhir') }}"
                        class="w-full border rounded-lg px-3 py-2 @error('tahun_berakhir') border-red-500 @enderror">
                    @error('tahun_berakhir')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Dokumen Bukti (PDF/JPG/PNG, maks 2MB)</label>
                <input type="file" name="dokumen_bukti" accept=".pdf,.jpg,.jpeg,.png"
                    class="w-full border rounded-lg px-3 py-2 @error('dokumen_bukti') border-red-500 @enderror">
                @error('dokumen_bukti')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                <textarea name="keterangan" rows="3"
                    class="w-full border rounded-lg px-3 py-2">{{ old('keterangan') }}</textarea>
            </div>

            <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-2 rounded-lg">
                Ajukan Update
            </button>
        </form>
    </div>

    @if ($riwayatPengajuan->isNotEmpty())
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Riwayat Pengajuan</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="py-2">Akreditasi Baru</th>
                    <th class="py-2">Tahun</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayatPengajuan as $p)
                <tr class="border-b">
                    <td class="py-2">{{ $p->akreditasi_baru }}</td>
                    <td class="py-2">{{ $p->tahun_terbit }} - {{ $p->tahun_berakhir }}</td>
                    <td class="py-2">
                        <span class="px-2 py-1 rounded text-xs
                            {{ $p->status == 'approved' ? 'bg-green-100 text-green-700' : ($p->status == 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td class="py-2">{{ $p->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

</div>
@endsection
