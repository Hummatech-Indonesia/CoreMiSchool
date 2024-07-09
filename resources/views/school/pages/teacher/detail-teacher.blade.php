@extends('school.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 mb-3">
        <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5" id="search-name" placeholder="Cari">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>

            <div class="d-flex gap-2">
                <select name="" class="form-select" id="search-status">
                    <option value="">2023/2024</option>
                    <option value="">2024/2025</option>
                </select>
            </div>
        </form>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('create-subjects') }}" class="btn btn-success px-4">
                Tambah Data Pelajaran
            </a>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#modal-create-subjectTeacher">
                Tambah Pelajaran Guru
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Pendidikan Kewarganegaraan</h5>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="14" height="14" viewBox="0 0 24 24"><path fill="none" stroke="#5A6A85" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4V2m0 2v2m0-2h-4.5M3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9zm0 0V6a2 2 0 0 1 2-2h2m0-2v4m14 4V6a2 2 0 0 0-2-2h-.5"/></svg>
                    2023/2024
                </div>
                <div class="mt-2">
                    <button type="button" class="btn mb-1 btn-light-danger text-danger">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Pendidikan Kewarganegaraan</h5>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="14" height="14" viewBox="0 0 24 24"><path fill="none" stroke="#5A6A85" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4V2m0 2v2m0-2h-4.5M3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9zm0 0V6a2 2 0 0 1 2-2h2m0-2v4m14 4V6a2 2 0 0 0-2-2h-.5"/></svg>
                    2023/2024
                </div>
                <div class="mt-2">
                    <button type="button" class="btn mb-1 btn-light-danger text-danger">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Pendidikan Kewarganegaraan</h5>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="14" height="14" viewBox="0 0 24 24"><path fill="none" stroke="#5A6A85" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4V2m0 2v2m0-2h-4.5M3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9zm0 0V6a2 2 0 0 1 2-2h2m0-2v4m14 4V6a2 2 0 0 0-2-2h-.5"/></svg>
                    2023/2024
                </div>
                <div class="mt-2">
                    <button type="button" class="btn mb-1 btn-light-danger text-danger">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Pendidikan Kewarganegaraan</h5>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="14" height="14" viewBox="0 0 24 24"><path fill="none" stroke="#5A6A85" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4V2m0 2v2m0-2h-4.5M3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9zm0 0V6a2 2 0 0 1 2-2h2m0-2v4m14 4V6a2 2 0 0 0-2-2h-.5"/></svg>
                    2023/2024
                </div>
                <div class="mt-2">
                    <button type="button" class="btn mb-1 btn-light-danger text-danger">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Pendidikan Kewarganegaraan</h5>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="14" height="14" viewBox="0 0 24 24"><path fill="none" stroke="#5A6A85" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4V2m0 2v2m0-2h-4.5M3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9zm0 0V6a2 2 0 0 1 2-2h2m0-2v4m14 4V6a2 2 0 0 0-2-2h-.5"/></svg>
                    2023/2024
                </div>
                <div class="mt-2">
                    <button type="button" class="btn mb-1 btn-light-danger text-danger">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-create-subjectTeacher" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Tambah Pelajaran Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="">Pilih Pelajaran</label>
                        <select class="form-select form-select mb-3">
                            <option value="">Pendidikan Kewarganegaraan</option>
                            <option value="">Ilmu Pengetahuan Alam</option>
                            <option value="">Matematika</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tahun Ajaran</label>
                        <select class="form-select form-select mb-3">
                            <option value="">2023/2024</option>
                            <option value="">2024/2025</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>

@endsection