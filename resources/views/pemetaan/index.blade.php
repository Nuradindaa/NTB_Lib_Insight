@extends('layouts.app')

@section('content')

@include('components.navbar')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-4xl font-bold">
        Dashboard Pemetaan Persebaran Perpustakaan NTB
    </h1>

    <div class="bg-white rounded-2xl shadow p-6 mt-6">

        <div id="map" style="height:600px;"></div>

    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>

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

    </script>

@endsection