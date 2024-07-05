<x-main>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .chart-container {
            width: 80%;
            margin: 20px 0;
        }

        canvas {
            max-width: 100%;
        }
    </style>

    <div class="dashboard">
        <h2>Production Graphs</h2>

        <div class="chart-container">
            <h3>Offshore Wind Production</h3>
            <canvas id="offshoreChart"></canvas>
        </div>

        <div class="chart-container">
            <h3>Onshore Wind Production</h3>
            <canvas id="onshoreChart"></canvas>
        </div>

        <div class="chart-container">
            <h3>Photovoltaic Production</h3>
            <canvas id="pvChart"></canvas>
        </div>

        <div class="chart-container">
            <h3>Unified Production</h3>
            <canvas id="unifiedChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function createChart(ctx, label, data, color) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(item => item.date),
                    datasets: [{
                        label: label,
                        data: data.map(item => item.production),
                        borderColor: color,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Production'
                            }
                        }
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const offshoreData = @json($offshore);
            const onshoreData = @json($onshore);
            const pvData = @json($pv);
            const unifiedData = @json($unified);

            createChart(document.getElementById('offshoreChart').getContext('2d'), 'Offshore Wind Production', offshoreData, 'rgba(75, 192, 192, 1)');
            createChart(document.getElementById('onshoreChart').getContext('2d'), 'Onshore Wind Production', onshoreData, 'rgba(54, 162, 235, 1)');
            createChart(document.getElementById('pvChart').getContext('2d'), 'Photovoltaic Production', pvData, 'rgba(255, 206, 86, 1)');
            createChart(document.getElementById('unifiedChart').getContext('2d'), 'Unified Production', unifiedData, 'rgba(153, 102, 255, 1)');
        });
    </script>
</x-main>
