<div class="section-card mt-6">

    <div class="section-header">
        📚 Data Akreditasi Perpustakaan
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>
                    <th class="p-4 text-left">Nama Perpustakaan</th>
                    <th class="p-4 text-left">Akreditasi</th>
                    <th class="p-4 text-left">Terbit</th>
                    <th class="p-4 text-left">Berakhir</th>
                    <th class="p-4 text-left">Status</th>
                </tr>

            </thead>

            <tbody>

                @foreach($data as $item)

                <tr class="border-t">

                    <td class="p-4 text-white">
                        {{ $item->nama_perpustakaan }}
                    </td>

                    <td class="p-4 font-semibold text-white">
                        {{ $item->nilai_akreditasi }}
                    </td>

                    <td class="p-4 text-white">
                        {{ $item->tahun_terbit }}
                    </td>

                    <td class="p-4 text-white">
                        {{ $item->tahun_berakhir }}
                    </td>

                    <td class="p-4">

                        @if($item->status == 'exp')
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                Expired
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                                Berlaku
                            </span>
                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>