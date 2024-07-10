@extends('school.layouts.app')

@section('content')

<div class="row mt-5 mb-4">
    <div class="col-lg-6 mb-3">
        <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="search" class="form-control search-chat py-2 px-5 ps-5" id="search-name" placeholder="Cari">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>

            <div class="d-flex gap-2">
                <select name="" class="form-select" id="search-status">
                    <option value="">XI MIPA</option>
                    <option value="">XI IPS</option>
                </select>
            </div>
        </form>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M23 18h-3v-3h-2v3h-3v2h3v3h2v-3h3M6 2a2 2 0 0 0-2 2v16c0 1.11.89 2 2 2h7.81c-.36-.62-.61-1.3-.73-2H6V4h7v5h5v4.08c.33-.05.67-.08 1-.08c.34 0 .67.03 1 .08V8l-6-6M8 12v2h8v-2m-8 4v2h5v-2Z" /></svg>
                Tambah RFID
            </button>
        </div>
    </div>
</div>

<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>NISN</th>
                <th>Nomor RFID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Arya Rizki</td>
                <td>SMKN 1 Kepanjen</td>
                <td>12345678</td>
                <td>1235678</td>
                <td>
                    <button type="button" class="btn btn-danger">
                        Hapus
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahRfid" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRfid">Tambah RFID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <span class="text-dark fw-semibold me-2">Nama :</span>
                        Arya Rizki
                    </div>
                    <div class="mb-3">
                        <span class="text-dark fw-semibold me-2">Email :</span>
                        arya@gmail.com
                    </div>
                    <div class="mb-3">
                        <span class="text-dark fw-semibold me-2">Staf di :</span>
                        SMKN 1 Kepanjen
                    </div>
                    <div class="mb-3">
                        <span class="text-dark fw-semibold me-2">RFID :</span>
                    </div>
                    <div class="mb-3">
                        Anda juga bisa melakukan tab ke rfid reader untuk menginputkan rfid
                    </div>
                    <div>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                </div>
        </div>
    </div>
</div>


@endsection