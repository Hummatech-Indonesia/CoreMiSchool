@extends('school.layouts.app')

@section('style')
<style>
    #keagamaan {
        display: none;
    }
</style>
@endsection

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
        </form>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="d-flex justify-content-end">
            <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah Tingkatan Kelas
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Kelas 12</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2" data-bs-toggle="modal" data-bs-target="#modal-update">
                        Edit
                    </button>
                    <button type="button" class="btn mb-1 btn-light-danger text-danger px-4">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Kelas 11</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2" data-bs-toggle="modal" data-bs-target="#modal-update">
                        Edit
                    </button>
                    <button type="button" class="btn mb-1 btn-light-danger text-danger px-4">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Kelas 10</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2" data-bs-toggle="modal" data-bs-target="#modal-update">
                        Edit
                    </button>
                    <button type="button" class="btn mb-1 btn-light-danger text-danger px-4">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahTingkatanKelas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahTingkatanKelas">Tambah Tingkatan Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="">Nama Tingkatan Kelas</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="editTingkatanKelas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTingkatanKelas">Edit Tingkatan Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="">Nama Tingkatan Kelas</label>
                        <input type="text" class="form-control">
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
