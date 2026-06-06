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
            data: [
                {{ $akreditasiA }},
                {{ $akreditasiB }},
                {{ $akreditasiC }}
            ]
        }]
    }
});
</script>