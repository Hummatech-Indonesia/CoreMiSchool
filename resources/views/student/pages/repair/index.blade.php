@extends('student.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-white">Daftar Perbaikan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">Daftar perbaikan dan jumlah point siswa</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/award.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between mb-4">
        <form class="d-flex flex-column flex-md-row" method="GET">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="text" name="search_student" class="form-control" placeholder="Cari..." value="">
            </div>

            <div class="mb-3 mb-md-0 me-md-3">
                <select name="point_student" class="form-select">
                    <option value="tertinggi">Point Tertinggi
                    </option>
                    <option value="terendah">Point Terendah
                    </option>
                </select>
            </div>

            <div class="mb-3 mb-md-0 me-md-3">
                <select name="point_student" class="form-select">
                    <option value="terbaru">Terbaru
                    </option>
                    <option value="terlama">Terlama
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th>No</th>
                    <th>Jenis Perbaikan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Status</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse (range(1,3) as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Bermain Slot saat jam pelajaran, gacor kang...</td>
                        <td>10 Januari 2023</td>
                        <td>10 Januari 2023</td>
                        <td>
                            <span class="badge bg-light-danger text-danger">Belum Dikerjakan</span>
                        </td>
                        <td>
                            <span class="badge bg-light-danger text-danger">+ 23
                                Point</span>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#repair-upload-detail"
                                class="btn btn-primary py-1 px-4">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Bermain Slot saat jam pelajaran, gacor kang...</td>
                        <td>10 Januari 2023</td>
                        <td>10 Januari 2023</td>
                        <td>
                            <span class="badge bg-light-success text-success">Selesai Dikerjakan</span>
                        </td>
                        <td>
                            <span class="badge bg-light-danger text-danger">+ 23
                                Point</span>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#repair-list-detail"
                                class="btn btn-primary py-1 px-4">Detail</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Kamu belum pernah melanggar peraturan sekolah
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('student.pages.repair.widgets.modal-detail')
    @include('student.pages.repair.widgets.modal-upload')
@endsection
