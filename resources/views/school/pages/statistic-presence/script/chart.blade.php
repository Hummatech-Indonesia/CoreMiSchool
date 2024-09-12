{{-- statistik siswa --}}
<script>


    var optionsStudent = {
        series: [{
            name: 'Masuk',
            data: 0
        }, {
            name: 'Izin',
            data: 0
        }, {
            name: 'Sakit',
            data: 0
        }, {
            name: 'Alfa',
            data: 0
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
        },
        plotOptions: {
            bar: {
                horizontal: true
            }
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: 'categoris',
            labels: {
                show: false
            }
        },
        yaxis: {
            title: {
                text: undefined
            }
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " siswa";
                }
            }
        },
        fill: {
            opacity: 1
        },
        legend: {
            show: false
        },
        colors: ['#13DEB9', '#5D87FF', '#FFAE1F', '#FA896B']
    };

    var chartStudent = new ApexCharts(document.querySelector("#chart-student"), optionsStudent);
    chartStudent.render();
</script>

