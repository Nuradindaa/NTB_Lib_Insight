<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>Admin Perpustakaan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        body{
            font-family:'Plus Jakarta Sans',sans-serif;
        }

    </style>

</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    @include('perpus.sidebar')

    <main class="flex-1 ml-64 p-10 overflow-x-auto">

        <div class="bg-gradient-to-r from-cyan-600 to-cyan-800 rounded-xl shadow-lg p-8 mb-8 text-white">
            <p class="text-cyan-100 text-sm uppercase tracking-wide">Admin Perpustakaan</p>
            <h1 class="text-3xl font-bold mt-1">{{ $perpustakaan?->nama_perpustakaan ?? 'Perpustakaan' }}</h1>
            @auth
            <p class="text-cyan-200 mt-2">Selamat Datang, {{ Auth::user()->name }}</p>
            @endauth
        </div>

        @yield('content')

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))

<script>

Swal.fire({

    icon:'success',
    title:'Berhasil!',
    text:'{{ session("success") }}',
    confirmButtonColor:'#2563eb',
    timer:2500,
    showConfirmButton:false

});

</script>

@endif

</body>
</html>