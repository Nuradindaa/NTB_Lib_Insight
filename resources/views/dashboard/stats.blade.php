{{-- BARIS 1 --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Total Perpustakaan --}}
    <div class="bg-white rounded-3xl p-6 shadow-lg">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">
                    Total Perpustakaan
                </p>

                <h2 class="text-5xl font-bold mt-2">
                    {{ number_format($total) }}
                </h2>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-cyan-100 flex items-center justify-center text-2xl">
                🏢
            </div>
        </div>
    </div>

    {{-- Terakreditasi --}}
    <div class="bg-white rounded-3xl p-6 shadow-lg">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">
                    Terakreditasi
                </p>

                <h2 class="text-5xl font-bold text-green-600 mt-2">
                    {{ number_format($totalAkreditasi) }}
                </h2>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">
                ✔
            </div>
        </div>
    </div>

</div>

{{-- BARIS 2 --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

    {{-- Akreditasi A --}}
    <div class="bg-white rounded-3xl p-6 shadow-lg">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">
                    Akreditasi A
                </p>

                <h2 class="text-5xl font-bold text-blue-600 mt-2">
                    {{ $akreditasiA }}
                </h2>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                📄
            </div>
        </div>
    </div>

    {{-- Akreditasi B --}}
    <div class="bg-white rounded-3xl p-6 shadow-lg">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">
                    Akreditasi B
                </p>

                <h2 class="text-5xl font-bold text-green-600 mt-2">
                    {{ $akreditasiB }}
                </h2>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">
                🏅
            </div>
        </div>
    </div>

    {{-- Akreditasi C --}}
    <div class="bg-white rounded-3xl p-6 shadow-lg">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">
                    Akreditasi C
                </p>

                <h2 class="text-5xl font-bold text-orange-500 mt-2">
                    {{ $akreditasiC }}
                </h2>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-2xl">
                📚
            </div>
        </div>
    </div>
    

</div>