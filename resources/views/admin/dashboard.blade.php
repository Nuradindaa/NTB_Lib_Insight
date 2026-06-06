@extends('layouts.app')

@section('content')

<div class="grid md:grid-cols-3 gap-6">

    <a href="/admin/pengajuan-akun"
       class="bg-green-600 text-white p-6 rounded-xl shadow">
        Kelola Pengajuan Akun
    </a>

    <a href="/admin/perpustakaan"
       class="bg-emerald-600 text-white p-6 rounded-xl shadow">
        Kelola Data Perpustakaan
    </a>

    <a href="/"
       class="bg-blue-600 text-white p-6 rounded-xl shadow">
        Dashboard Statistik
    </a>

    <a href="/dashboard-pemetaan"
       class="bg-purple-600 text-white p-6 rounded-xl shadow">
        Dashboard Pemetaan
    </a>

</div>

@endsection