<div class="w-64 h-screen fixed bg-cyan-950 text-white flex flex-col shadow-xl">

    <div class="p-6 border-b border-cyan-900">

        <h2 class="text-2xl font-bold">
            NTB Lib Insights
        </h2>

        <p class="text-cyan-200 text-sm">
            Admin Master
        </p>

    </div>
    <nav class="flex-1 p-4 space-y-2">

        <a href="/admin"
        class="block px-4 py-3 rounded-xl
        {{ request()->is('admin') ? 'bg-cyan-900 text-white' : 'hover:bg-cyan-900' }}">

            Dashboard

        </a>

        <a href="/admin/pengajuan-akun"
        class="block px-4 py-3 rounded-xl
        {{ request()->is('admin/pengajuan-akun') ? 'bg-cyan-900 text-white' : 'hover:bg-cyan-900' }}">

            Pengajuan Akun

        </a>

        <a href="/admin/perpustakaan"
        class="block px-4 py-3 rounded-xl
        {{ request()->is('admin/perpustakaan*') ? 'bg-cyan-900 text-white' : 'hover:bg-cyan-900' }}">

            Data Perpustakaan

        </a>

        <a href="{{ route('admin.user-perpustakaan') }}"
        class="block px-4 py-3 rounded-xl
        {{ request()->is('admin/user-perpustakaan*') ? 'bg-cyan-900 text-white' : 'hover:bg-cyan-900' }}">

            User Perpustakaan

        </a>

    </nav>
    <div class="p-4 border-t border-cyan-900">

        <form method="POST" action="/logout">
            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 py-3 rounded-xl">

                Logout

            </button>

        </form>

    </div>

</div>