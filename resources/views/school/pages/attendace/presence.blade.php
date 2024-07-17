@extends('school.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="name" value="{{ old('name', request('name')) }}" class="form-control search-chat py-2 px-5 ps-5" id="search-name"
                            placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <select name="year" class="form-select w-auto" id="search-status" style="width: 150px;">
                        {{-- <option value="">Select Year</option> --}}
                        @foreach($schoolYears as $year)
                            <option value="{{ $year->school_year }}">{{ $year->school_year }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <input type="date" name="created_at" class="form-control" value="{{ request('created_at') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>

                </div>
            </form>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <a href="/school/presence-student" type="button" class="btn mb-1 btn-success btn-lg px-4 fs-4 font-medium">
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
                    <th class="fs-4 fw-semibold mb-0">Point</th>
                    <th class="fs-4 fw-semibold mb-0">Status</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->classroomStudent->student->user->name }}</td>
                        <td>{{ $attendance->checkin }}</td>
                        <td>{{ $attendance->checkout }}</td>
                        <td>{{ $attendance->point }}</td>
                        <td>{{ $attendance->status == 'present' ? 'Masuk' : ($attendance->status == 'sick' ? 'Sakit' : ($attendance->status == 'alpha' ? 'Alpha' : ($attendance->status == 'permit' ? 'Izin' : ''))) }}</td>
                        <td>
                            <button type="button" class="btn mb-1 btn-light-primary text-primary btn-sm px-4 fs-2 font-medium"
                                data-bs-toggle="modal" data-bs-target="#modal-import">
                                Upload
                            </button>
                        </td>
                    </tr>
                @empty
                @endforelse
                {{-- <tr>
                    <td>2</td>
                    <td> Prasetyo Budi Nugroho</td>
                    <td> 07.30</td>
                    <td>16.00</td>
                    <td>1</td>
                    <td>Masuk</td>
                    <td>
                        <button type="button" class="btn mb-1 btn-primary btn-sm fs-2 font-medium" data-bs-toggle="modal"
                            data-bs-target="#modal-edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M15.75 13a.75.75 0 0 0-.75-.75H9a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 .75-.75m0 4a.75.75 0 0 0-.75-.75H9a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 .75-.75" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M7 2.25A2.75 2.75 0 0 0 4.25 5v14A2.75 2.75 0 0 0 7 21.75h10A2.75 2.75 0 0 0 19.75 19V7.968c0-.381-.124-.751-.354-1.055l-2.998-3.968a1.75 1.75 0 0 0-1.396-.695zM5.75 5c0-.69.56-1.25 1.25-1.25h7.25v4.397c0 .414.336.75.75.75h3.25V19c0 .69-.56 1.25-1.25 1.25H7c-.69 0-1.25-.56-1.25-1.25z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr> --}}
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
                    <h5 class="modal-title" id="importPegawai">Upload Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa</label>
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
                    <h5 class="modal-title" id="importPegawai">Edit Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa</label>
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
