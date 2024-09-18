@extends('school.layouts.app')

@section('style')
    <style>
        .apexcharts-legend {
            display: none;
        }

        .apexcharts-legend-series {
            display: none;
        }

        .apexcharts-toolbar {
            display: none !important;
        }

        #custom-legend {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .legend-marker {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .legend-text {
            font-size: 12px;
            color: #373d3f;
            font-family: Helvetica, Arial, sans-serif;
        }
    </style>
@endsection

@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-light">Pegawai</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Daftar - daftar guru dan staff di sekolah</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start w-100">
        <div class="mb-3 mb-md-0 w-100">
            <div class="d-flex align-items-center">
                <span class="mb-1 badge bg-primary p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                    </svg>
                </span>
                <h5 class="ms-2 fw-semibold">Statistik Absensi Pegawai</h5>
            </div>
        </div>
        <div class="w-100">
            <form id="form-action" class="d-flex flex-column flex-md-row gap-2 w-100">
                <div class="d-flex flex-column flex-md-row w-100 gap-2">
                    <div class="flex-grow-1 w-100 w-sm-75">
                        <input type="date" name="start_date" class="form-control w-100"
                            value="{{ old('start_date', request()->start_date ?? date('Y-m-d')) }}">
                    </div>
                    <div class="flex-grow-1 w-100 w-sm-75">
                        <input type="date" name="end_date" class="form-control w-100"
                            value="{{ old('end_date', request()->end_date ?? date('Y-m-d')) }}">
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row gap-2 mb-2 mb-md-0 w-100">
                    <button type="submit" class="btn btn-primary py-1 w-100 w-md-auto">Cari</button>
                    <button class="btn btn-export btn-success d-flex align-items-center justify-content-center py-1 w-100 w-md-auto" type="submit">
                        <span class="ms-2">Cetak Absensi</span>
                    </button>

                </div>
            </form>
        </div>

    </div>



    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card card-body">
                <h5 class="mb-4">Data Absensi Pegawai</h5>

                <div class="table-responsive rounded-2 mb-4">
                    <table class="table border text-nowrap customize-table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr class="">
                                <th class="text-white" style="background-color: #5D87FF;">No</th>
                                <th class="text-white" style="background-color: #5D87FF;">Nama Pengguna</th>
                                <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                                <th class="text-white" style="background-color: #5D87FF;">Pulang</th>
                                <th class="text-white" style="background-color: #5D87FF;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($attendances as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->model->user->name }}</td>
                                    <td>{{ $employee->checkin ? $employee->checkin : '-' }}</td>
                                    <td>{{ $employee->checkout ? $employee->checkout : '-' }}</td>
                                    <td><span
                                            class="badge {{ $employee->status == 'present' ? 'bg-light-primary text-primary' : ($employee->status == 'sick' ? 'bg-light-warning text-warning' : ($employee->status == 'alpha' ? 'bg-light-danger text-danger' : ($employee->status == 'permit' ? 'bg-light-warning text-warning' : ($employee->status == 'late' ? 'bg-light-warning text-warning' : '')))) }}">
                                            {{ $employee->status == 'present' ? 'Masuk' : ($employee->status == 'sick' ? 'Sakit' : ($employee->status == 'alpha' ? 'Alpha' : ($employee->status == 'permit' ? 'Izin' : ($employee->status == 'late' ? 'Telat' : '')))) }}
                                        </span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center align-middle">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}"
                                                alt="" width="300px">
                                            <p class="fs-5 text-dark text-center mt-2">
                                                Siswa belum ditambahkan
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-body">
                <h5>Statistik Absensi Pegawai</h5>
                <div>
                    <p>20 Januari 2024</p>
                </div>
                <div id="chart-employee"></div>

                    <div class="d-flex">
                        <div class="d-flex">
                            <div id="custom-legend">
                                <div class="legend-item">
                                    <span class="legend-marker" style="background-color: rgb(19, 222, 185);"></span>
                                    <span class="legend-text">Masuk</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-marker" style="background-color: rgb(93, 135, 255);"></span>
                                    <span class="legend-text">Izin</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-marker" style="background-color: rgb(255, 174, 31);"></span>
                                    <span class="legend-text">Sakit</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-marker" style="background-color: rgb(250, 137, 107);"></span>
                                    <span class="legend-text">Alfa</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('school.pages.statistic-presence.script.donut-chart')

    <script>
        $('.btn-export').click(function() {
            $('#form-action').attr('action', '{{ route('school.teacher-attendance.export') }}');
        })
    </script>
@endsection
