@extends('student.layouts.app')

@section('style')
    <style>
        .card-body-with-line::before {
            content: '';
            position: absolute;
            left: 10px;
            height: 85px;
            top: 20px;
            bottom: 0;
            width: 4px;
            background-color: #5D87FF;
            border-radius: 2px;
        }

        .card-body-with-line2::before {
            content: '';
            position: absolute;
            left: 10px;
            height: 85px;
            top: 20px;
            bottom: 0;
            width: 4px;
            background-color: #13DEB9;
            border-radius: 2px;
        }

        .card-body-with-line3::before {
            content: '';
            position: absolute;
            left: 10px;
            height: 85px;
            top: 20px;
            bottom: 0;
            width: 4px;
            background-color: #FA896B;
            border-radius: 2px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <h3 class="mb-4"><b>Selamat Datang Ardian Supriadi</b></h3>
        <div class="col-lg-4">
            <div class="card border rounded-4 p-0 mb-3">
                <div class="card-body card-body-with-line">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <h5 style="font-size: 18px"><b>Total Tugas Pada Kelas Saat Ini</b></h5>
                        </div>
                        <div class="bg-primary text-light d-inline-block px-1 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-primary">59 Guru</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border rounded-4 p-0">
                <div class="card-body card-body-with-line2">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <h5 style="font-size: 18px"><b>Total Tugas Dikerjakan</b></h5>
                        </div>
                        <div class="bg-success text-light d-inline-block px-1 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-success">59 Guru</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border rounded-4 p-0">
                <div class="card-body card-body-with-line3">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <h5 style="font-size: 18px"><b>Total Tugas Belum Dikerjakan</b></h5>
                        </div>
                        <div class="bg-danger text-light d-inline-block px-1 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 6a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-3 4h2v8H9v2h6v-2h-2V8H9z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-danger">59 Guru</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card border">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-3"><b>Absensi Hari Ini:</b></h4>
                        <h4>10 Mei 2023 - 08.00</h4>
                    </div>
                    <div class="badge bg-light-success text-success fs-5 text-nowrap py-3 px-4 rounded-3 w-100"
                        style="max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                        Masuk
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card border">
                <div class="card-body">
                    <h4 class="mb-4"><b>Riwayat Absensi</b></h4>
                    <div class="table-responsive rounded-2 mt-3">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th class="text-white" style="background-color: #5D87FF; border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Hari</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Tanggal</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                                    <th class="text-white" style="background-color: #5D87FF; border-top-right-radius: 12px; border-bottom-right-radius: 12px">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (range(1, 5) as $item)
                                    <tr>
                                        <td>Senin</td>
                                        <td>10 Agustus 2024</td>
                                        <td>07.00</td>
                                        <td>16.00</td>
                                        <td>
                                            <span class="mb-1 badge font-medium bg-light-success text-success">Masuk</span>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="card w-100 h-100 overflow-hidden border">
                <div class="card-body">
                    <div class="row align-items-center">
                        <h5 class="card-title fw-semibold">Statistik Absensi</h5>
                        <h6 class="mb-3">Tahun ini</h6>
                        <div id="chart-attendance" class="d-flex justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="col-lg-12">
                <div class="card border">
                    <div class="card-body">
                        <h5><b>Kelasmu</b></h5>

                        <div class="text-center">
                            <img src="{{ asset('assets/images/Topi.png') }}" alt=""
                                style="width: 100px; height: auto;">
                            <h3 class="pt-2 mb-3"><b>XII RPL 1</b></h3>
                            <span class="mb-1 badge font-medium bg-light-primary text-primary py-2 px-3"
                                style="font-size: 18px;">34 Total Siswa</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card border">
                    <div class="card-body">
                        <h5 class="mb-4"><b>Wali Kelasmu</b></h5>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/profile/user-4.jpg') }}" alt=""
                                class="rounded-circle" style="width: 100px; height: 100px;">

                            <div class="ms-3">
                                <h4><b>Sayudi Oke</b></h4>
                                <h6>Tahun Ajaran 2023-2024</h6>

                                <div class="d-flex flex-wrap">
                                    @forelse (range(1, 4) as $item)
                                        <span class="mb-1 badge font-medium bg-light-primary text-primary me-2"
                                            style="font-size: 14px;">
                                            Bahasa
                                        </span>
                                    @empty
                                        <span class="mb-1 badge font-medium bg-light-warning text-warning"
                                            style="font-size: 14px;">
                                            Belum memiliki mapel
                                        </span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border">
                <div class="card-body">
                    <h5 class="mb-4"><b>Daftar Tugas</b></h5>
                    <div class="table-responsive rounded-2 mt-3">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
                            <thead style="border-radius: 12px 12px 0 0;">
                                <tr>
                                    <th class="text-white" style="background-color: #5D87FF; border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Tugas</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Status</th>
                                    <th class="text-white" style="background-color: #5D87FF; border-top-right-radius: 12px; border-bottom-right-radius: 12px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (range(1, 5) as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="bg-light-primary text-primary d-inline-block px-2 py-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        class="" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M20 22H6.5A3.5 3.5 0 0 1 3 18.5V5a3 3 0 0 1 3-3h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1m-1-2v-3H6.5a1.5 1.5 0 0 0 0 3z" />
                                                    </svg>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">Pemograman dasar I X RPL 1</h6>
                                                    <span class="fw-normal">Membuat website file</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="mb-1 badge font-medium bg-light-danger text-danger">Belum Dikerjakan</span>
                                        </td>
                                        <td>
                                            <button class="btn mb-1 waves-effect waves-light btn-primary" type="button">Detail</button>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @include('student.pages.dashboard.scripts.chart-attendance')
@endsection
