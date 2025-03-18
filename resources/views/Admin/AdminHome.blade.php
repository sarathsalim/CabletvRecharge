@extends('Layouts.AdminMaster')

@section('content')
<div class="container text-center">
    <h2>Welcome to Admin Dashboard</h2>

    <!-- Description of the Pie Chart -->
    <p class="mt-4" style="font-size: 16px; color: #333; text-align: justify;">
        The pie chart below displays the distribution of customer subscriptions across various packages. Each slice represents the number of customers who have subscribed to a particular package, with the percentage of total subscriptions clearly visible on the chart. The chart helps to quickly understand the popularity and usage of each package.
    </p>
    <p class="mt-2" style="font-size: 16px; color: #333; text-align: justify;">
        The chart is based on the data from our system, showing the count of recharges (or customer subscriptions) for each package. The color-coded slices make it easier to compare the number of customers in each package. The accompanying custom legend provides a clear mapping between the colors and package names.
    </p>

    <!-- Pie Chart Container -->
    <canvas id="packagePieChart" style="width:300px; height:300px; margin: 0 auto;"></canvas>

    <!-- Custom Legend -->
    <div id="packageLegend" class="mt-3 d-flex justify-content-center flex-wrap" style="gap: 10px;"></div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = @json($data->map(fn($p) => ['label' => $p->packagename, 'value' => $p->recharges_count]));

        // Chart configuration
        const ctx = document.getElementById('packagePieChart').getContext('2d');
        const backgroundColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800'];

        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.map(item => item.label),
                datasets: [{
                    data: data.map(item => item.value),
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }, // Disable default legend
                    tooltip: { enabled: true }
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

        // Custom legend generation
        const legendContainer = document.getElementById('packageLegend');
        data.forEach((item, index) => {
            const legendItem = document.createElement('div');
            legendItem.style.display = 'flex';
            legendItem.style.alignItems = 'center';
            legendItem.innerHTML = `
                <div style="width: 20px; height: 20px; background-color: ${backgroundColors[index]}; margin-right: 5px;"></div>
                <span>${item.label}</span>
            `;
            legendContainer.appendChild(legendItem);
        });
    </script>
</div>
@endsection
