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
            <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah Pelajaran
            </button>
            <a href="{{ route('detail-teacher.index') }}" class="btn btn-primary px-4">
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card card-body bg-transparent border-2 shadow-none">
            <div class="text-center">
                <h5>Pendidikan Kewarganegaraan</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2">
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
                <h5>Pendidikan Kewarganegaraan</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2">
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
                <h5>Pendidikan Kewarganegaraan</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2">
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
                <h5>Pendidikan Kewarganegaraan</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2">
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
                <h5>Pendidikan Kewarganegaraan</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2">
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
                <h5>Pendidikan Kewarganegaraan</h5>
                <div class="mt-4">
                    <button type="button" class="btn mb-1 btn-primary px-4 me-2">
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

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Tambah Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Kagamaan</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div>
                    </div>
                    <div class="mb-3">
                        <select id="keagamaan" class="form-select form-select mb-3">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
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

@section('script')
<script>
    document.getElementById('flexSwitchCheckDefault').addEventListener('change', function() {
        var keagamaanSelect = document.getElementById('keagamaan');
        if (this.checked) {
            keagamaanSelect.style.display = 'block';
        } else {
            keagamaanSelect.style.display = 'none';
        }
    });

</script>
@endsection
