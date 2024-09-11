<script>
    var options = {
        series: [{
                name: "Pelanggaran",
                data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
            },
            {
                name: "Perbaikan",
                data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
            },
        ],
        chart: {
            height: 400,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
        },
        colors: ['#FA896B', '#13DEB9'], // Custom colors for the lines
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 0, 5]
        },
        title: {
            text: 'Statistik Pelanggaran',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function(val, opts) {
                return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] +
                    '</strong>'
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
        },
        tooltip: {
            y: [{
                    title: {
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-violation"), options);
    chart.render();
</script>
