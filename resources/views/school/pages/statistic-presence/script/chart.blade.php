{{-- statistik siswa --}}
<script>
    var options = {
        series: [{
            name: 'Masuk'
            , data: [45, 45, 45, 45, 45, 45, 45, 45, 45]
        }, {
            name: 'Izin'
            , data: [45, 45, 45, 45, 45, 45, 45, 45, 45]
        }, {
            name: 'Sakit'
            , data: [45, 45, 45, 45, 45, 45, 45, 45, 45]
        }, {
            name: 'Alfa'
            , data: [45, 45, 45, 45, 45, 45, 45, 45, 45]
        }]
        , chart: {
            type: 'bar'
            , height: 350
            , stacked: true
        }
        , plotOptions: {
            bar: {
                horizontal: true
            , }
        , }
        , stroke: {
            width: 1
            , colors: ['#fff']
        }
        , xaxis: {
            categories: ['X RPL 1', 'X RPL 2', 'X RPL 3', 'X TKJ 1', 'X TKJ 2', 'X TKJ 3', 'X TKR 1', 'X TKR 2', 'X TKR 3']
            , labels: {
                show: false
            }
        }
        , yaxis: {
            title: {
                text: undefined
            }
        , }
        , tooltip: {
            y: {
                formatter: function(val) {
                    return val + "K";
                }
            }
        }
        , fill: {
            opacity: 1
        }
        , legend: {
            // position: 'top'
            // , horizontalAlign: 'left'
            // , offsetX: 40
            show: false
        }
        , colors: ['#13DEB9', '#5D87FF', '#FFAE1F', '#FA896B']
    };

    var chart = new ApexCharts(document.querySelector("#chart-student"), options);
    chart.render();

</script>


{{-- statistik pegawai --}}

<script>
    var options = {
        series: [44, 55, 41],
        chart: {
            type: 'donut'
        },
        dataLabels: {
            enabled: false // Menyembunyikan persentase di dalam chart
        },
        labels: [], // Menghapus tulisan series
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart-employee"), options);
    chart.render();
</script>
