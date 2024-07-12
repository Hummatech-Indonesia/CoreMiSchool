@extends('school.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8" style="color: #5D87FF">Ekspor Data Absensi </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-primary">
                                Siswa - X RPL 1
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card bg-light-warning shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-3 text-warning">Perhatian</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-warning">
                                        isi filter di bawah untuk export data absensi sesuai tanggal yang dibutuhkan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2 mb-3">
                    <div class="form-group">
                        <label for="startDate" class="mb-2">Tanggal Awal</label>
                        <input type="date" class="form-control" id="startDate">
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-3">
                    <div class="form-group">
                        <label for="endDate" class="mb-2">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="endDate">
                    </div>
                </div>
                <div class="col-12 col-md-8 mb-3 d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-warning mr-2">Tampilkan </button>
                    <button type="button" class="btn btn-success ms-2">Eksport</button>
                </div>
            </div>

        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Preview Absensi</h5>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead class="text-dark fs-4 bg-primary">
                        <tr class="">
                            <th class="fs-4 fw-semibold mb-0">No</th>
                            <th class="fs-4 fw-semibold mb-0">Nama</th>
                            <th class="fs-4 fw-semibold mb-0">Masuk</th>
                            <th class="fs-4 fw-semibold mb-0">Pulang</th>
                            <th class="fs-4 fw-semibold mb-0">Poin</th>
                            <th class="fs-4 fw-semibold mb-0">Max Point</th>
                            <th class="fs-4 fw-semibold mb-0">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach (range(1, 5) as $item)
                            <tr>
                                <td>{{ $item }}</td>
                                <td> Prasetyo Budi Nugroho</td>
                                <td>07.00</td>
                                <td> 16.00</td>
                                <td>1</td>
                                <td>10</td>
                                <td>
                                    <span class="mb-1 badge font-medium bg-light-info text-info">Masuk</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
