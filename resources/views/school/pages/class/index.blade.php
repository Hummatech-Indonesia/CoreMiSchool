@extends('school.layouts.app')
@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
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
        <button type="button" class="btn mb-1 btn-primary px-4 fs-4 font-medium" data-bs-toggle="modal"
            data-bs-target="#modal-import">
            Tambah Kelas
        </button>
    </div>

    <!-- modal tambah -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Nama Kelas</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Pengajar</label>
                            <select id="pengajar" class="form-select">
                                <option value="">Pilih Pengajar</option>
                                <option value="1">Pengajar 1</option>
                                <option value="2">Pengajar 2</option>
                                <option value="3">Pengajar 3</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating ">
                                    <div class="form-group">
                                        <label for="" class="mb-2 pt-3">Tingkatan Kelas</label>
                                        <select id="tingkatan-kelas" class="form-select">
                                            <option value="1">Pengajar 1</option>
                                            <option value="2">Pengajar 2</option>
                                            <option value="3">Pengajar 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating ">
                                    <div class="form-group">
                                        <label for="" class="mb-2 pt-3">Tahun Ajaran</label>
                                        <select id="tahun-ajaran" class="form-select">
                                            <option value="1">2023/2024</option>
                                            <option value="2">2024/2025</option>
                                            <option value="3">2025/2026</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                </div>
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
                        <a href="javascript:void(0)" type="button"
                            class="btn waves-effect waves-light btn-primary w-100">Masuk Kelas</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
