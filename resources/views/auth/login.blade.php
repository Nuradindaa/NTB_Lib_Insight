@extends('layouts.app')

@section('content')
<div class="min-h-screen grid md:grid-cols-2">

    {{-- KIRI --}}
    <div
        class="relative hidden md:flex items-center justify-center bg-cover bg-center"
        style="background-image:url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da');">

        <div class="absolute inset-0 bg-cyan-900/70"></div>

        <div class="relative z-10 text-white px-12 max-w-lg">

            <h1 class="text-6xl font-bold leading-tight mb-6">
                Transformasi <br>
                Perpustakaan <br>
                Berbasis Data
            </h1>

            <p class="text-lg text-gray-100">
                Solusi manajemen informasi terpadu untuk pelayanan publik
                yang lebih cerdas dan akuntabel.
            </p>

        </div>
    </div>

    {{-- KANAN --}}
    <div class="flex items-center justify-center bg-gray-50">

        <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-md">

            <div class="text-center mb-8">

                <h2 class="text-4xl font-bold text-cyan-900">
                    NTB Lib-Insights
                </h2>

                <p class="mt-2 text-xl font-semibold">
                    Login Admin
                </p>

                <p class="text-gray-500 text-sm mt-2">
                    Silakan masuk untuk mengelola data perpustakaan.
                </p>

            </div>

            <form method="POST" action="/login">
                @csrf

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium">
                        Email atau Username
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-cyan-500"
                        placeholder="contoh@admin.go.id">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-cyan-500"
                        placeholder="********">
                </div>

                <button
                    type="submit"
                    class="w-full bg-cyan-800 hover:bg-cyan-900 text-white py-3 rounded-xl font-semibold">

                    Masuk

                </button>

                <div class="mt-6 text-center">

                    <a
                        href="/"
                        class="text-cyan-700 hover:underline">

                        ← Kembali ke Beranda

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection