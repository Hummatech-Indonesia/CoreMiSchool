@extends('school.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <h4 class="mb-3">Pengajar</h4>
                        <div class="col-auto">
                            <img src="{{ asset('assets/images/default-user.jpeg') }}" alt="Profile Image"
                                class="img-fluid rounded-circle" style="width: 84px; height: 84px;">

                        </div>
                        <div class="col">
                            <h4 class="fw-semibold mb-2">Suyadi Oke</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent p-0 m-0">
                                    <li class="breadcrumb-item" aria-current="page">Tahun Ajaran 2023-2024</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <h4 class="mb-3">Ekstrakulikuler </h4>
                        <div class="col">
                            <h4 class="fw-semibold mb-2">Basket</h4>
                            <div class="mt-3">
                                <span class="mb-1 badge font-medium bg-light-secondary text-secondary">34 Total Siswa</span>
                                <span class="mb-1 badge font-medium bg-light-success text-success">10 Pertemuan</span>

                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{ asset('assets/images/default-user.jpeg') }}" alt="Profile Image"
                                class="img-fluid rounded-circle" style="width: 84px; height: 84px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
