<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-gray-500 text-sm">Total</p>
        <h3 class="text-3xl font-bold">
            {{ number_format($total) }}
        </h3>
        <p class="text-xs text-gray-400">Perpustakaan</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-gray-500 text-sm">Terakreditasi</p>
        <h3 class="text-3xl font-bold text-green-600">
            {{ $totalAkreditasi }}
        </h3>
        <p class="text-xs text-gray-400">Institusi</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-gray-500 text-sm">Akreditasi A</p>
        <h3 class="text-3xl font-bold text-blue-600">
            {{ $akreditasiA }}
        </h3>
        <p class="text-xs text-gray-400">Unggul</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-gray-500 text-sm">Akreditasi B</p>
        <h3 class="text-3xl font-bold text-cyan-700">
            {{ $akreditasiB }}
        </h3>
        <p class="text-xs text-gray-400">Baik Sekali</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-gray-500 text-sm">Akreditasi C</p>
        <h3 class="text-3xl font-bold text-orange-500">
            {{ $akreditasiC }}
        </h3>
        <p class="text-xs text-gray-400">Baik</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-gray-500 text-sm">Reakreditasi</p>
        <h3 class="text-3xl font-bold text-red-500">
            {{ $expired }}
        </h3>
        <p class="text-xs text-gray-400">Tahun Depan</p>
    </div>

</div>