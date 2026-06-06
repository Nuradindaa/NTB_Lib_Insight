<div class="bg-white p-6 rounded-2xl">

    <h3 class="text-2xl font-bold mb-6">
        ⚠ Monitoring Reakreditasi
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <a
            href="{{ route('reakreditasi.expired') }}"
            class="bg-red-100 rounded-2xl p-6 block hover:bg-red-200 transition"
        >
            <p class="font-semibold text-red-700">
                Sudah Expired
            </p>

            <h2 class="text-5xl font-bold text-red-600 mt-2">
                {{ $expired }}
            </h2>
        </a>

        <a
            href="{{ route('reakreditasi.berlaku') }}"
            class="bg-green-100 rounded-2xl p-6 block hover:bg-green-200 transition"
        >
            <p class="font-semibold text-green-700">
                Masih Berlaku
            </p>

            <h2 class="text-5xl font-bold text-green-600 mt-2">
                {{ $berlaku }}
            </h2>
        </a>

    </div>

</div>