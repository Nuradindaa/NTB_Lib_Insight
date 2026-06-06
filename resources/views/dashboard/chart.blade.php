<div class="bg-white rounded-3xl shadow-lg p-6">

    <h2 class="text-2xl font-bold mb-6">
        📊 Grafik Akreditasi Perpustakaan
    </h2>

    <canvas id="akreditasiChart"></canvas>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('akreditasiChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Akreditasi A', 'Akreditasi B', 'Akreditasi C'],
        datasets: [{
            label: 'Jumlah Perpustakaan',
            data: [
                {{ $akreditasiA }},
                {{ $akreditasiB }},
                {{ $akreditasiC }}
            ],
                backgroundColor: [
                    '#3b82f6',
                    '#10b981',
                    '#f59e0b'
                ],
                borderRadius: 10
            }]
    }
});
</script>