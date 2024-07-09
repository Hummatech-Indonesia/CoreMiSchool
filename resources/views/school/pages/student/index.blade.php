@extends('school.layouts.app')
@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-6 mb-3 me-3">
                <form action="" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari tim...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-5 mb-3">
                <select id="status-activity" class="form-select">
                    <option value="">Terbaru</option>
                    <option value="">Terlama</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach (range(1, 4) as $item)
            <div class="col-lg-3">
                <div class="card">
                    <img class="card-img-top img-responsive"
                        src="{{ asset('admin_assets/dist/images/backgrounds/student.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <h3 class="fs-4">XII RPL 2</h3>
                            <span class="ms-auto fs-4">2023/2024</span>
                        </div>
                        <div class="d-flex mb-4">
                            <span class="fs-4">Rahayu Soviya</span>
                            <div class="ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                                <span class="ms-2 fs-4">
                                    31 Siswa
                                </span>
                            </div>
                        </div>
                        <button type="button" class="btn waves-effect waves-light btn-primary w-100">Masuk Kelas</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
