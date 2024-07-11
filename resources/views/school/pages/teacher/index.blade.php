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
                <td>{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : '-' }}</td>
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
                            <a href="{{ route('detail-teacher.index') }}" class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-eye"></i>Detail
                            </a>
                            <button type="button" class="btn-edit note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3" data-id="{{ $teacher->id }}" data-name="{{ $teacher->user->name }}" data-email="{{ $teacher->user->email }}" data-gender="{{ $teacher->gender }}" data-status="{{ $teacher->active }}" data-nip="{{ $teacher->nip }}" data-nik="{{ $teacher->nik }}">
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
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Edit Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="wizard-content">
                        <form action="" class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-uid-0" method="POST" enctype="multipart/form-data">
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
        $('#form-edit').attr('action', '/faq-list/' + id);
        $('#name-edit').val(name);
        $('#email-edit').val(email);
        $('#gender-edit').val(gender);
        $('#status-edit').val(status);
        $('#nip-edit').val(nip);
        $('#nik-edit').val(nik);
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
@endsection
