<div class="bg-white rounded-2xl shadow-sm border p-5 mt-6">

    <form method="GET">

        <div class="grid md:grid-cols-5 gap-4">

            {{-- Kabupaten --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Kabupaten/Kota
                </label>

                <select
                    name="kabupaten"
                    class="w-full border border-gray-200 rounded-lg px-4 py-2">

                    <option value="">
                        Semua Kabupaten/Kota
                    </option>

                    @foreach($kabupaten as $item)
                        <option
                            value="{{ $item->id_kabupaten }}"
                            {{ request('kabupaten') == $item->id_kabupaten ? 'selected' : '' }}>

                            {{ $item->nama_kabupaten }}

                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Jenis --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Jenis Perpustakaan
                </label>

                <select
                    name="jenis"
                    class="w-full border border-gray-200 rounded-lg px-4 py-2">

                    <option value="">
                        Semua Jenis
                    </option>

                    @foreach($jenis as $item)
                        <option
                            value="{{ $item->id_jenis }}"
                            {{ request('jenis') == $item->id_jenis ? 'selected' : '' }}>

                            {{ $item->nama_jenis }}

                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Akreditasi --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Nilai Akreditasi
                </label>

                <select
                    name="akreditasi"
                    class="w-full border border-gray-200 rounded-lg px-4 py-2">

                    <option value="">
                        Semua Nilai
                    </option>

                    <option value="A" {{ request('akreditasi')=='A'?'selected':'' }}>
                        Akreditasi A
                    </option>

                    <option value="B" {{ request('akreditasi')=='B'?'selected':'' }}>
                        Akreditasi B
                    </option>

                    <option value="C" {{ request('akreditasi')=='C'?'selected':'' }}>
                        Akreditasi C
                    </option>

                </select>
            </div>

            {{-- Tombol --}}
            <div class="flex items-end">
                <button
                    type="submit"
                    class="w-full bg-cyan-800 hover:bg-cyan-700 text-white rounded-lg py-2.5">

                    Terapkan Filter
                </button>
            </div>

            <div class="flex items-end">
                <a
                    href="{{ url()->current() }}"
                    class="w-full border border-gray-300 text-center rounded-lg py-2.5 hover:bg-gray-50">

                    Reset
                </a>
            </div>

        </div>

    </form>

</div>