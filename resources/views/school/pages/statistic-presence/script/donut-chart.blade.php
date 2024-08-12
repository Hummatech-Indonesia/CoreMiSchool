{{-- statistik pegawai --}}

<script>
    var attendanceChartData = @json($attendanceEmployeeChart);

    var data1 = attendanceChartData.map(item => item.attendance_present);
    var data2 = attendanceChartData.map(item => item.attendance_permit);
    var data3 = attendanceChartData.map(item => item.attendance_sick);
    var data4 = attendanceChartData.map(item => item.attendance_alpha);

    var options = {
        series: [data2, data1, data3, data4],
        chart: {
            type: 'donut'
        },
        dataLabels: {
            enabled: false // Menyembunyikan persentase di dalam chart
        },
        labels: ['Izin','Masuk','Sakit','Alpha'], // Menghapus tulisan series
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
