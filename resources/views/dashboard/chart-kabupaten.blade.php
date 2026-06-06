<div class="bg-white rounded-3xl shadow-lg p-6">

    <h3 class="text-2xl font-bold mb-6">
        📍 Akreditasi Per Kabupaten
    </h3>

    <div class="h-[550px]">
        <canvas id="chartKabupaten"></canvas>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('chartKabupaten');

    new Chart(ctx, {
        type: 'bar',

        data: {
            labels: [
                @foreach($chartKabupaten as $item)
                    "{{ $item->nama_kabupaten }}",
                @endforeach
            ],

            datasets: [{
                label: 'Jumlah Akreditasi',

                data: [
                    @foreach($chartKabupaten as $item)
                        {{ $item->total }},
                    @endforeach
                ],

                backgroundColor: '#0e7490',
                borderRadius: 8
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

});
</script>