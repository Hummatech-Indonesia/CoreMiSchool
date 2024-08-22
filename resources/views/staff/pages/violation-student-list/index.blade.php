@extends('staff.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Pelanggaran</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-dark text-decoration-none"
                                    href="javascript:void(0)">Daftar siswa perbaikan untuk mengurangi point pelanggaran</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/welcome.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-6 mb-3 me-3">
                <form action="" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-5 mb-3">
                <select id="status-activity" class="form-select">
                    <option value="">Laki-Laki</option>
                    <option value="">Perempuan</option>
                </select>
            </div>
        </div>
        <div>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#violation-student-list">Tambah
                Pelanggaran</button>
        </div>
    </div>

    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4 text-center">
                <tr>
                    <th>No</th>
                    <th class="text-start nama-col">Nama</th>
                    <th>Kelas</th>
                    <th>NISN</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse (range(1,4) as $item)
                    <tr>
                        <td>{{ $item }}</td>
                        <td class="text-start">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                    height="40" alt="" />
                                <div class="ms-2">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">Ahmad Lukman Hakim</h6>
                                    <span class="fw-normal">X RPL 1</span>
                                </div>
                            </div>
                        </td>
                        <td>Merokok dijam pelajaran</td>
                        <td>10 Januari 2020</td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-danger text-danger">+ 80 Point</span>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#detail-violation-student" type="button"
                                class="btn mb-1 waves-effect waves-light btn-primary">Detail</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Belum ada siswa melanggar
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    @include('staff.pages.violation-student-list.widgets.detail-violation')
@endsection
