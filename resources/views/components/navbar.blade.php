<header class="bg-white shadow-sm sticky top-0 z-[9999]">
    <div class="max-w-7xl mx-auto px-6 py-4">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-12 h-12 bg-cyan-800 rounded-xl flex items-center justify-center text-white">
                    📚
                </div>

                <div>
                    <h1 class="font-bold text-xl text-slate-800">
                        NTB Lib-Insights
                    </h1>

                    <p class="text-sm text-gray-500">
                        Dashboard Statistik & Akreditasi
                    </p>
                </div>

            </div>

            <nav class="hidden md:flex gap-8 text-sm font-medium">

                <a href="/">
                    Home
                </a>

                <a href="/dashboard-akreditasi">
                    Accreditation
                </a>

                <a href="/dashboard-pemetaan">
                    Mapping
                </a>

                <a href="#tentang">
                    About
                </a>

            </nav>

            <div>

                @auth

                    <form action="/logout" method="POST">
                        @csrf

                        <button
                            class="px-5 py-2 rounded-xl bg-red-500 text-white">
                            Keluar
                        </button>
                    </form>

                @endauth

                @guest

                    <a
                        href="/login"
                        class="px-5 py-2 rounded-xl bg-cyan-700 text-white">
                        Login Admin
                    </a>

                @endguest

            </div>

        </div>

    </div>
</header>