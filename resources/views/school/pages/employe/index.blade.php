@extends('school.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}">
@endsection

@section('content')
<div class="row">
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
                    <option value="">SMKN 1 MALANG</option>
                    <option value="">SMKN 1 KEPANJEN</option>
                </select>

                <select name="" class="form-select" id="search-status">
                    <option value="">Tampilkan semua</option>
                    <option value="">Terbaru</option>
                    <option value="">Terlama</option>
                </select>
            </div>
        </form>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#modal-import">
                Import Pegawai
            </button>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah Pegawai
            </button>
        </div>
    </div>
</div>

<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead>
            <tr>
                <th>Pegawai</th>
                <th>Email</th>
                <th>Kelamin</th>
                <th>Status</th>
                <th>NIP</th>
                <th>RFID</th>
                {{-- <th>Tipe Pegawai</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($staffs as $staff)
                <tr>
                    <td>
                        <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                        {{ $staff->user->name }}
                    </td>
                    <td>{{ $staff->user->email }}</td>
                    <td>{{ $staff->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}</td>
                    <td>{{ $staff->active == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>{{ $staff->nip }}</td>
                    <td>{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : '-' }}</td>
                    {{-- <td>
                        <span class="mb-1 badge px-4 font-medium bg-light-primary text-primary">Staff</span>
                    </td> --}}
                    <td>
                        <div class="category-selector btn-group">
                            <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                <div class="category">
                                    <div class="category-business"></div>
                                    <div class="category-social"></div>
                                    <span class="more-options text-dark">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right category-menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 23.2px, 0px);" data-popper-placement="bottom-end">
                                <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                    <i class="fs-4 ti ti-eye"></i>Detail
                                </a>
                                <button class="btn-edit note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3" data-bs-toggle="modal" data-bs-target="#modal-update">
                                    <i class="fs-4 ti ti-edit"></i>Edit
                                </button>
                                <button data-id="{{ $staff->id }}" class="btn-delete note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3">
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

<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Import Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card p-3" style="background-color: #FFF5E3;">
                    <div>
                        <h5 class="text-warning">Informasi</h5>
                    </div>
                    <div>
                        <ul style="list-style-type: disc;" class="ms-4">
                            <li>Jika pegawai tidak terimport maka kemungkinan email pegawai tersebut telah digunakan.</li>
                            <li>File yang dapat diunggah berupa file excel berekstensi xls, xlsx.</li>
                            <li>Password pegawai secara default adalah NIK.</li>
                            <li>Format pengisian file excel seperti dibawah ini.</li>
                        </ul>
                    </div>
                    <div class="ms-4">
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="17" height="17" viewBox="0 0 256 256"><path fill="white" d="m213.66 82.34l-56-56A8 8 0 0 0 152 24H56a16 16 0 0 0-16 16v176a16 16 0 0 0 16 16h144a16 16 0 0 0 16-16V88a8 8 0 0 0-2.34-5.66M160 51.31L188.69 80H160ZM200 216H56V40h88v48a8 8 0 0 0 8 8h48zm-42.34-82.34L139.31 152l18.35 18.34a8 8 0 0 1-11.32 11.32L128 163.31l-18.34 18.35a8 8 0 0 1-11.32-11.32L116.69 152l-18.35-18.34a8 8 0 0 1 11.32-11.32L128 140.69l18.34-18.35a8 8 0 0 1 11.32 11.32"/></svg>
                            Download Format Excel
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">File Excel</label>
                    <input type="file" class="form-control">
                    @error('')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahPegawai" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPegawai">Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="wizard-content">
                        <form action="{{ route('employe.store') }}" class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-uid-0" method="POST" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <!-- Step 1 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-12">
                                        <label for="">Foto Pegawai ( opsional )</label>
                                        <input type="file" name="image" id="" class="form-control mb-3">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="name" class="form-control mb-3" value="{{ old('name') }}">
                                            @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIP</label>
                                            <input type="number" name="nip" class="form-control mb-3" value="{{ old('nip') }}">
                                            @error('nip')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select name="religion_id" id="" class="form-select">
                                                @foreach ($religions as $religion)
                                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('religion_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" name="birth_date" class="form-control mb-3" value="{{ old('birth_date') }}">
                                            @error('birth_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="birth_place" value="{{ old('birth_place') }}">
                                            @error('birth_place')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jenis Kelamin</label>
                                        <div class="form-check d-flex align-items-center mt-2">
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationA" name="gender" value="male">
                                                <label class="custom-control-label" for="customControlValidationA">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationB" name="gender" value="famale">
                                                <label class="custom-control-label" for="customControlValidationB">Perempuan</label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn btn-primary next-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" name="nik" class="form-control mb-3" value="{{ old('nik') }}">
                                            @error('nik')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telp</label>
                                            <input type="text" name="phone_number" class="form-control mb-3" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control mb-3" value="{{ old('email') }}">
                                            @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="active" id="" class="form-select mb-3">
                                                <option value="1">Aktif</option>
                                                <option value="0">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Alamat</h6>
                                            <textarea name="address" class="form-control mb-3" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                    <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-step">Simpan</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button> --}}
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="editPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPegawaiLabel">Edit Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="">
                    <div class="wizard-content">
                        <form id="editForm" class="tab-wizard wizard-circle wizard clearfix" role="application" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 1 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-12">
                                        <label for="fotoPegawai">Foto Pegawai</label>
                                        <input type="file" name="fotoPegawai" id="fotoPegawai" class="form-control mb-3">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control mb-3" value="{{ old('name') }}">
                                            @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="number" name="nip" class="form-control mb-3" value="{{ old('nip') }}">
                                            @error('nip')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select name="agama" id="agama" class="form-select">
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                            @error('agama')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control mb-3" value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jenis Kelamin</label>
                                        <div class="form-check d-flex align-items-center mt-2">
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationA" name="accreditation" value="Akreditasi A">
                                                <label class="custom-control-label" for="customControlValidationA">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationB" name="accreditation" value="Akreditasi B">
                                                <label class="custom-control-label" for="customControlValidationB">Perempuan</label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn btn-primary next-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            {{-- <h6>Billing & Address</h6> --}}
                            <section>

                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" class="form-control mb-3">
                                            @error('province_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telp</label>
                                            <input type="text" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control mb-3">
                                            @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="" id="" class="form-select mb-3">
                                                <option value="">Aktif</option>
                                                <option value="">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Alamat</h6>
                                            <textarea name="address" class="form-control mb-3" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                    <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-step">Simpan</button>
                                </div>
                            </section>

                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button> --}}
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('admin_assets/dist/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('admin_assets/dist/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin_assets/dist/js/forms/form-wizard.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var currentSection = 0;
        var sections = $("form > section");
        var steps = $(".steps li");

        sections.hide();
        sections.eq(currentSection).show();

        $(".next-step").click(function() {
            if (currentSection < sections.length - 1) {
                sections.eq(currentSection).hide();
                steps.eq(currentSection).removeClass("current").addClass("done");
                currentSection++;
                sections.eq(currentSection).show();
                steps.eq(currentSection).removeClass("disabled").addClass("current");
            }
        });

        $(".prev-step").click(function() {
            if (currentSection > 0) {
                sections.eq(currentSection).hide();
                steps.eq(currentSection).removeClass("current").addClass("disabled");
                currentSection--;
                sections.eq(currentSection).show();
                steps.eq(currentSection).removeClass("done").addClass("current");
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        var currentEditSection = 0;
        var editSections = $("#editForm > section");
        var editSteps = $("#editSteps li");

        editSections.hide();
        editSections.eq(currentEditSection).show();

        $(".next-edit-step").click(function() {
            if (currentEditSection < editSections.length - 1) {
                editSections.eq(currentEditSection).hide();
                editSteps.eq(currentEditSection).removeClass("current").addClass("done");
                currentEditSection++;
                editSections.eq(currentEditSection).show();
                editSteps.eq(currentEditSection).removeClass("disabled").addClass("current");
            }
        });

        $(".prev-edit-step").click(function() {
            if (currentEditSection > 0) {
                editSections.eq(currentEditSection).hide();
                editSteps.eq(currentEditSection).removeClass("current").addClass("disabled");
                currentEditSection--;
                editSections.eq(currentEditSection).show();
                editSteps.eq(currentEditSection).removeClass("done").addClass("current");
            }
        });
    });
</script>

@endsection
