@extends('school.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <form class="d-flex gap-2">
                    <div class="position-relative">
                        <div class="">
                            <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5"
                                id="search-name" placeholder="Cari">
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
                <button type="button" class="btn mb-1 btn-primary btn-lg px-4 fs-4 font-medium" data-bs-toggle="modal"
                    data-bs-target="#modal-import">
                    Tambah Guru
                </button>
            </div>
        </div>
    </div>


    <!-- modal tambah -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Foto Guru</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Nama</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Status</label>
                                <select id="pengajar" class="form-select" name="active">
                                    <option value="true">Aktif</option>
                                    <option value="false">Nonaktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">NIP</label>
                                <input type="text" class="form-control" name="nip">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">RFID</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 pt-3">Jenis Kelamin</label>
                                <select id="pengajar" class="form-select" name="genre">
                                    <option value="famale">Perempuan</option>
                                    <option value="male">Laki-Laki</option>
                                </select>
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
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
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
                            <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30"
                                height="30" alt="" />
                            {{ $teacher->user->name }}
                        </td>
                        <td>{{ $teacher->gender }}</td>
                        <td>Aktif</td>
                        <td>{{ $teacher->nip }}</td>
                        <td>1234567</td>
                        <td>
                            <span class="mb-1 badge px-4 font-medium bg-light-primary text-primary">{{ $teacher->classroom->count() }} Pelajaran</span>
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
                                    <a href="{{ route('detail-teacher.index') }}"
                                        class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-eye"></i>Detail
                                    </a>
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
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Foto Guru</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Nama</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status</label>
                            <select id="pengajar" class="form-select">
                                <option value="2">Aktif</option>
                                <option value="3">Nonaktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">NIP</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">RFID</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Jenis Kelamin</label>
                            <select id="pengajar" class="form-select">
                                <option value="2">Perempuan</option>
                                <option value="3">Laki-Laki</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
