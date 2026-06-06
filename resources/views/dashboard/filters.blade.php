<div class="bg-white rounded-3xl shadow-lg p-6">

    <form method="GET">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            {{-- Kabupaten --}}
            <select
                name="kabupaten"
                onchange="this.form.submit()"
                class="w-full px-4 py-3 border rounded-xl">

                <option value="">
                    Semua Kabupaten
                </option>

                @foreach($kabupaten as $item)
                    <option
                        value="{{ $item->id_kabupaten }}"
                        {{ request('kabupaten') == $item->id_kabupaten ? 'selected' : '' }}>

                        {{ $item->nama_kabupaten }}

                    </option>
                @endforeach

            </select>

            {{-- Jenis --}}
            <select
                name="jenis"
                onchange="this.form.submit()"
                class="w-full px-4 py-3 border rounded-xl">

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

            {{-- Akreditasi --}}
            <select
                name="akreditasi"
                onchange="this.form.submit()"
                class="w-full px-4 py-3 border rounded-xl">

                <option value="">
                    Semua Akreditasi
                </option>

                <option value="A"
                    {{ request('akreditasi') == 'A' ? 'selected' : '' }}>
                    Akreditasi A
                </option>

                <option value="B"
                    {{ request('akreditasi') == 'B' ? 'selected' : '' }}>
                    Akreditasi B
                </option>

                <option value="C"
                    {{ request('akreditasi') == 'C' ? 'selected' : '' }}>
                    Akreditasi C
                </option>

            </select>

        </div>

    </form>

</div>