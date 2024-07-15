@extends('school.layouts.app')

@section('content')

<div class="card bg-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold text-white mb-8">Kartu RFID</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="javascript:void(0)">Daftar - daftar RFID di sekolah</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="">
    <span class="mb-1 badge font-medium bg-light-success text-success me-2">Digunakan: {{ $usedRfids->count() }}</span>
<span class="mb-1 badge font-medium bg-light-danger text-danger">Belum Digunakan: {{ $notUsedRfids->count() }}</span>
</div> --}}


<div class="row mt-5 mb-4">
    <div class="col-lg-4 mb-3">
        <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="search" class="form-control search-chat py-2 px-5 ps-5" id="search-name" placeholder="Cari">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>

            <div class="d-flex gap-2">
                <select name="" class="form-select" id="search-status">
                    <option value="">Digunakan</option>
                    <option value="">Belum Digunakan</option>
                </select>
                <select name="" class="form-select" id="">
                    <option value="">Tampilkan semua</option>
                    <option value="">Terbaru</option>
                    <option value="">Terlama</option>
                </select>
            </div>
        </form>
    </div>
    {{-- <div class="col-lg-8 mb-3 d-flex justify-content-end">
        <form action="" method="post" class="d-flex align-items-center gap-3">
            <span class="">Tambah RFID: </span>
            @csrf
            <input type="text" name="rfid" class="form-control w-auto">
            <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
        </form>
    </div> --}}
</div>

<div class="mt-2">
    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead>
                <tr>
                    <th>Nomor RFID</th>
                    <th>Pengguna</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse (range(1,6) as $rfid)
                <tr>
                    <td>1234567</td>
                    <td>Suyadi Oke</td>
                    <td>
                        <span class="mb-1 badge px-5 font-medium bg-light-success text-success">Aktif</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24">
                                <path fill="#ffffff" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z" /></svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada RFID</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahRfid" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRfid">Tambah RFID</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <span class="text-dark fw-semibold me-2">RFID :</span>
                    </div>
                    <div class="mb-3">
                        Anda juga bisa melakukan tab ke rfid reader untuk menginputkan rfid
                    </div>
                    <div>
                        <input type="text" name="rfid" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<x-delete-modal-component />

@endsection
