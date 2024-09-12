{{-- statistik siswa --}}
<script>
    console.log({!! json_encode($attendanceData) !!});
    
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

