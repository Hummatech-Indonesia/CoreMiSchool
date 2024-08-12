{{-- statistik siswa --}}
<script>
    var optionsStudent = {
        series: [{
            name: 'Masuk',
            data: {!! json_encode($attendanceData['present']) !!}
        }, {
            name: 'Izin',
            data: {!! json_encode($attendanceData['permit']) !!}
        }, {
            name: 'Sakit',
            data: {!! json_encode($attendanceData['sick']) !!}
        }, {
            name: 'Alfa',
            data: {!! json_encode($attendanceData['alpha']) !!}
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true
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
            categories: {!! json_encode(array_values($categories)) !!}, // Pastikan kategori ditampilkan dengan benar
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
