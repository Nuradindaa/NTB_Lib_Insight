
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Akreditasi per Kabupaten --}}
    <div class="bg-white rounded-2xl shadow-sm p-6">

        <h3 class="text-xl font-semibold mb-4">
            Akreditasi per Kabupaten
        </h3>

        <div class="h-80">
            <canvas id="kabupatenChart"></canvas>
        </div>

    </div>

    {{-- Komposisi Akreditasi --}}
    <div class="bg-white rounded-2xl shadow-sm p-6">

        <h3 class="text-xl font-semibold mb-4">
            Komposisi Akreditasi
        </h3>

        <div class="h-80 flex items-center justify-center">
            <canvas id="komposisiChart"></canvas>
        </div>

    </div>

    {{-- Monitoring Status --}}
    <div class="space-y-4">

        <div class="bg-white rounded-2xl shadow-sm p-6">

            <h3 class="text-xl font-semibold mb-6">
                Monitoring Status
            </h3>

            <div class="mb-4">
                <div class="flex justify-between text-sm mb-1">
                    <span>Berlaku</span>
                    <span>{{ $totalAkreditasi }}</span>
                </div>

                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-green-500 h-3 rounded-full w-[80%]"></div>
                </div>
            </div>

            <div class="mb-4">
                <div class="flex justify-between text-sm mb-1">
                    <span>Akreditasi A</span>
                    <span>{{ $akreditasiA }}</span>
                </div>

                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-blue-500 h-3 rounded-full w-[25%]"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>Akreditasi C</span>
                    <span>{{ $akreditasiC }}</span>
                </div>

                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-orange-500 h-3 rounded-full w-[50%]"></div>
                </div>
            </div>

        </div>

        <div class="bg-cyan-50 border-l-4 border-cyan-600 p-4 rounded-xl">
            Mayoritas perpustakaan berada pada kategori C.
        </div>

        <div class="bg-green-50 border-l-4 border-green-600 p-4 rounded-xl">
            Total perpustakaan terakreditasi:
            {{ $totalAkreditasi }}
        </div>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// DONUT CHART
new Chart(
document.getElementById('komposisiChart'),
{
    type:'doughnut',

    data:{
        labels:['A','B','C'],

        datasets:[{
            data:[
                {{ $akreditasiA }},
                {{ $akreditasiB }},
                {{ $akreditasiC }}
            ],

            backgroundColor:[
                '#0f766e',
                '#0891b2',
                '#67e8f9'
            ]
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false
    }
});


// BAR CHART KABUPATEN
new Chart(
document.getElementById('kabupatenChart'),
{
    type:'bar',

    data:{
        labels:[
            @foreach($chartKabupaten as $item)
                "{{ $item->nama_kabupaten }}",
            @endforeach
        ],

        datasets:[{
            label:'Jumlah Akreditasi',

            data:[
                @foreach($chartKabupaten as $item)
                    {{ $item->total }},
                @endforeach
            ],

            backgroundColor:'#0f766e',
            borderRadius:6
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,

        plugins:{
            legend:{
                display:false
            }
        }
    }
});

</script>