<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

    <div class="px-6 py-5 border-b flex justify-between items-center">

        <div>
            <h3 class="text-xl font-semibold text-slate-800">
                Daftar Status Akreditasi
            </h3>

            <p class="text-sm text-gray-500">
                Total {{ count($data) }} data akreditasi perpustakaan
            </p>
        </div>

        <div class="text-sm text-gray-400">
            NTB Lib-Insights
        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                        Nama Perpustakaan
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                        Akreditasi
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                        Tahun Terbit
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                        Tahun Berakhir
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($data as $item)

                <tr class="border-t hover:bg-slate-50 transition">

                    <td class="px-6 py-4 text-gray-700">
                        {{ $item->nama_perpustakaan }}
                    </td>

                    <td class="px-6 py-4">

                        @if($item->nilai_akreditasi == 'A')
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">
                                A
                            </span>

                        @elseif($item->nilai_akreditasi == 'B')
                            <span class="px-3 py-1 rounded-full bg-cyan-100 text-cyan-700 text-sm">
                                B
                            </span>

                        @else
                            <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-sm">
                                C
                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4 text-gray-700">
                        {{ $item->tahun_terbit }}
                    </td>

                    <td class="px-6 py-4 text-gray-700">
                        {{ $item->tahun_berakhir }}
                    </td>

                    <td class="px-6 py-4">

                        @if($item->status == 'exp')

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                Expired
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
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