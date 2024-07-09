@extends('school.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">XII RPL 2</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index-2.html">Tahun
                                    Ajaran 2023/2024</a>
                            </li>
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

    <div class="col-12 col-md-6 col-lg-2 mb-3 me-3">
        <form action="" class="position-relative">
            <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Status</th>
                    <th class="fs-4 fw-semibold mb-0">NISN</th>
                    <th class="fs-4 fw-semibold mb-0">Jenis Kelamin</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody class="">
                <tr>
                    <td>
                        <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt=""/>
                        Arya Rizki</td>
                    <td>
                        Siswa
                    </td>
                    <td>
                        1234567890
                    </td>
                    <td>
                        Laki Laki
                    </td>
                    <td>
                        <button type="button" class="btn mb-1 btn-sm waves-effect waves-light btn-rounded btn-primary">Jadikan
                            Siswa</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt=""/>
                        Arya Rizki
                    </td>
                    <td>
                        Siswa
                    </td>
                    <td>
                        1234567890
                    </td>
                    <td>
                        Laki Laki
                    </td>
                    <td>
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-sm btn-rounded btn-success">Jadikan
                            Alumni</button>
                    </td>
                </tr>
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
