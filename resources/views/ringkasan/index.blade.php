@extends('layouts.app')

@section('content')

@include('components.navbar')
<section class="relative h-[650px] flex items-center justify-center text-center">

   <img
    src="{{ asset('assets/Perpus_NTB.png') }}"
    alt="Perpustakaan NTB"
    class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-cyan-900/70"></div>

    <div class="relative z-10 max-w-4xl px-6 text-white">

        <h1 class="text-6xl font-bold mb-6">
            NTB Lib-Insights
        </h1>

        <p class="text-xl mb-8">
            Sistem Informasi Statistik, Akreditasi dan Pemetaan Perpustakaan
            Provinsi Nusa Tenggara Barat.
        </p>

        <div class="flex justify-center gap-4">

            <a href="/dashboard-akreditasi"
                class="px-8 py-4 rounded-xl bg-cyan-300 text-black font-semibold">

                Lihat Dashboard Akreditasi

            </a>

            <a href="/dashboard-pemetaan"
                class="px-8 py-4 rounded-xl bg-white/20 backdrop-blur text-white font-semibold">

                Lihat Dashboard Pemetaan

            </a>

        </div>

    </div>

</section>
<section class="relative -mt-20 z-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl p-6 shadow-lg">

                <div class="text-4xl mb-4">📚</div>

                <h3 class="text-gray-500">
                    Total Perpustakaan
                </h3>

                <p class="text-4xl font-bold text-cyan-800 mt-2">
                    {{ number_format($totalPerpustakaan) }}
                </p>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg">

                <div class="text-4xl mb-4">🏅</div>

                <h3 class="text-gray-500">
                    Terakreditasi
                </h3>

                <p class="text-4xl font-bold text-emerald-600 mt-2">
                    {{ $totalAkreditasi }}
                </p>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg">

                <div class="text-4xl mb-4">📍</div>

                <h3 class="text-gray-500">
                    Kabupaten / Kota
                </h3>

                <p class="text-4xl font-bold text-cyan-800 mt-2">
                    {{ $jumlahKabupaten }}
                </p>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg">

                <div class="text-4xl mb-4">📊</div>

                <h3 class="text-gray-500">
                    Persentase Akreditasi
                </h3>

                <p class="text-4xl font-bold text-cyan-800 mt-2">
                    {{ round(($totalAkreditasi / $totalPerpustakaan) * 100, 1) }}%
                </p>

            </div>

        </div>

    </div>

</section>
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h2 class="text-4xl font-bold text-black">
                Layanan Utama
            </h2>

            <p class="text-black-200 mt-2">
                Akses data dan layanan pengelolaan perpustakaan secara real-time.
            </p>
        </div>

    </div>

    <div class="grid lg:grid-cols-3 gap-6">

        {{-- Dashboard Akreditasi --}}
        <div class="lg:col-span-2 bg-cyan-900 rounded-3xl p-8 text-white shadow-xl">

            <span class="bg-cyan-700 px-3 py-1 rounded-full text-sm">
                Statistik
            </span>

            <h3 class="text-3xl font-bold mt-5">
                Dashboard Akreditasi
            </h3>

            <p class="mt-4 text-cyan-100 max-w-xl">
                Pantau status akreditasi perpustakaan di seluruh wilayah NTB
                dengan visualisasi data yang akurat dan transparan.
            </p>

            <a href="/dashboard-akreditasi"
               class="inline-block mt-8 bg-white text-cyan-900 px-6 py-3 rounded-xl font-semibold">
                Buka Dashboard
            </a>

        </div>

        {{-- Dashboard Pemetaan --}}
        <div class="bg-cyan-100 rounded-3xl p-8 shadow-xl">

            <span class="bg-cyan-200 px-3 py-1 rounded-full text-sm">
                Geospasial
            </span>

            <h3 class="text-2xl font-bold mt-5 text-cyan-900">
                Pemetaan Wilayah
            </h3>

            <p class="mt-4 text-gray-700">
                Distribusi lokasi perpustakaan berbasis peta digital
                untuk perencanaan strategis pengembangan literasi.
            </p>

            <a href="/dashboard-pemetaan"
               class="inline-block mt-8 bg-cyan-900 text-white px-6 py-3 rounded-xl">
                Eksplorasi Peta
            </a>

        </div>

    </div>
    <div class="grid md:grid-cols-3 gap-6 mt-8">

    <!-- Pengajuan Akun -->
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="w-14 h-14 bg-cyan-100 rounded-xl flex items-center justify-center mb-6">
            👤
        </div>

        <h3 class="text-3xl font-bold mb-4 text-slate-800">
            Pengajuan Akun
        </h3>

        <p class="text-gray-600 leading-relaxed">
            Layanan mandiri bagi pengelola perpustakaan untuk
            mendapatkan akses input data ke dalam sistem
            NTB Lib-Insights.
        </p>

        <a href="/pengajuan-akun"
           class="inline-block mt-8 text-cyan-700 font-semibold hover:text-cyan-900">
            Mulai Pengajuan →
        </a>

    </div>

    <!-- Transformasi Perpustakaan -->
    <div class="md:col-span-2 bg-white rounded-3xl shadow-lg p-8">

        <div class="grid md:grid-cols-2 gap-8 items-center">

            <div>

                <h3 class="text-3xl font-bold mb-4 text-slate-800">
                    Transformasi Perpustakaan Digital
                </h3>

                <p class="text-gray-600 leading-relaxed mb-6">
                    NTB Lib-Insights membantu pemerintah daerah dan
                    pengelola perpustakaan dalam monitoring,
                    pemetaan, dan pengelolaan data perpustakaan
                    secara terintegrasi.
                </p>

                <div class="flex flex-wrap gap-3">

                    <span class="bg-cyan-50 text-cyan-800 px-4 py-2 rounded-xl">
                        ✓ Data Terpusat
                    </span>

                    <span class="bg-cyan-50 text-cyan-800 px-4 py-2 rounded-xl">
                        ✓ Monitoring Real-time
                    </span>

                </div>

            </div>

            <div class="flex justify-center">

                <img
                    src="{{ asset('assets/layanan.png') }}"
                    alt="Perpustakaan"
                    class="rounded-2xl h-56 w-full object-cover"
                >

            </div>

        </div>

    </div>

</div>

</section>

<section class="bg-gradient-to-r from-slate-950 to-cyan-950 mt-20">

    <div class="max-w-7xl mx-auto px-8 py-20">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Kiri -->
            <div>

                <span class="text-cyan-300 uppercase tracking-widest text-sm font-semibold">
                    Tentang Kami
                </span>

                <h2 class="text-5xl font-bold text-white mt-4 leading-tight">
                    Membangun Ekosistem
                    Literasi Berbasis Data
                </h2>

                <p class="text-slate-300 mt-8 leading-relaxed text-lg">
                    NTB Lib-Insights merupakan platform informasi yang
                    dikembangkan untuk mendukung pengelolaan,
                    akreditasi, dan pemetaan perpustakaan di
                    Provinsi Nusa Tenggara Barat.
                </p>

                <p class="text-slate-400 mt-6 leading-relaxed">
                    Sistem ini mengintegrasikan data perpustakaan
                    Sekolah, Desa, Komunitas, dan Khusus dalam satu
                    dashboard terpadu sehingga memudahkan monitoring,
                    evaluasi, dan pengambilan keputusan berbasis data.
                </p>

                <div class="grid grid-cols-2 gap-8 mt-10">

                    <div>
                        <h3 class="text-5xl font-bold text-cyan-300">
                            24/7
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Akses Sistem
                        </p>
                    </div>

                    <div>
                        <h3 class="text-5xl font-bold text-cyan-300">
                            Real-time
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Sinkronisasi Data
                        </p>
                    </div>

                </div>

            </div>

            <!-- Kanan -->
            <div>

                <img
                    src="{{ asset('assets/tamu.png') }}"
                    alt="Dashboard"
                    class="rounded-3xl shadow-2xl w-full h-[500px] object-cover"
                >

            </div>

        </div>

    </div>

</section>

<section class="bg-white py-20">

    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center mb-12">

            <h2 class="text-5xl font-bold text-slate-800">
                Sebaran Jenis Perpustakaan
            </h2>

            <p class="text-gray-500 mt-4">
                Visualisasi komposisi perpustakaan di Provinsi NTB berdasarkan kategori pengelola.
            </p>

        </div>

        <div class="grid lg:grid-cols-2 gap-8">

            <!-- Donut -->
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h3 class="text-2xl font-bold mb-6">
                    Komposisi per Kategori
                </h3>

                <canvas id="kategoriChart"></canvas>

            </div>

            <!-- Bar -->
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h3 class="text-2xl font-bold mb-6">
                    Sebaran Perpustakaan
                </h3>

                <canvas id="barChart"></canvas>

            </div>

        </div>

    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
document.getElementById('kategoriChart'),
{
    type: 'doughnut',

    data: {

        labels: [
            'Sekolah',
            'Desa',
            'Komunitas',
            'Khusus'
        ],

        datasets: [{
            data: [
                {{ $totalSekolah }},
                {{ $totalDesa }},
                {{ $totalKomunitas }},
                {{ $totalKhusus }}
            ]
        }]
    }
});

new Chart(
document.getElementById('barChart'),
{
    type: 'bar',

    data: {

        labels: [
            'Sekolah',
            'Desa',
            'Komunitas',
            'Khusus'
        ],

        datasets: [{
            label: 'Jumlah',
            data: [
                {{ $totalSekolah }},
                {{ $totalDesa }},
                {{ $totalKomunitas }},
                {{ $totalKhusus }}
            ]
        }]
    }
});

</script>
<footer class="bg-slate-950 text-white mt-20">

    <div class="max-w-7xl mx-auto px-8 py-12">

        <div class="grid md:grid-cols-4 gap-8">

            <div>

                <h3 class="text-2xl font-bold">
                    NTB Lib-Insights
                </h3>

                <p class="mt-4 text-slate-400">
                    Sistem Informasi Statistik,
                    Akreditasi dan Pemetaan
                    Perpustakaan Provinsi NTB.
                </p>

            </div>

            <div>
                <h4 class="font-bold mb-4">Navigasi</h4>

                <ul class="space-y-2 text-slate-400">
                    <li>Beranda</li>
                    <li>Akreditasi</li>
                    <li>Pemetaan</li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">Layanan</h4>

                <ul class="space-y-2 text-slate-400">
                    <li>Dashboard Akreditasi</li>
                    <li>Dashboard Pemetaan</li>
                    <li>Pengajuan Akun</li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">Kontak</h4>

                <p class="text-slate-400">
                    Dinas Perpustakaan dan Kearsipan NTB
                </p>
            </div>
        </div>

        <div class="border-t border-slate-800 mt-10 pt-6 text-center text-slate-500">

            © {{ date('Y') }} NTB Lib-Insights

        </div>

    </div>

</footer>

@endsection