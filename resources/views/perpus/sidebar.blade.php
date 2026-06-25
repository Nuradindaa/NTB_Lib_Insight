<aside class="fixed left-0 top-0 w-64 h-screen bg-cyan-950 text-white flex flex-col">

    <div class="p-6 border-b border-cyan-900">

        <h1 class="text-2xl font-bold">
            NTB Lib Insights
        </h1>

        <p class="text-cyan-200 text-sm">
            Admin Perpustakaan
        </p>

    </div>

    <nav class="mt-8 flex flex-col gap-2">

        <a href="/perpus"
        class="px-5 py-3 rounded-lg hover:bg-cyan-800">
            Dashboard
        </a>

        <a href="/perpus/profil"
        class="px-5 py-3 rounded-lg hover:bg-cyan-800">
            Profil Perpustakaan
        </a>

        <a href="/perpus/update-akreditasi"
        class="px-5 py-3 rounded-lg hover:bg-cyan-800">
            Update Akreditasi
        </a>

    </nav>

    <div class="p-4">

        <form action="{{ url('/logout') }}" method="POST">

            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 rounded-xl py-3">

                Logout

            </button>

        </form>

    </div>

</aside>