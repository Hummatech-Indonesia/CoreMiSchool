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
            <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah Jam Pelajaran
            </button>
        </div>
    </div>
</div>

<div class="mt-2">
    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Penempatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse (range(1,7) as $item)
                <tr>
                    <td>07.00-08.00</td>
                    <td>Jam Ke-1</td>
                    <td>
                        <div class="gap-3">
                            <button class="btn btn-light-primary text-primary me-2">Edit</button>
                            <button class="btn btn-light-danger text-danger">Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center align-middle">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                width="300px">
                            <p class="fs-5 text-dark text-center mt-2">
                                RFID belum ditambahkan
                            </p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Tambah Jam Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                {{-- @method('post') --}}
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="">Jam Mulai</label>
                            <input type="time" name="name" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="">Jam Berakhir</label>
                            <input type="time" name="name" class="form-control">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="">Jam Ke-</label>
                            <input type="number" name="name" class="form-control">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                Istirahat
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection