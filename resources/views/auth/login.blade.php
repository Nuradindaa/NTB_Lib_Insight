@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-md">

        <h1 class="text-3xl font-bold mb-2">
            Login Admin
        </h1>

        <p class="text-gray-500 mb-6">
            NTB Lib Insights
        </p>

        <form method="POST" action="/login">
            @csrf

            <div class="mb-4">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-lg p-3">
            </div>

            <div class="mb-6">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg p-3">
            </div>

            <button
                type="submit"
                class="w-full bg-cyan-700 text-white p-3 rounded-lg">

                Masuk Admin

            </button>
            <div class="mt-4 text-center">

                <a
                    href="/"
                    class="text-cyan-700 font-medium hover:underline">

                    ← Kembali ke Dashboard Publik

                </a>

            </div>

        </form>

    </div>

</div>

@endsection