@extends('school.layouts.app')

@section('content')
<div class="card bg-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold text-white mb-8">Siswa</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="javascript:void(0)">Daftar - daftar siswa dan alumni di Sekolah</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" href="#pills-student" role="tab" aria-controls="pills-student" aria-selected="true">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 16 16">
                <path fill="currentColor" d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" /></svg>
            Siswa
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-alumni-tab" data-bs-toggle="pill" href="#pills-alumni" role="tab" aria-controls="pills-alumni" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="me-1 mb-1" width="18" height="18" viewBox="0 0 1024 1024">
                <path fill="currentColor" d="M990.848 696.304V438.16l16.096-8.496c10.464-5.44 17.055-16.225 17.183-28.032c.128-11.777-6.256-22.689-16.592-28.368l-481.44-257.6c-9.631-5.28-21.28-5.249-30.976.095l-478.8 257.92C6.126 379.36-.177 390.143-.113 401.84s6.496 22.4 16.817 27.97l210.384 111.983c-2.64 4.656-4.272 9.968-4.272 15.696v270.784a32.03 32.03 0 0 0 10.72 23.904c6.945 6.16 73.441 60.096 276.753 60.096c202.592 0 270.88-50.976 278-56.784c7.44-6.064 11.744-15.152 11.744-24.784V552.976c0-4.496-.944-8.768-2.608-12.64l129.424-68.369V696.48c-18.976 11.104-31.84 31.472-31.84 55.024c0 35.344 28.656 64 64 64s64-28.656 64-64c0-23.697-13.04-44.145-32.16-55.2zM736.031 812.368c-25.152 12.096-91.712 35.904-225.744 35.904c-134.88 0-199.936-25.344-223.472-37.536V573.6l207.808 110.624a31.896 31.896 0 0 0 15.184 3.84a31.675 31.675 0 0 0 14.816-3.664l211.408-111.664zM510.063 619.81l-411.6-218.561l412.32-220.976l413.6 220.336z" /></svg>
            Alumni
        </a>
    </li>
</ul>

<div class="tab-content mt-4" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
      @include('school.new.student.panes.tab-student')
    </div>
    <div class="tab-pane fade" id="pills-alumni" role="tabpanel" aria-labelledby="pills-alumni-tab">
      @include('school.new.student.panes.tab-alumni')
    </div>
</div>


<!-- tambah modal -->
<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body mx-3" style="max-height: 70vh; overflow-y: auto;">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div id="imagePreview" class="mt-2 col-4 mb-2"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="formFile" class="mb-1">Foto Siswa <span class="text-danger">(ekstensi png, jpg, jpeg)</span></label>
                                    <input class="form-control" name="image" type="file" id="formFile" onchange="previewImage(event)">
                                    @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="name" class="mb-2">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="text" name="name" class="form-control mb-3" placeholder="Masukkan nama" value="{{ old('name') }}">
                                    @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="text" name="email" class="form-control mb-3" placeholder="Masukkan email" value="{{ old('email') }}">
                                    @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">NISN <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="text" name="nisn" class="form-control" placeholder="Masukkan nisn" value="{{ old('nisn') }}">
                                    @error('nisn')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2 ">Agama <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <select id="religion" name="religion_id" class="form-select">
                                        <option selected>Pilih...</option>
                                        <option value="">Islam</option>
                                    </select>
                                    @error('religion_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Jenis kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option selected>Pilih...</option>
                                        <option value="male">Laki-Laki</option>
                                        <option value="famale">Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="birth_place" class="mb-2">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="text" name="birth_place" class="form-control" placeholder="Masukkan tempat lahir" value="{{ old('birth_place') }}">
                                    @error('birth_place')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="birth_date" class="mb-2">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                                    @error('birth_date')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="nik" class="mb-2">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="number" name="nik" class="form-control" placeholder="Masukkan nik" value="{{ old('nik') }}">
                                    @error('nik')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="number_kk" class="mb-2">Nomor KK <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="number" name="number_kk" class="form-control" placeholder="Masukkan nomer kk" value="{{ old('number_kk') }}">
                                    @error('number_kk')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="number_akta" class="mb-2">Nomor Akta <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="number" name="number_akta" class="form-control" placeholder="Masukkan nomer akta" value="{{ old('number_akta') }}">
                                    @error('number_akta')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="order_child" class="mb-2">Anak Ke- <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="number" name="order_child" class="form-control" placeholder="Anak ke-" value="{{ old('order_child') }}">
                                    @error('order_child')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="count_siblings" class="mb-2">Jumlah Saudara <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <input type="number" name="count_siblings" class="form-control" placeholder="Jumlah saudara" value="{{ old('count_siblings') }}">
                                    @error('count_siblings')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label for="address" class="mb-2">Alamat <span class="text-danger" style="font-size: larger;">*</span></label>
                                <textarea placeholder="Masukkan alamat" name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                                @error('address')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$students" />
    </div> --}}

<!-- edit modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Edit Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div id="studentImagePreview" class="mt-2 col-4 mb-2"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="formFile" class="mb-2">Foto Siswa <span class="text-danger">(ekstensi png, jpg, jpeg)</span></label>
                                    <input class="form-control mb-3" name="image" type="file" id="studentImageInput" onchange="previewStudentImage(event)">
                                    @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="name-edit" class="mb-2">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name-edit" class="form-control mb-3" placeholder="Masukkan nama" value="{{ old('name') }}">
                                    @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="email-edit" class="mb-2">Email<span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email-edit" class="form-control mb-3" placeholder="Masukkan email" value="{{ old('email') }}">
                                    @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="nisn-edit" class="mb-2">NISN<span class="text-danger">*</span></label>
                                    <input type="text" name="nisn" id="nisn-edit" class="form-control" placeholder="Masukkan nisn" value="{{ old('nisn') }}">
                                    @error('nisn')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="religion-edit" class="mb-2">Agama<span class="text-danger">*</span></label>
                                    <select id="religion-edit" name="religion_id" class="form-select">
                                        <option value="">Islam</option>
                                    </select>
                                    @error('religion_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="gender-edit" class="mb-2">Jenis kelamin<span class="text-danger">*</span></label>
                                    <select id="gender-edit" name="gender" class="form-select">
                                        <option value="male">Laki-Laki</option>
                                        <option value="famale">Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="birth_place-edit" class="mb-2">Tempat Lahir<span class="text-danger">*</span></label>
                                    <input type="text" name="birth_place" id="birth_place-edit" placeholder="Masukkan tempat lahir" class="form-control" value="{{ old('birth_place') }}">
                                    @error('birth_place')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="birth_date-edit" class="mb-2">Tanggal Lahir<span class="text-danger">*</span></label>
                                    <input type="date" name="birth_date" id="birth_date-edit" class="form-control" value="{{ old('birth_date') }}">
                                    @error('birth_date')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="nik-edit" class="mb-2">NIK<span class="text-danger">*</span></label>
                                    <input type="number" name="nik" id="nik-edit" class="form-control" placeholder="Masukkan nik" value="{{ old('nik') }}">
                                    @error('nik')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="number_kk-edit" class="mb-2">Nomor KK<span class="text-danger">*</span></label>
                                    <input type="number" name="number_kk" id="number_kk-edit" class="form-control" placeholder="Masukkan nomer kk" value="{{ old('number_kk') }}">
                                    @error('number_kk')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="number_akta-edit" class="mb-2">Nomor Akta<span class="text-danger">*</span></label>
                                    <input type="number" name="number_akta" id="number_akta-edit" placeholder="Masukkan nomer akta" class="form-control" value="{{ old('number_akta') }}">
                                    @error('number_akta')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="order_child-edit" class="mb-2">Anak Ke-<span class="text-danger">*</span></label>
                                    <input type="number" name="order_child" id="order_child-edit" placeholder="Anak ke-" class="form-control" value="{{ old('order_child') }}">
                                    @error('order_child')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="count_siblings-edit" class="mb-2">Jumlah Saudara<span class="text-danger">*</span></label>
                                    <input type="number" name="count_siblings" id="count_siblings-edit" placeholder="Masukkan jumlah saudara" class="form-control" value="{{ old('count_siblings') }}">
                                    @error('count_siblings')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label for="address-edit" class="mb-2">Alamat<span class="text-danger">*</span></label>
                                <textarea name="address" id="address-edit" class="form-control" placeholder="Masukkan alamat">{{ old('address') }}</textarea>
                                @error('address')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-success">Simpan</button>
                </div>
            </form>
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
                            <p class="ms-3" id="name"></p>
                        </div>
                        <div class="form-group">
                            <h6 for="" class="mb-2">RFID : <span id="rfid"></span></h6>
                            <p>Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                            <input type="text" id="rfid-input" name="rfid" class="form-control" placeholder="Masukkan RFID">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
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
                <h5 class="modal-title" id="importPegawai">Detail Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img id="image-detail" src="" class="rounded-circle user-profile mb-3" style="object-fit: cover; width: 150px; height: 150px;" alt="User Profile Picture" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <div class="d-flex " style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Nama:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="name-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Email:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="email-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Jenis Kelamin:</h6>
                            <p class="ms-2" style="margin-bottom: 0;">Laki - laki</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">NIK:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="nik-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">RFID:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="rfid-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Alamat:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="address-detail"></p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<x-delete-modal-component />
@endsection
