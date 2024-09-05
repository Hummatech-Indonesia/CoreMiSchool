<script>
    var options = {
        series: [44, 55, 41],
        chart: {
            type: 'donut',
            width: 400
        },
        labels: ['Alpha', 'Masuk', 'Izin'],
        legend: {
            position: 'bottom',
        },
        dataLabels: {
            enabled: false,
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart-teacher"), options);
    chart.render();
</script>
