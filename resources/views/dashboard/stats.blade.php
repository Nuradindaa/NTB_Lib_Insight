<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

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

    <div class="bg-white rounded-3xl p-6 shadow-lg">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">
                    Terakreditasi
                </p>

                <h2 class="text-5xl font-bold text-green-600 mt-2">
                    {{ $data->count() }}
                </h2>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">
                ✔
            </div>
        </div>
    </div>

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

    <div class="bg-white rounded-3xl p-6 shadow-lg">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">
                    Akreditasi B + C
                </p>

                <h2 class="text-5xl font-bold text-purple-600 mt-2">
                    {{ $akreditasiB + $akreditasiC }}
                </h2>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl">
                📊
            </div>
        </div>
    </div>

</div>