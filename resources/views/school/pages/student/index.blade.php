@extends('school.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div class="col-12 col-md-6 col-lg-2 me-3">
            <form action="" class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <button type="button" class="btn mb-1 btn-sm waves-effect waves-light btn-rounded btn-primary"
            data-bs-toggle="modal" data-bs-target="#modal-import">
            Tambah Siswa
        </button>
    </div>

    <!-- tambah modal -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school-student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Foto Siswa</label>
                                        <input class="form-control mb-3" name="image" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Nama</label>
                                        <input type="text" name="name" class="form-control mb-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Email</label>
                                        <input type="text" name="email" class="form-control mb-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">NISN</label>
                                        <input type="text" name="nisn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2 ">Agama</label>
                                        <select id="religion" name="religion_id" class="form-select">
                                            <option selected>Pilih...</option>
                                            @forelse ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @empty
                                                <option disabled>Tidak ditemukan</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Jenis kelamin</label>
                                        <select id="gender" name="gender" class="form-select">
                                            <option selected>Pilih...</option>
                                            <option value="male">Laki-Laki</option>
                                            <option value="famale">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Tempat Lahir</label>
                                        <input type="text" name="nisn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Tanggal Lahir</label>
                                        <input type="date" name="nisn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">NIK</label>
                                        <input type="number" name="nisn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Nomor KK</label>
                                        <input type="number" name="nisn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Nomor Akta</label>
                                        <input type="number" name="nisn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Anak Ke -</label>
                                        <input type="number" name="nisn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Jumlah Saudara</label>
                                        <input type="number" name="nisn" class="form-control">
                                    </div>
                                </div>
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


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">NISN</th>
                    <th class="fs-4 fw-semibold mb-0">Jenis Kelamin</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>
                            <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30"
                                height="30" alt="" />
                            {{ $student->user->name }}
                        </td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->gender->value == 'famale' ? 'Perempuan' : 'Laki-laki' }}</td>
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
                                    <a href="#"
                                        class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                        data-bs-toggle="modal" data-bs-target="#modal-edit">
                                        <i class="fs-4 ti ti-edit"></i>Edit
                                    </a>

                                    <a
                                        class="note-business badge-group-item badge-business dropdown-item text-danger position-relative category-business d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-trash"></i>Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Siswa belum ditambahkan</td>
                    </tr>
                @endforelse
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

    <!-- edit modal -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Foto Siswa</label>
                                    <input class="form-control mb-3" name="image" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Nama</label>
                                    <input type="text" name="name" class="form-control mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Email</label>
                                    <input type="text" name="email" class="form-control mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">NISN</label>
                                    <input type="text" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2 ">Agama</label>
                                    <select id="religion" name="religion_id" class="form-select">
                                        <option selected>Pilih...</option>
                                        @forelse ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                        @empty
                                            <option disabled>Tidak ditemukan</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Jenis kelamin</label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option selected>Pilih...</option>
                                        <option value="male">Laki-Laki</option>
                                        <option value="famale">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tempat Lahir</label>
                                    <input type="text" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tanggal Lahir</label>
                                    <input type="date" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">NIK</label>
                                    <input type="number" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Nomor KK</label>
                                    <input type="number" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Nomor Akta</label>
                                    <input type="number" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Anak Ke -</label>
                                    <input type="number" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">Jumlah Saudara</label>
                                    <input type="number" name="nisn" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button> --}}
                    <button type="submit" class="btn btn-rounded btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    @include('components.delete-modal-component')
@endsection
