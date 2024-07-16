@extends('school.layouts.app')
@section('content')
<div class="d-flex justify-content-between">
    <div class="d-flex flex-wrap align-items-center">
        <div class="col-12 col-md-2 mb-3">
            <form action="" class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="col-12 col-md-2 mb-3 ms-3">
            <select id="status-activity" class="form-select">
                <option value="">Tahun Ajaran</option>
                <option value="">2023/2024</option>
            </select>
        </div>
    </div>

    <div>
        <a href="{{ route('class-alumni.index') }}" class="btn btn-primary">
            Kembali
        </a>
    </div>
</div>


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Kelas</th>
                    <th class="fs-4 fw-semibold mb-0">NISN</th>
                    <th class="fs-4 fw-semibold mb-0">Jenis Kelamin</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classroom->classroomStudents as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30"
                                height="30" alt="" />
                            {{ $student->student->user->name }}
                        </td>
                        <td>
                            {{ $classroom->name }}
                        </td>
                        <td>
                            {{ $student->student->nisn }}
                        </td>
                        <td>
                            {{ $student->student->gender }}
                        </td>
                        <td>
                            <div class="">
                                <div class="category-selector btn-group">
                                    <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                        <div class="category">
                                            <div class="category-business"></div>
                                            <div class="category-social"></div>
                                            <span class="more-options text-dark">
                                                <i class="ti ti-dots-vertical fs-5"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right category-menu"
                                        data-popper-placement="bottom-end">
                                        <button type="button"
                                            class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center">
                                            Jadikan Siswa
                                        </button>

                                        <a class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete">
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="...">
        <ul class="pagination justify-content-end mb-0 mt-4">
            <li class="page-item disabled">
                <a href="#" class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active" aria-current="page">
                <a href="#" class="page-link">1</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">2</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">3</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">Next</a>
            </li>
        </ul>
    </nav>
@endsection
