@php
    use App\Enums\AttendanceEnum;
@endphp
@extends('teacher.layouts.app')

@section('style')
    <style>
        .select2-selection__rendered {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8 text-dark">Jurnal dan Absensi</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-dark fs-3" aria-current="page">{{ auth_user()->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <h4>Tambah Jurnal</h4>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('teacher.journals.index') }}" type="button" class="btn mb-1 btn-light-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn mb-1 btn-success" id="submit-btn">
                    Simpan Laporan
                </button>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body pt-3">
            <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
                <div class="card-body px-4 py-4">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-8 text-dark">Perhatian</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-dark fs-3" aria-current="page">Jika semua siswa
                                        hadir
                                        semua atau tidak ada yang tidak mengikuti pelajaran maka tidak perlu mengisi
                                        bagian
                                        ini</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-direction-row justify-content-between">
                <h4 class="pb-3">Daftar Siswa Tidak Mengikuti Pelajaran</h4>
                <div>
                    <button type="button" class="btn btn-md btn-primary" {{-- data-bs-toggle="modal" data-bs-target="#create-student" --}} id="student-add-btn">Tambah
                        Siswa</button>
                </div>
            </div>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table text-nowrap customize-table mb-0 align-middle" id="student-table">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="text-white rounded-start" style="background-color: #5D87FF;">Siswa</th>
                            <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                            <th class="text-white" style="background-color: #5D87FF;">Status</th>
                            <th class="text-white rounded-end text-center" style="background-color: #5D87FF;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <h4 class="fw-bold pb-3">Laporan Kegiatan</h4>

            <div class="row">
                <div class="col col-md-4">
                    <div class="card">
                        <div class="card-header p-0">
                            <h4 class="bg-primary text-white fs-8 p-3 rounded">Bukti Foto</h4>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <img class="card-img" src="{{ asset('assets/images/logo/logo-miscool.png') }}" alt="">
                            <div class="text-center"><button type="button" class="btn btn-md btn-primary">Unggah
                                    Foto</button></div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-8">
                    <div class="card">
                        <div class="card-header p-0">
                            <h4 class="bg-primary text-white fs-8 p-3 rounded">Isi Laporan Kegiatan</h4>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                        <div class="form-group">
                            <label for="description" class="form-label">Tuliskan laporan di sini</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Tuliskan deskripsi kegiatan di sini..."></textarea>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('teacher.pages.journals.wigets.create-student')
@endsection

@include('teacher.pages.journals.scripts.store-script')
