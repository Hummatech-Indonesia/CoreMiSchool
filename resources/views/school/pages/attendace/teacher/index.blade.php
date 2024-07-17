@extends('school.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="search" class="form-control search-chat py-2 px-5 ps-5" id="search-name"
                            placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <select name="" class="form-select" id="search-status">
                        <option value="">Tahun Ajaran</option>
                        <option value="">2023/2024</option>
                    </select>

                    <form class="mt-4">
                        <div class="form-group">
                            <input type="date" class="form-control" value="2018-05-13">
                        </div>
                    </form>
                </div>
            </form>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('presence-teacher.export-preview') }}" type="button" class="btn mb-1 btn-success">
                    Export
                </a>
            </div>
        </div>
    </div>


    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Masuk</th>
                    <th class="fs-4 fw-semibold mb-0">Pulang</th>
                    <th class="fs-4 fw-semibold mb-0">Status</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse (range(1,6) as $attendance)
                    <tr>
                        <td>1</td>
                        <td>Guru</td>
                        <td>07.00</td>
                        <td>16.00</td>
                        <td>Masuk</td>
                        <td>
                            <button type="button" class="btn mb-1 btn-light-primary text-primary btn-sm px-4 fs-2 font-medium"
                                data-bs-toggle="modal" data-bs-target="#modal-import">
                                Upload
                            </button>
                        </td>
                    </tr>
                @empty
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

    <!-- modal upload -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Upload Surat Izin Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin Guru</label>
                            <form class="mt-3">
                                <input class="form-control" type="file" id="formFile">
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status</label>
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
                    <h5 class="modal-title" id="importPegawai">Edit Surat Izin Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin Guru</label>
                            <input class="form-control mb-2" type="file" id="formFile">
                            <small class="text-info">Download</small>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status</label>
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
