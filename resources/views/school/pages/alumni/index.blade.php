@extends('school.layouts.app')
@section('content')
    <div class="d-flex flex-wrap align-items-center">
        <div class="col-12 col-md-2 mb-3">
            <form action="" class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="col-12 col-md-2 mb-3 ms-3">
            <select id="status-activity" class="form-select">
                <option value="">Tahun Ajaran</option>
                <option value="">2023/2024</option>
            </select>
        </div>
        <div class="col-12 col-md-2 mb-3 ms-3">
            <select id="status-activity" class="form-select">
                <option value="">Kelas</option>
                <option value="">12 RPL 1</option>
            </select>
        </div>
    </div>


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Kelas</th>
                    <th class="fs-4 fw-semibold mb-0">NISN</th>
                    <th class="fs-4 fw-semibold mb-0">Jenis Kelamin</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach (range(1, 5) as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30"
                                height="30" alt="" />
                            Arya Rizki
                        </td>
                        <td>
                            XII RPL 2
                        </td>
                        <td>
                            1234567890
                        </td>
                        <td>
                            Laki Laki
                        </td>
                        <td>
                            <button type="button"
                                class="btn mb-1 btn-sm waves-effect waves-light btn-rounded btn-primary">Jadikan
                                Siswa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="...">
        <ul class="pagination justify-content-end mb-0 mt-4">
            <li class="page-item disabled">
                <a href="#" class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active" aria-current="page">
                <a href="#" class="page-link">1</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">2</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">3</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">Next</a>
            </li>
        </ul>
    </nav>
@endsection
