@extends('school.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}">

    <style>
        .category-selector .dropdown-menu {
            position: absolute;
            z-index: 1050;
            transform: translate3d(0, 0, 0);
        }
    </style>
@endsection

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-12 mb-3 me-3">
                <form class="position-relative">
                    <input type="text" name="search" class="form-control product-search ps-5" id="input-search" placeholder="Cari..." value="{{ old('search', request('search')) }}">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
        </div>
        <button type="button" class="btn mb-1 btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">
            Tambah Ekstrakurikuler
        </button>
    </div>


    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Extracurricular</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('extraa.store') }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Nama Extracurricular</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Pengajar</label>
                                <select id="pengajar" class="form-control" name="employee_id">
                                    <option value="">Pilih Pengajar</option>
                                    @forelse ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Extracurricular</th>
                    <th class="fs-4 fw-semibold mb-0">Pengajar</th>
                    <th class="fs-4 fw-semibold mb-0">Anggota</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($extracurriculars as $extracurricular)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $extracurricular->name }}
                        </td>
                        <td>
                            {{ $extracurricular->employee->user->name }}
                        </td>
                        <td>
                            {{ $extracurricular->extracurricularStudents ? $extracurricular->extracurricularStudents->count() : '0' }} Siswa
                        </td>
                        <td>
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
                                    style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 23.2px, 0px);"
                                    data-popper-placement="bottom-end">
                                    <button class="btn-detail note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $extracurricular->id }}" data-name="{{ $extracurricular->name }}" data-employee="{{ $extracurricular->employee->user->name }}">
                                        <i class="fs-4 ti ti-eye"></i>Detail
                                    </button>
                                    <button class="btn-edit note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $extracurricular->id }}" data-name="{{ $extracurricular->name }}" data-employee="{{ $extracurricular->employee_id }}">
                                        <i class="fs-4 ti ti-edit"></i>Edit
                                    </button>
                                    <button class="btn-delete note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $extracurricular->id }}">
                                        <i class="fs-4 ti ti-trash"></i>Hapus
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Extracurricular</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Nama Extracurricular</label>
                                <input type="text" class="form-control" id="name-update">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Pengajar</label>
                                <select id="employee-update" class="form-control">
                                    <option value="">Pilih Pengajar</option>
                                    @forelse ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal detail --}}
    <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Detail Extracurricular</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2 text-dark">Nama Extracurricular: </label>
                            <div>
                                <p id="name-detail"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3 text-dark">Pengajar: </label>
                            <div>
                                <p id="employee-detail"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal-component />

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

@section('script')
    <script>
        $(document).ready(function() {
            $('.category-dropdown').on('show.bs.dropdown', function() {
                $(this).closest('.table-responsive').css('overflow', 'visible');
            });

            $('.category-dropdown').on('hide.bs.dropdown', function() {
                $(this).closest('.table-responsive').css('overflow', 'auto');
            });
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var employee = $(this).data('employee');
            $('#name-update').val(name);
            $('#employee-update').val(employee).trigger('change');
            $('#form-update').attr('action', `{{route('extraa.update', '')}}/${id}`);
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', `{{route('extraa.delete', '')}}/${id}`);
            $('#modal-delete').modal('show');
        });

        $('.btn-detail').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var employee = $(this).data('employee');
            $('#name-detail').text(name);
            $('#employee-detail').text(employee);
            $('#modal-detail').modal('show');
        });
    </script>
@endsection
