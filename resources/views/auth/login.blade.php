<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NTB Lib Insights</title>

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-[#0F5672] flex items-center justify-center p-4">

    <div class="bg-white rounded-[32px] shadow-2xl w-full max-w-md p-14">

        <div class="text-center">

            <div class="w-24 h-24 mx-auto bg-[#0F5672] rounded-3xl flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-12 h-12 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5A4.5 4.5 0 003 9.5V19c1.5-1 3-1.5 4.5-1.5S10.5 18 12 19m0-12.747C13.168 5.477 14.754 5 16.5 5A4.5 4.5 0 0121 9.5V19c-1.5-1-3-1.5-4.5-1.5S13.5 18 12 19" />

                </svg>

            </div>

            <h1 class="mt-6 text-3xl font-bold text-slate-800">
                NTB Lib-Insights
            </h1>

            <p class="text-gray-500 mt-2">
                Dashboard Statistik & Akreditasi Perpustakaan
            </p>

        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-xl mt-6">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST" class="mt-8">

            @csrf

            <div class="mb-5">

                <label class="block mb-2 font-medium text-gray-700">
                    Username
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan username"
                    class="w-full border border-gray-300 rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-cyan-600">

            </div>

            <div class="mb-7">

                <label class="block mb-2 font-medium text-gray-700">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    class="w-full border border-gray-300 rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-cyan-600">

            </div>

            <button
                type="submit"
                class="w-full bg-cyan-600 hover:bg-cyan-700 text-white py-4 rounded-xl font-semibold transition">
                Masuk sebagai Admin
            </button>

        </form>

        <a href="/"
            class="block text-center mt-4 bg-gray-100 hover:bg-gray-200 py-4 rounded-xl text-gray-700 font-medium transition">
            Lihat sebagai Tamu
        </a>

        <hr class="my-8">

        <div class="text-center text-gray-400 text-sm">
            Demo: admin@gmail.com / admin123
        </div>

    </div>

</body>
</html>