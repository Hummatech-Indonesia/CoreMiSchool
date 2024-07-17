@extends('school.layouts.app')

@section('style')
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 6px;
            height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #555;
            line-height: 28px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
            right: 10px;
        }

        .select2-container--default .select2-selection--multiple {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 6px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #e4e4e4;
            border: 1px solid #aaa;
            border-radius: 4px;
            padding: 3px 10px;
            margin: 3px 0;
            color: #333;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #007bff;
            color: white;
        }

        .select2-container--default .select2-results__option[aria-selected="true"] {
            background-color: #007bff;
            color: white;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-5 mb-3 me-3">
                <form action="/school/class" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" name="name" value="{{ old('name', request()->name) }}" id="input-search" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <form action="" method="GET">
                <div class="col-12 col-md-6 col-lg-12 mb-3 d-flex">
                    <select id="status-activity" name="filter" class="form-select">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                    <button type="submit" class="btn btn-primary ms-3">Filter</button>
                </div>
            </form>

        </div>
        <button type="button" class="btn mb-1 btn-primary px-4 fs-4 font-medium" data-bs-toggle="modal"
            data-bs-target="#modal-add">
            Tambah Kelas
        </button>
    </div>

    <!-- modal tambah -->
    <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('class.store') }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Nama Kelas</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Wali Kelas</label>
                                <select id="employee_add" class="form-select" name="employee_id">
                                    <option>Pilih...</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <div class="form-group">
                                            <label for="" class="mb-2 pt-3">Tingkatan Kelas</label>
                                            <select id="tingkatan-kelas" class="form-select" name="level_class_id">
                                                @foreach ($levelClasses as $levelClass)
                                                    <option value="{{ $levelClass->id }}">{{ $levelClass->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('level_class_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <div class="form-group">
                                            <label for="" class="mb-2 pt-3">Tahun Ajaran</label>
                                            <select id="school_year_add" class="form-select" name="school_year_id">
                                                @foreach ($schoolYears as $schoolYear)
                                                    <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('school_year_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
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

    <div class="row">
        @forelse ($classrooms as $classroom)
            <div class="col-lg-3">
                <div class="card">
                    <div class="position-relative">
                        <img class="card-img-top img-responsive"src="{{ asset('admin_assets/dist/images/backgrounds/student.png') }}"
                            alt="Card image cap">
                        <div class="d-flex justify-content-end position-absolute top-0 pt-2 end-0 me-2">
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
                                        class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-edit"
                                        data-id="{{ $classroom->id }}" data-name="{{ $classroom->name }}"
                                        data-employee_id="{{ $classroom->employee_id }}"
                                        data-level_class_id="{{ $classroom->level_class_id }}"
                                        data-school_year_id="{{ $classroom->school_year_id }}">
                                        Edit
                                    </button>

                                    <a class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete"
                                        data-id="{{ $classroom->id }}">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <h3 class="fs-4">{{ $classroom->name }}</h3>
                            <span class="ms-auto fs-4">{{ $classroom->schoolYear->school_year }}</span>
                        </div>
                        <div class="d-flex mb-4">
                            <span class="fs-4">{{ $classroom->employee->user->name }}</span>
                            <div class="ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                                <span class="ms-2 fs-4">
                                    {{ $classroom->classroomStudents->count() }} Siswa
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('class.show', $classroom->id) }}" type="button" class="btn waves-effect waves-light btn-primary w-100">Masuk Kelas</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                <p class="fs-5 text-dark text-center mt-2">
                    Kelas belum ditambahkan
                </p>
            </div>
        @endforelse
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Nama Kelas</label>
                                <input type="text" id="name-edit" class="form-control" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Wali Kelas</label>
                                <select id="employee-edit" class="form-select" name="employee_id">
                                    <option>Pilih...</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <div class="form-group">
                                            <label for="" class="mb-2 pt-3">Tingkatan Kelas</label>
                                            <select id="level_class-edit" class="form-select" name="level_class_id">
                                                @foreach ($levelClasses as $levelClass)
                                                    <option value="{{ $levelClass->id }}">{{ $levelClass->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('level_class_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <div class="form-group">
                                            <label for="" class="mb-2 pt-3">Tahun Ajaran</label>
                                            <select id="school_year-edit" class="form-select" name="school_year_id">
                                                @foreach ($schoolYears as $schoolYear)
                                                    <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('school_year_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-light-success text-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
@endsection

@section('script')
    <script>
        $('#employee_add').select2({
            dropdownParent: $('#modal-add')
        });
        $('#school_year_add').select2({
            dropdownParent: $('#modal-add')
        });
        $('#employee-edit').select2({
            dropdownParent: $('#modal-edit')
        });
        $('#school_year-edit').select2({
            dropdownParent: $('#modal-edit')
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var employee_id = $(this).data('employee_id');
            var level_class_id = $(this).data('level_class_id');
            var school_year_id = $(this).data('school_year_id');

            $('#name-edit').val(name);
            $('#employee-edit').val(employee_id).trigger('change');
            $('#level_class-edit').val(level_class_id).trigger('change');
            $('#school_year-edit').val(school_year_id).trigger('change');

            $('#form-update').attr('action', '/school/update-class/' + id);
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/delete-class/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
