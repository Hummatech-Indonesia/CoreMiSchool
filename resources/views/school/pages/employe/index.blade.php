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
                <th>Pegawai</th>
                <th>NIP</th>
                <th>Tipe Pegawai</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                    Arya Rizki</td>
                <td>1234567</td>
                <td>
                    <span class="mb-1 badge px-4 font-medium bg-light-primary text-primary">Staff</span>
                </td>
                <td>arya@gmail.com</td>
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
                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-edit"></i>Edit
                            </a>
                            <a class="note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-trash"></i>Hapus
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                    Arya Rizki</td>
                <td>1234567</td>
                <td>
                    <span class="mb-1 badge px-4 font-medium bg-light-primary text-primary">Staff</span>
                </td>
                <td>arya@gmail.com</td>
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
                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-edit"></i>Edit
                            </a>
                            <a class="note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-trash"></i>Hapus
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                    Arya Rizki</td>
                <td>1234567</td>
                <td>
                    <span class="mb-1 badge px-4 font-medium bg-light-success text-success">Active</span>
                </td>
                <td>arya@gmail.com</td>
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
                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-edit"></i>Edit
                            </a>
                            <a class="note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-trash"></i>Hapus
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                    Arya Rizki</td>
                <td>1234567</td>
                <td>
                    <span class="mb-1 badge px-4 font-medium bg-light-primary text-primary">Staff</span>
                </td>
                <td>arya@gmail.com</td>
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
                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-edit"></i>Edit
                            </a>
                            <a class="note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3">
                                <i class="fs-4 ti ti-trash"></i>Hapus
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
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
                        <form class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-uid-0" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="steps clearfix">
                                <ul role="tablist">
                                    <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                                        <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0">
                                            <span class="current-info audible">current step: </span>
                                            <span class="step">1</span>
                                        </a>
                                    </li>
                                    <li role="tab" class="disabled" aria-disabled="true">
                                        <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
                                            <span class="step">2</span>
                                        </a>
                                    </li>
                                    <li role="tab" class="disabled" aria-disabled="true">
                                        <a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2">
                                            <span class="step">3</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
    
                            <!-- Step 1 -->
                            {{-- <h6>Informasi Umum</h6> --}}
                            <section>
                                <div class="row mx-3 pt-4">
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
                                            <input type="agama" name="agama" class="form-control mb-3" value="{{ old('agama') }}">
                                            @error('agama')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control mb-3" value="{{ old('tanggal_lahir') }}">
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
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-step">Berikutnya</button>
                                </div>
                            </section>
    
                            <!-- Step 3 -->
                            {{-- <h6>Review Order</h6> --}}
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="head_school" value="{{ old('head_school') }}" class="form-control mb-3">
                                            @error('head_school')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tipe Pegawai</label>
                                            <select name="" id="" class="form-select mb-3">
                                                <option value="">Tipe pegawai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="mb-3">Status Kewarganegaraan</label>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="accreditation" value="Akreditasi A">
                                                <label class="custom-control-label" for="customControlValidation2">WNI</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation3" name="accreditation" value="Akreditasi B">
                                                <label class="custom-control-label" for="customControlValidation3">WNA</label>
                                            </div>
                                        </div>
                                        @error('accreditation')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
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
@endsection
