@extends('school.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
@endsection

@section('content')
    <!--  Owl carousel -->
    <div class="owl-carousel counter-carousel owl-theme">
        <div class="item">
            <div class="card border-0 zoom-in bg-light-primary shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" class="p-1 text-primary"
                            viewBox="0 0 640 512">
                            <path fill="currentColor"
                                d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91c-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62C.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38c.33-62.14-49.94-112.62-112-112.62m-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96s-96 42.98-96 96s42.98 96 96 96M592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0" />
                        </svg>
                        <p class="fw-semibold fs-3 text-primary mb-1"> Guru </p>
                        <h5 class="fw-semibold text-primary mb-0">{{ $school->employees()->where('status', 'teacher')->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-light-success shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" class="text-success"
                            viewBox="0 0 36 36">
                            <circle cx="16.86" cy="9.73" r="6.46" fill="currentColor" />
                            <path fill="currentColor" d="M21 28h7v1.4h-7z" />
                            <path fill="currentColor"
                                d="M15 30v3a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1V23a1 1 0 0 0-1-1h-7v-1.47a1 1 0 0 0-2 0V22h-2v-3.58a32 32 0 0 0-5.14-.42a26 26 0 0 0-11 2.39a3.28 3.28 0 0 0-1.88 3V30Zm17 2H17v-8h7v.42a1 1 0 0 0 2 0V24h6Z" />
                        </svg>
                        <p class="fw-semibold fs-3 text-success mb-2 pt-2">Pegawai</p>
                        <h5 class="fw-semibold text-success mb-0">{{ $school->employees()->where('status', 'staff')->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-light-danger shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 256 256"
                            class="text-danger">
                            <path fill="currentColor"
                                d="m249.8 85.49l-116-64a12 12 0 0 0-11.6 0l-116 64a12 12 0 0 0 0 21l21.8 12v47.76a19.9 19.9 0 0 0 5.09 13.32C46.63 194.7 77 220 128 220a136.9 136.9 0 0 0 40-5.75V240a12 12 0 0 0 24 0v-35.88a119.5 119.5 0 0 0 30.91-24.51a19.9 19.9 0 0 0 5.09-13.32v-47.76l21.8-12a12 12 0 0 0 0-21ZM128 45.71L219.16 96L186 114.3a2 2 0 0 1-.18-.12l-52-28.69a12 12 0 0 0-11.6 21l39 21.49L128 146.3L36.84 96ZM128 196c-40.42 0-64.65-19.07-76-31.27v-33l70.2 38.74a12 12 0 0 0 11.6 0l34.2-18.83v37.23a110.5 110.5 0 0 1-40 7.13m76-31.27a93 93 0 0 1-12 10.81v-37.15l12-6.62Z" />
                        </svg>
                        <p class="fw-semibold fs-3 text-danger mb-1">Alumni</p>
                        <h5 class="fw-semibold text-danger mb-0">{{ $alumni }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-light-info shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 16 16"
                            class="text-info">
                            <path fill="currentColor"
                                d="M7 14s-1 0-1-1s1-4 5-4s5 3 5 4s-1 1-1 1zm4-6a3 3 0 1 0 0-6a3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5a2.5 2.5 0 0 0 0 5" />
                        </svg>
                        <p class="fw-semibold fs-3 text-info mb-1">Siswa</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $school->students->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-light-warning shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 16 16"
                            class="text-warning">
                            <path fill="currentColor"
                                d="M14.942 12.57L10 4.335V1h.5c.275 0 .5-.225.5-.5s-.225-.5-.5-.5h-5c-.275 0-.5.225-.5.5s.225.5.5.5H6v3.335L1.058 12.57C-.074 14.456.8 16 3 16h10c2.2 0 3.074-1.543 1.942-3.43M3.766 10L7 4.61V1h2v3.61L12.234 10z" />
                        </svg>
                        <p class="fw-semibold fs-3 text-warning mb-1 pt-2">Pelajaran</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ $school->maples->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-light-info shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 256 256" class="text-info">
                            <path fill="currentColor"
                                d="M232 216h-24V40a16 16 0 0 0-16-16H64a16 16 0 0 0-16 16v176H24a8 8 0 0 0 0 16h208a8 8 0 0 0 0-16m-68-72a12 12 0 1 1 12-12a12 12 0 0 1-12 12" />
                        </svg>
                        <p class="fw-semibold fs-3 text-info mb-1">Kelas</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $classrooms }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100 border bg-transparent">
                <div class="card-body d-flex justify-content-between">
                    <h5>Tahun Ajaran Saat Ini</h5>
                    <span class="mb-1 badge bg-danger">{{ $schoolYear->school_year }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100 border bg-transparent">
                <div class="card-body d-flex justify-content-between">
                    <h5>Semester Saat Ini</h5>
                    <span class="mb-1 badge bg-primary">{{ $semester->type == 'ganjil' ? 'Ganjil' : 'Genap'}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="d-md-flex align-items-center gap-3 justify-content-between mb-3">
                        <div>
                            <h5 class="card-title fw-semibold">Statistik Absensi</h5>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-4 mt-md-0">
                            <form>
                                <div class="form-group mb-4">
                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>2024</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="investments"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold">Statistik Jurnal Guru</h5>
                            <h4 class="fw-semibold mb-3">5 Juli 2024</h4>
                            <div class=" align-items-center">
                                <div class="me-4">
                                    <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">Sudah Mengisi</span>
                                </div>
                                <div>
                                    <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">Belum Mengisi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div id="jurnal"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin_assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/apex-chart/apex.area.init.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/dashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        $(function() {
            var attendanceChartData = @json($attendanceChart);

            var categories = attendanceChartData.map(item => item.month);
            var data1 = attendanceChartData.map(item => item.attendance_present);
            var data2 = attendanceChartData.map(item => item.attendance_permit);
            var data3 = attendanceChartData.map(item => item.attendance_sick);
            var data4 = attendanceChartData.map(item => item.attendance_alpha);

            var investments = {
                series: [{
                        name: "Masuk",
                        data: data1,
                    },
                    {
                        name: "Izin",
                        data: data2,
                    },
                    {
                        name: "Sakit",
                        data: data3,
                    },
                    {
                        name: "Alpha",
                        data: data4,
                    },
                ],
                chart: {
                    ffontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                    height: 325,
                    type: "line",
                    toolbar: {
                        show: false,
                    },
                },
                legend: {
                    show: false,
                },
                stroke: {
                    width: 4,
                    curve: "smooth",
                },
                grid: {
                    borderColor: "transparent",
                },
                colors: ["#13deb9", "#5d87ff", "#ffae1f", "#fa896b"],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        gradientToColors: ["#6993ff"],
                        shadeIntensity: 1,
                        type: "horizontal",
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100, 100, 100],
                    },
                },
                markers: {
                    size: 0,
                },
                xaxis: {
                    type: 'category',
                    categories: categories,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    }
                },
                tooltip: {
                    theme: "dark",
                },
            };
            new ApexCharts(document.querySelector("#investments"), investments).render();
        });
    </script>

    <script>
        var breakupOptions = {
            chart: {
                type: 'donut',
                width: 180,
                fontFamily: "'Plus Jakarta Sans', sans-serif",
                foreColor: '#adb0bb',
            },
            series: [38, 40],
            labels: ['Mengisi', 'Tidak Mengisi'],
            plotOptions: {
                pie: {
                    startAngle: 0,
                    endAngle: 360,
                    donut: {
                        size: '75%',
                    },
                },
            },
            colors: ['var(--bs-primary)', '#ecf2ff', '#F9F9FD'],
            stroke: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            responsive: [{
                breakpoint: 991,
                options: {
                    chart: {
                        width: 120,
                    },
                },
            }, ],
            tooltip: {
                theme: 'dark',
                fillSeriesColor: false,
            },
        };

        var chart = new ApexCharts(document.querySelector('#jurnal'), breakupOptions);
        chart.render();
    </script>
@endsection
