@extends('layouts.app')

@section('content')

@include('components.navbar')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-4xl font-bold text-white">
        Dashboard Pemetaan Persebaran Perpustakaan NTB
    </h1>

    <div class="grid grid-cols-5 gap-4 mt-6">

        <div class="bg-blue-500 text-white p-4 rounded-xl shadow">
            <p>Total Perpustakaan</p>
            <h2 class="text-3xl font-bold">
                {{ number_format($totalPerpustakaan) }}
            </h2>
        </div>

        <a href="{{ route('perpustakaan.sekolah') }}"
            class="bg-green-500 text-white p-4 rounded-xl shadow block">

            <p>Sekolah</p>

            <h2 class="text-3xl font-bold">
                {{ number_format($totalSekolah) }}
            </h2>

        </a>

        <div class="bg-yellow-500 text-white p-4 rounded-xl shadow">
            <p>Desa</p>
            <h2 class="text-3xl font-bold">
                {{ number_format($totalDesa) }}
            </h2>
        </div>

        <div class="bg-purple-500 text-white p-4 rounded-xl shadow">
            <p>Khusus</p>
            <h2 class="text-3xl font-bold">
                {{ number_format($totalKhusus) }}
            </h2>
        </div>

        <div class="bg-pink-500 text-white p-4 rounded-xl shadow">
            <p>Komunitas</p>
            <h2 class="text-3xl font-bold">
                {{ number_format($totalKomunitas) }}
            </h2>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 mt-6">

        <div class="bg-white rounded-2xl shadow p-6 mt-6">
            <div id="map" class="h-[700px]"></div>
        </div>

    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>

    const koordinatData = @json($koordinat);

    const sekolahData = @json($sekolah);
    const desaData = @json($desa);
    const khususData = @json($khusus);
    const komunitasData = @json($komunitas);

    var map = L.map('map').setView([-8.6, 117.5], 9);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{
        attribution:'© OpenStreetMap'
    }).addTo(map);

    fetch('/geojson/ntb_kabupaten.geojson')
    .then(response => response.json())
    .then(data => {

        console.log(data.features[0].properties);

        const geojsonLayer = L.geoJSON(data,{
            style:{
                color:'red',
                weight:2,
                fillOpacity:0.2
            }
        }).addTo(map);

        map.fitBounds(geojsonLayer.getBounds());

    });

    koordinatData.forEach(item => {

        let sekolah = sekolahData[item.id] || 0;
        let desa = desaData[item.id] || 0;
        let khusus = khususData[item.id] || 0;
        let komunitas = komunitasData[item.id] || 0;

        let total =
            sekolah +
            desa +
            khusus +
            komunitas;

        L.marker([item.lat, item.lng])
            .addTo(map)
            .bindPopup(`
                <div style="min-width:220px">
                    <h4><b>${item.nama}</b></h4>

                    <hr>

                    📚 Sekolah : ${sekolah}<br>
                    🏠 Desa : ${desa}<br>
                    🏢 Khusus : ${khusus}<br>
                    👥 Komunitas : ${komunitas}<br>

                    <hr>

                    <b>Total : ${total}</b>
                </div>
            `);

    });

    </script>

@endsection