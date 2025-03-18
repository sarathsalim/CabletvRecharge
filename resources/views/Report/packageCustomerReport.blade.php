@extends('Layouts.AdminMaster')

@section('content')
<div class="container text-center">
    <h2>Package Customer Count (Pie Chart)</h2>
    <p class="mt-4" style="font-size: 16px; color: #333; text-align: justify;">
        The pie chart below displays the distribution of customer subscriptions across various packages. Each slice represents the number of customers who have subscribed to a particular package, with the percentage of total subscriptions clearly visible on the chart. The chart helps to quickly understand the popularity and usage of each package.
    </p>
    <p class="mt-2" style="font-size: 16px; color: #333; text-align: justify;">
        The chart is based on the data from our system, showing the count of recharges (or customer subscriptions) for each package. The color-coded slices make it easier to compare the number of customers in each package. The accompanying custom legend provides a clear mapping between the colors and package names.
    </p>
    <canvas id="packagePieChart" style="width:300px; height:300px; margin: 0 auto;"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = @json($data->map(fn($p) => ['label' => $p->packagename, 'value' => $p->recharges_count]));
        const ctx = document.getElementById('packagePieChart').getContext('2d');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.map(item => item.label),
                datasets: [{
                    data: data.map(item => item.value),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800']
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: true },
                    tooltip: { enabled: false }
                }
            },
            plugins: [{
                id: 'displayLabels',
                afterDatasetDraw(chart) {
                    const { ctx, data } = chart;
                    chart.getDatasetMeta(0).data.forEach((dataPoint, index) => {
                        const { x, y } = dataPoint.tooltipPosition();
                        ctx.fillStyle = '#000';
                        ctx.font = 'bold 12px Arial';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        ctx.fillText(data.datasets[0].data[index], x, y);
                    });
                }
            }]
        });
    </script>
</div>
@endsection
