<div class="section-card mt-6">

    <div class="section-header">
        📚 Data Akreditasi Perpustakaan
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50">

            <tr>

                <th class="p-4 text-left">
                    Nama Perpustakaan
                </th>

                <th class="p-4 text-left">
                    Nilai Akreditasi
                </th>

            </tr>

            </thead>

            <tbody>

            @foreach($data as $item)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $item->nama_perpustakaan }}
                    </td>

                    <td class="p-4">
                        {{ $item->nilai_akreditasi }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>