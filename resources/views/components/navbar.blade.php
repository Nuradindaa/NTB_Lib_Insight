<header class="bg-white/95 backdrop-blur-lg shadow-sm sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-xl bg-cyan-800 flex items-center justify-center">
                    📚
                </div>

                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        NTB Lib-Insights
                    </h1>

                    <p class="text-sm text-gray-500">
                        Dashboard Statistik & Akreditasi
                    </p>
                </div>

            </div>

            <div class="flex items-center gap-3">

                @auth

                    <span
                        class="hidden md:flex items-center gap-2 px-3 py-1.5 bg-emerald-100 text-emerald-700 rounded-full text-sm font-medium">

                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>

                        {{ Auth::user()->name }}

                    </span>

                    <form action="/logout" method="POST">
                        @csrf

                        <button
                            type="submit"
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-xl">
                            Keluar
                        </button>
                    </form>

                @endauth

                @guest

                    <a
                        href="/login"
                        class="px-4 py-2 bg-cyan-700 text-white rounded-xl hover:bg-cyan-800">
                        Masuk Admin
                    </a>

                @endguest

            </div>

        </div>
    </div>
</header>