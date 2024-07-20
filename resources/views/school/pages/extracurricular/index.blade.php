@extends('school.layouts.app')

@section('style')
    <style>
        .category-selector .dropdown-menu {
            position: absolute;
            z-index: 1050;
            transform: translate3d(0, 0, 0);
        }

        .select2 {
            width: 100% !important;
        }

        .select2-selection__rendered {
            width: 100%;
            height: 36px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select2-selection {
            height: fit-content !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-12 mb-3 me-3">
                <form class="position-relative" action="/school/extracurricular">
                    <input type="text" name="name" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari..." value="{{ old('name', request()->name) }}">
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
                                <select id="pengajar" class="select2" name="employee_id">
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
                        <button type="button" class="btn btn-rounded btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
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
                            {{ $extracurricular->extracurricularStudents ? $extracurricular->extracurricularStudents->count() : '0' }}
                            Siswa
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
                                    <button
                                        class="btn-detail note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $extracurricular->id }}" data-name="{{ $extracurricular->name }}"
                                        data-employee="{{ $extracurricular->employee->user->name }}">
                                        <i class="fs-4 ti ti-eye"></i>Detail
                                    </button>
                                    <button
                                        class="btn-edit note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $extracurricular->id }}" data-name="{{ $extracurricular->name }}"
                                        data-employee="{{ $extracurricular->employee_id }}">
                                        <i class="fs-4 ti ti-edit"></i>Edit
                                    </button>
                                    <button
                                        class="btn-delete note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3"
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

    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$extracurriculars" />
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
                                <input type="text" class="form-control" id="name-update" name="name">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Pengajar</label>
                                <select id="employee-update" class="form-control form-select select2" name="employee_id">
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
                        <button type="button" class="btn btn-rounded btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
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
                    <button type="button" class="btn btn-rounded btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                dropdownParent: $('#modal-create')
            });
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
            $('#form-update').attr('action', `{{ route('extraa.update', '') }}/${id}`);
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', `{{ route('extraa.delete', '') }}/${id}`);
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
