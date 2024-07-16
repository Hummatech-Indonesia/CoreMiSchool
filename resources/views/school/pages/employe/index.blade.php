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
    <div class="row">
        <div class="col-lg-6 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="search" class="form-control search-chat py-2 px-5 ps-5" id="search-name"
                            placeholder="Cari" value="{{ old('search', request('search')) }}">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <select name="filter" class="form-select" id="search-status">
                        <option value="">Tampilkan semua</option>
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-md">filter</button>
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
                    <th>No</th>
                    <th>Pegawai</th>
                    <th>Email</th>
                    <th>Kelamin</th>
                    <th>Status</th>
                    <th>NIP</th>
                    <th>RFID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staffs as $staff)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $staff->image ? asset('storage/' . $staff->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30"
                                height="30" alt="{{ $staff->user->name }}" />
                            {{ $staff->user->name }}
                        </td>
                        <td>{{ $staff->user->email }}</td>
                        <td>{{ $staff->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}</td>
                        <td>{{ $staff->active == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>{{ $staff->nip }}</td>
                        <td>{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : '' }}
                            <button type="submit" class="btn btn-rounded btn-light-warning text-warning ms-2 btn-rfid"
                                data-id="{{ $staff->id }}" data-role="staff"
                                data-rfid="{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : '' }}"
                                data-name="{{ $staff->user->name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <div class="category-selector btn-group position-relative">
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
                                <div class="dropdown-menu dropdown-menu-right category-menu position-absolute"
                                    style="z-index: 1050;">
                                    <button
                                        class="btn-detail note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $staff->id }}" data-name="{{ $staff->user->name }}"
                                        data-email="{{ $staff->user->email }}" data-gender="{{ $staff->gender }}"
                                        data-status="{{ $staff->active }}" data-nip="{{ $staff->nip }}"
                                        data-nik="{{ $staff->nik }}" data-birth_date="{{ $staff->birth_date }}"
                                        data-birth_place="{{ $staff->birth_place }}"
                                        data-phone="{{ $staff->phone_number }}" data-address="{{ $staff->address }}"
                                        data-religion="{{ $staff->religion_id }}"
                                        data-rfid="{{ $staff->modelHasRfid ? $staff->modelHasRfid->rfid : 'Tidak ada' }}"
                                        data-image="{{ $staff->image ? asset('storage/' . $staff->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}">
                                        <i class="fs-4 ti ti-eye"></i>Detail
                                    </button>
                                    <button type="button"
                                        class="btn-edit note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-id="{{ $staff->id }}" data-name="{{ $staff->user->name }}"
                                        data-email="{{ $staff->user->email }}" data-gender="{{ $staff->gender }}"
                                        data-status="{{ $staff->active }}" data-nip="{{ $staff->nip }}"
                                        data-nik="{{ $staff->nik }}" data-birth_date="{{ $staff->birth_date }}"
                                        data-birth_place="{{ $staff->birth_place }}"
                                        data-phone="{{ $staff->phone_number }}" data-address="{{ $staff->address }}"
                                        data-religion="{{ $staff->religion_id }}">
                                        <i class="fs-4 ti ti-edit"></i>Edit
                                    </button>
                                    <button data-id="{{ $staff->id }}"
                                        class="btn-delete note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-trash"></i>Hapus
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Belum ada data
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- modal import -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Import Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('employe.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card p-3" style="background-color: #FFF5E3;">
                            <div>
                                <h5 class="text-warning">Informasi</h5>
                            </div>
                            <div>
                                <ul style="list-style-type: disc;" class="ms-4">
                                    <li>Jika pegawai tidak terimport maka kemungkinan email pegawai tersebut telah digunakan.
                                    </li>
                                    <li>File yang dapat diunggah berupa file excel berekstensi xls, xlsx.</li>
                                    <li>Password pegawai secara default adalah NIK.</li>
                                    <li>Format pengisian file excel seperti dibawah ini.</li>
                                </ul>
                            </div>
                            <div class="ms-4">
                                <a href="{{ route('employe.download-template') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="17" height="17"
                                        viewBox="0 0 256 256">
                                        <path fill="white"
                                            d="m213.66 82.34l-56-56A8 8 0 0 0 152 24H56a16 16 0 0 0-16 16v176a16 16 0 0 0 16 16h144a16 16 0 0 0 16-16V88a8 8 0 0 0-2.34-5.66M160 51.31L188.69 80H160ZM200 216H56V40h88v48a8 8 0 0 0 8 8h48zm-42.34-82.34L139.31 152l18.35 18.34a8 8 0 0 1-11.32 11.32L128 163.31l-18.34 18.35a8 8 0 0 1-11.32-11.32L116.69 152l-18.35-18.34a8 8 0 0 1 11.32-11.32L128 140.69l18.34-18.35a8 8 0 0 1 11.32 11.32" />
                                    </svg>
                                    Download Format Excel
                                </a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">File Excel</label>
                            <input type="file" class="form-control" name="file">
                            @error('')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal tambah -->
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
                            <form action="{{ route('employe.store') }}" class="tab-wizard wizard-circle wizard clearfix"
                                role="application" id="steps-uid-0" method="POST" enctype="multipart/form-data">
                                @method('post')
                                @csrf
                                <!-- Step 1 -->
                                <section>
                                    <div class="row mx-3 pt-4">
                                        <div class="col-md-12">
                                            <label for="">Foto Pegawai ( opsional )</label>
                                            <input type="file" name="image" id=""
                                                class="form-control mb-3">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="name" class="form-control mb-3"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">NIP</label>
                                                <input type="number" name="nip" class="form-control mb-3"
                                                    value="{{ old('nip') }}">
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
                                                        <option value="{{ $religion->id }}">{{ $religion->name }}
                                                        </option>
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
                                                <input type="date" name="birth_date" class="form-control mb-3"
                                                    value="{{ old('birth_date') }}">
                                                @error('birth_date')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="birth_place"
                                                    value="{{ old('birth_place') }}">
                                                @error('birth_place')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Jenis Kelamin</label>
                                            <div class="form-check d-flex align-items-center mt-2">
                                                <div class="custom-control custom-radio me-4">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidationA" name="gender" value="male">
                                                    <label class="custom-control-label"
                                                        for="customControlValidationA">Laki-laki</label>
                                                </div>
                                                <div class="custom-control custom-radio me-4">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidationB" name="gender" value="famale">
                                                    <label class="custom-control-label"
                                                        for="customControlValidationB">Perempuan</label>
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
                                                <input type="text" name="nik" class="form-control mb-3"
                                                    value="{{ old('nik') }}">
                                                @error('nik')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No Telp</label>
                                                <input type="text" name="phone_number" class="form-control mb-3"
                                                    value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" class="form-control mb-3"
                                                    value="{{ old('email') }}">
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
                                        <button type="button"
                                            class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                        <button type="submit"
                                            class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3">Simpan</button>
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
                            <form id="editForm" class="tab-wizard wizard-circle wizard clearfix" role="application"
                                method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <!-- Step 1 -->
                                <section>
                                    <div class="row mx-3 pt-4">
                                        <div class="col-md-12">
                                            <label for="">Foto Pegawai ( opsional )</label>
                                            <input type="file" name="image" id=""
                                                class="form-control mb-3">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="name" id="name-edit"
                                                    class="form-control mb-3" value="{{ old('name') }}">
                                                @error('name')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">NIP</label>
                                                <input type="number" name="nip" id="nip-edit"
                                                    class="form-control mb-3" value="{{ old('nip') }}">
                                                @error('nip')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Agama</label>
                                                <select name="religion_id" id="religion-edit" class="form-select">
                                                    @foreach ($religions as $religion)
                                                        <option value="{{ $religion->id }}">{{ $religion->name }}
                                                        </option>
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
                                                <input type="date" name="birth_date" id="birth_date-edit"
                                                    class="form-control mb-3" value="{{ old('birth_date') }}">
                                                @error('birth_date')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="birth_place-edit"
                                                    name="birth_place" value="{{ old('birth_place') }}">
                                                @error('birth_place')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Jenis Kelamin</label>
                                            <div class="form-check d-flex align-items-center mt-2">
                                                <div class="custom-control custom-radio me-4">
                                                    <input type="radio" class="custom-control-input" id="maleEdit"
                                                        name="gender" value="male">
                                                    <label class="custom-control-label"
                                                        for="customControlValidationA">Laki-laki</label>
                                                </div>
                                                <div class="custom-control custom-radio me-4">
                                                    <input type="radio" class="custom-control-input" id="famaleEdit"
                                                        name="gender" value="famale">
                                                    <label class="custom-control-label"
                                                        for="customControlValidationB">Perempuan</label>
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
                                                <input type="text" name="nik" id="nik-edit"
                                                    class="form-control mb-3" value="{{ old('nik') }}">
                                                @error('nik')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No Telp</label>
                                                <input type="text" name="phone_number" id="phone-edit"
                                                    class="form-control mb-3" value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" id="email-edit"
                                                    class="form-control mb-3" value="{{ old('email') }}">
                                                @error('email')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="active" id="status-edit" class="form-select mb-3">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">NonAktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h6>Alamat</h6>
                                                <textarea name="address" id="address-edit" class="form-control mb-3" rows="3">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3 mx-4">
                                        <button type="button"
                                            class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                        <button type="submit"
                                            class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3">Simpan</button>
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

    <!-- tambah rfid -->
    <div class="modal fade" id="modal-rfid" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah RFID</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-rfid" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="old_rfid" id="old_rfid_input">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group d-flex">
                                <h6 for="" class="mb-2">Nama : </h6>
                                <p class="ms-3" id="name-detail-rfid"></p>
                            </div>
                            <div class="form-group">
                                <h6 for="" class="mb-2">RFID :</h6>
                                <p>Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                                <input type="text" name="rfid" id="rfid" class="form-control"
                                    placeholder="Masukkan RFID">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal detail -->
    <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <img id="image-detail" src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                class="rounded-circle user-profile mb-3"
                                style="object-fit: cover; width: 150px; height: 150px;" alt="User Profile Picture" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">Nama:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="name-detail">Suyadi Oke</p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">Email:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="email-detail">suyadi@gmail.com</p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">No Telepon:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="phone-detail">089121289098</p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">Jenis Kelamin:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="gender-detail">Laki - laki</p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">NIP:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="nip-detail">123123123</p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex" style="margin-bottom: 0.5rem;">
                                <h6 style="margin-bottom: 0;">RFID:</h6>
                                <p class="ms-2" style="margin-bottom: 0;" id="rfid-detail">123123123</p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex text-start">
                                <h6 style="margin-bottom: 0;">Alamat:</h6>
                                <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="address-detail">jl.
                                    sembarang,
                                    desa. opowae, kec. kepanjen, kab. Malang</p>
                            </div>
                            <hr>
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
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var gender = $(this).data('gender');
            var status = $(this).data('status');
            var nip = $(this).data('nip');
            var nik = $(this).data('nik');
            var birth_date = $(this).data('birth_date');
            var birth_place = $(this).data('birth_place');
            var phone = $(this).data('phone');
            var address = $(this).data('address');
            var religion = $(this).data('religion');
            $('#editForm').attr('action', '{{ route('employe.update', '') }}/' + id);
            $('#name-edit').val(name);
            $('#email-edit').val(email);
            $('#nip-edit').val(nip);
            $('#nik-edit').val(nik);
            $('#birth_date-edit').val(birth_date);
            $('#birth_place-edit').val(birth_place);
            $('#phone-edit').val(phone);
            $('#address-edit').val(address);
            gender == 'male' ? $('#maleEdit').prop('checked', true) : $('#famaleEdit').prop('checked', true);
            $('#religion-edit').val(religion).trigger('change');
            $('#status-edit').val(status).trigger('change');
            $('#modal-update').modal('show');
        });

        $('.btn-detail').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var gender = $(this).data('gender');
            var status = $(this).data('status');
            var nip = $(this).data('nip');
            var nik = $(this).data('nik');
            var birth_date = $(this).data('birth_date');
            var birth_place = $(this).data('birth_place');
            var phone = $(this).data('phone');
            var address = $(this).data('address');
            var religion = $(this).data('religion');
            var rfid = $(this).data('rfid');
            var maple = $(this).data('maple');
            var image = $(this).data('image');
            $('#name-detail').text(name);
            $('#email-detail').text(email);
            $('#nip-detail').text(nip);
            $('#nik-detail').text(nik);
            $('#birth_date-detail').text(birth_date);
            $('#birth_place-detail').text(birth_place);
            $('#phone-detail').text(phone);
            $('#address-detail').text(address);
            $('#gender-detail').text(gender);
            $('#religion-detail').text(religion);
            $('#status-detail').text(status);
            $('#rfid-detail').text(rfid);
            $('#maple-detail').text(maple);
            $('#image-detail').attr('src', image);
            $('#modal-detail').modal('show');
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/delete-employee/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-rfid').on('click', function() {
            var id = $(this).data('id');
            var role = $(this).data('role');
            var rfid = $(this).data('rfid');
            var name = $(this).data('name');


            $('#name-detail-rfid').text(name);
            $('#form-rfid').attr('action', '/school/add-to-rfid/' + role + '/' + id);
            $('#modal-rfid').modal('show');
            $('#modal-rfid #old_rfid_input').val(rfid);
        });
    </script>

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

            $(".next-step").on('click', function() {
                if (currentEditSection < editSections.length - 1) {
                    editSections.eq(currentEditSection).hide();
                    editSteps.eq(currentEditSection).removeClass("current").addClass("done");
                    currentEditSection++;
                    editSections.eq(currentEditSection).show();
                    editSteps.eq(currentEditSection).removeClass("disabled").addClass("current");
                }
            });

            $(".prev-step").on('click', function() {
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

    <script>
        $(document).ready(function() {
            $('.category-dropdown').on('show.bs.dropdown', function() {
                $(this).closest('.table-responsive').css('overflow', 'visible');
            });

            $('.category-dropdown').on('hide.bs.dropdown', function() {
                $(this).closest('.table-responsive').css('overflow', 'auto');
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#modal-rfid').on('shown.bs.modal', function() {
                $('#rfid').focus().select();
            });
        });
    </script>
@endsection
