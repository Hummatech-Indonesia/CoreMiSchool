@extends('school.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5" id="search-name" placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <select name="" class="form-select" id="search-status">
                        <option value="">Aktif</option>
                        <option value="">Tidak Aktif</option>
                    </select>

                    <select name="" class="form-select" id="search-status">
                        <option value="">Tampilkan semua</option>
                        <option value="">Pegawai</option>
                        <option value="">Guru</option>
                    </select>
                </div>
            </form>
            <button type="button" class="btn mb-1 btn-primary btn-lg px-4 fs-4 font-medium" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah Guru
            </button>
        </div>
    </div>
</div>


<!-- modal tambah -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="guru" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guru">Tambah Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="wizard-content">
                        <form action="{{ route('teacher.store') }}" class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-uid-0" method="POST" enctype="multipart/form-data">
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

<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Import Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div>
                        <h5 class="text-warning">Informasi</h5>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="question" class="form-label">Pertanyaan:</label>

                    @error('question')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead>
            <tr>
                <th>Guru</th>
                <th>Kelamin</th>
                <th>Status</th>
                <th>NIP</th>
                <th>RFID</th>
                <th>Jumlah Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
            <tr>
                <td>
                    <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                    {{ $teacher->user->name }}
                </td>
                <td>{{ $teacher->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}</td>
                <td>{{ $teacher->active == 1 ? 'Aktif' : 'Tidak aktif' }}</td>
                <td>{{ $teacher->nip }}</td>
                <td>{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : '-' }}
                    <button type="submit" class="btn btn-rounded btn-light-warning text-warning ms-2"
                        data-bs-toggle="modal" data-bs-target="#modal-rfid">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                        </svg>
                    </button>

                </td>
                <td>
                    <span class="mb-1 badge px-4 font-medium bg-light-primary text-primary">
                        {{ $teacher->teacherMaples ? $teacher->teacherMaples->count() : '0' }}
                        Pelajaran</span>
                </td>
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
                            <button data-bs-toggle="modal" data-bs-target="#modal-detail"
                                class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-eye"></i>Detail
                            </button>
                            <button type="button" class="btn-edit note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                            data-id="{{ $teacher->id }}" data-name="{{ $teacher->user->name }}" data-email="{{ $teacher->user->email }}"
                            data-gender="{{ $teacher->gender }}" data-status="{{ $teacher->active }}" data-nip="{{ $teacher->nip }}"
                            data-nik="{{ $teacher->nik }}" data-birth_date="{{ $teacher->birth_date }}" data-birth_place="{{ $teacher->birth_place }}"
                            data-phone="{{ $teacher->phone_number }}" data-address="{{ $teacher->address }}" data-religion="{{ $teacher->religion_id }}">
                                <i class="fs-4 ti ti-edit"></i>Edit
                            </button>
                            <button type="button" class="btn-delete note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3" data-id="{{ $teacher->id }}">
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

<x-delete-modal-component/>

<!-- modal edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="editPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPegawaiLabel">Edit Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="">
                    <div class="wizard-content">
                        <form id="form-edit" class="tab-wizard wizard-circle wizard clearfix" role="application" method="POST" enctype="multipart/form-data">
                            @method('put')
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
                                            <input type="text" name="name" id="name-edit" class="form-control mb-3" value="{{ old('name') }}">
                                            @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIP</label>
                                            <input type="number" name="nip" id="nip-edit" class="form-control mb-3" value="{{ old('nip') }}">
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
                                            <input type="date" name="birth_date" id="birth_date-edit" class="form-control mb-3" value="{{ old('birth_date') }}">
                                            @error('birth_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="birth_place-edit" name="birth_place" value="{{ old('birth_place') }}">
                                            @error('birth_place')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jenis Kelamin</label>
                                        <div class="form-check d-flex align-items-center mt-2">
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="maleEdit" name="gender" value="male">
                                                <label class="custom-control-label" for="customControlValidationA">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="famaleEdit" name="gender" value="famale">
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
                                            <input type="text" name="nik" id="nik-edit" class="form-control mb-3" value="{{ old('nik') }}">
                                            @error('nik')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telp</label>
                                            <input type="text" name="phone_number" id="phone-edit" class="form-control mb-3" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="email-edit" class="form-control mb-3" value="{{ old('email') }}">
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

<!-- tambah rfid -->
<div class="modal fade" id="modal-rfid" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah RFID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="form-group d-flex">
                        <h6 for="" class="mb-2">Nama : </h6>
                        <p class="ms-3">Olivia Rhye</p>
                    </div>
                    <div class="form-group">
                        <h6 for="" class="mb-2">RFID :</h6>
                        <p>Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                        <input type="text" class="form-control" placeholder="Masukkan RFID">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                    data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
            </div>
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
                        <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                            class="rounded-circle user-profile mb-3"
                            style="object-fit: cover; width: 150px; height: 150px;" alt="User Profile Picture" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Nama:</h6>
                            <p class="ms-2" style="margin-bottom: 0;">Suyadi Oke</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Email:</h6>
                            <p class="ms-2" style="margin-bottom: 0;">suyadi@gmail.com</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">No Telepon:</h6>
                            <p class="ms-2" style="margin-bottom: 0;">089121289098</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Jenis Kelamin:</h6>
                            <p class="ms-2" style="margin-bottom: 0;">Laki - laki</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">NIP:</h6>
                            <p class="ms-2" style="margin-bottom: 0;">123123123</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">RFID:</h6>
                            <p class="ms-2" style="margin-bottom: 0;">123123123</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between text-start">
                            <h6 style="margin-bottom: 0;">Alamat:</h6>
                            <p class="ms-2 text-muted text-end text-break" style="margin-bottom: 0;">jl. sembarang,
                                desa. opowae, kec. kepanjen, kab. Malang</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-between text-start">
                            <h6 style="margin-bottom: 0;">Jumlah Mata Pelajaran:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;">4 Mata Pelajaran</p>
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

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var gender = $(this).data('gender');
        var status = $(this).data('status');
        var nip = $(this).data('nip');
        var nik = $(this).data('nik');
        var birth_date =  $(this).data('birth_date');
        var birth_place = $(this).data('birth_place');
        var phone = $(this).data('phone');
        var address = $(this).data('address');
        var religion = $(this).data('religion');
        $('#form-edit').attr('action', '{{ route('teacher.update', "") }}/' + id);
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
        $('#modal-edit').modal('show');
    });

    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/school/delete-teacher/' + id);
        $('#modal-delete').modal('show');
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
        var editSections = $("#form-edit > section");
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
