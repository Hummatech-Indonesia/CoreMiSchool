@extends('staff.layouts.app')

@section('style')

@endsection

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Perbaikan</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="javascript:void(0)">Daftar siswa perbaikan untuk mengurangi point pelanggaran</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/welcome.png') }}" alt="" class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
    <form class="d-flex justify-content-between" action="">
        <div class="d-flex gap-2">
            <div class="position-relative">
                <input type="text" name="name" class="form-control product-search ps-5" id="input-search" placeholder="Cari..." value="{{ old('name', request('name')) }}">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </div>
            <div class="d-flex gap-2">
                <select name="gender" class="form-select">
                    <option value="all">Tampilkan semua</option>
                    <option value="male" {{ request()->has('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ request()->has('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <div>
                    <button type="submit" class="btn btn-primary btn-md">Filter</button>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#import-remidial">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M5 13V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2h-5.5M2 19h7m-3-3l3 3l-3 3" />
                    </g>
                </svg>
                Import Perbaikan
            </button>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-create-remidial">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4 22q-.825 0-1.412-.587T2 20V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm0-2h16V8H4zm6-14h4V4h-4zM4 20V8zm7-5v3h2v-3h3v-2h-3v-3h-2v3H8v2z" /></svg>
                Tambah Perbaikan
            </button>
        </div>
    </form>
</div>

<div class="table-responsive rounded-2 mb-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr class="">
                <th>No</th>
                <th>Nama</th>
                <th>Durasi Pengerjaan</th>
                <th>Perbaikan</th>
                <th>Status</th>
                <th>Point</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($studentRepairs as $studentRepair)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40" height="40" alt="" />
                        <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $studentRepair->classroomStudent->student->user->name }}</h6>
                            <span class="fw-normal">{{ $studentRepair->classroomStudent->student->user->phone_number }}</span>
                        </div>
                    </div>
                </td>
                <td>{{ $studentRepair->start_date }} - {{ $studentRepair->end_date }}</td>
                <td>{{ $studentRepair->repair }}</td>
                <td>
                    <span class="badge {{ $studentRepair->is_approved == 0 ? 'bg-light-danger text-danger' : 'bg-light-success text-success' }}">{{ $studentRepair->is_approved == 0 ? 'Belum di kerjakan' : 'Sudah di kerjakan' }}</span>
                </td>
                <td>
                    <span class="badge bg-light-primary text-primary">-{{ $studentRepair->point }} Point</span>
                </td>
                <td>
                    <a href="" class="btn btn-primary py-1 px-4" data-bs-toggle="modal" data-bs-target="#modal-detail-remidial">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center align-middle">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                        <p class="fs-5 text-dark text-center mt-2">
                            Siswa belum ditambahkan
                        </p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- modal detail --}}
@include('staff.pages.repair-student-list.widgets.modal-detail')
{{-- modal import --}}
@include('staff.pages.repair-student-list.widgets.modal-import')
{{-- modal tambah --}}
@include('staff.pages.repair-student-list.widgets.modal-create')

@endsection

@section('script')
{{-- select2 --}}
@include('staff.pages.repair-student-list.scripts.select2')
@endsection
