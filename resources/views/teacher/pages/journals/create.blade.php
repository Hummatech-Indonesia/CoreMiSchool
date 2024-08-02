@extends('teacher.layouts.app')
@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8 text-dark">Jurnal dan Absensi</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-dark fs-3" aria-current="page">{{ auth_user()->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <h4>Tambah Jurnal</h4>
            {{-- <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="name" value="{{ old('name', request('name')) }}" class="form-control search-chat py-2 px-5 ps-5" id="search-name" placeholder="Cari">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
            <div class="d-flex gap-2">
                <div class="form-group">
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form> --}}
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('teacher.journals.index') }}" type="button" class="btn mb-1 btn-light-secondary">
                    Kembali
                </a>
                <a href="#" type="button" class="btn mb-1 btn-success">
                    Simpan Laporan
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body pt-3">
            <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
                <div class="card-body px-4 py-4">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-8 text-dark">Perhatian</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-dark fs-3" aria-current="page">Jika semua siswa hadir
                                        semua atau tidak ada yang tidak mengikuti pelajaran maka tidak perlu mengisi bagian
                                        ini</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-direction-row justify-content-between">
                <h4 class="pb-3">Daftar Siswa Tidak Mengikuti Pelajaran</h4>
                <div>
                    <button class="btn btn-md btn-primary">Tambah Siswa</button>
                </div>
            </div>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="text-white rounded-start" style="background-color: #5D87FF;">Mapel</th>
                            <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                            <th class="text-white" style="background-color: #5D87FF;">Status</th>
                            <th class="text-white rounded-end text-center" style="background-color: #5D87FF;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-rounded btn-primary p-1 ms-2 btn-rfid"
                                    data-name="teacher" data-id="1" data-rfid="3456" data-old-rfid="3456"
                                    data-role="Employee">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path
                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-rounded btn-warning p-1 ms-2 btn-rfid"
                                    data-name="teacher" data-id="1" data-rfid="3456" data-old-rfid="3456"
                                    data-role="Employee">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-rounded btn-danger p-1 ms-2 btn-rfid"
                                    data-name="teacher" data-id="1" data-rfid="3456" data-old-rfid="3456"
                                    data-role="Employee">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 6l-12 12" />
                                        <path d="M6 6l12 12" />
                                    </svg>
                                    Batalkan
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="pagination justify-content-end mt-2 mb-0">
    </div> --}}

    {{-- <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$attendances" />
    </div> --}}

    <div class="card shadow">
       <div class="card-body">
        <h4 class="fw-bold pb-3">Laporan Kegiatan</h4>

        <div class="row">
            <div class="col col-md-4">
                <div class="card">
                    <div class="card-header p-0">
                        <h4 class="bg-primary text-white fs-8 p-3 rounded">Bukti Foto</h4>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center">
                        <img class="card-img" src="{{ asset('assets/images/logo/logo-miscool.png') }}" alt="">
                        <div class="text-center"><button class="btn btn-md btn-primary">Unggah Foto</button></div>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>

    <!-- modal upload -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Upload Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                            <form class="mt-3">
                                <input class="form-control" type="file" id="formFile">
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                            <select id="pengajar" class="form-select">
                                <option value="1">izin</option>
                                <option value="2">sakit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-info">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                            <input class="form-control mb-2" type="file" id="formFile">
                            <small class="text-info">Download</small>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                            <select id="pengajar" class="form-select">
                                <option value="1">izin</option>
                                <option value="2">sakit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-info">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
