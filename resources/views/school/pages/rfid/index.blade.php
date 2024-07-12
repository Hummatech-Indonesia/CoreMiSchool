@extends('school.layouts.app')

@section('content')


<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link px-4 active" data-bs-toggle="tab" href="#student" role="tab" aria-selected="true">
            <span>Siswa</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link px-4" data-bs-toggle="tab" href="#employee" role="tab" aria-selected="false" tabindex="-1">
            <span>Pegawai</span>
        </a>
    </li>
</ul>

{{-- tab content --}}
<div class="tab-content">
    <div class="tab-pane active" id="student" role="tabpanel">
        <div class="p-3">
            <div class="row mt-3 mb-4">
                <form class="d-flex gap-2">
                    <div class="position-relative">
                        <div class="">
                            <input type="text" name="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Cari">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <select name="" class="form-select" id="search-status">
                            <option value="">XI MIPA</option>
                            <option value="">XI IPS</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="table-responsive rounded-2">
                <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>NISN</th>
                            <th>Email</th>
                            <th>RFID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Arya Rizki</td>
                            <td>SMKN 1 Kepanjen</td>
                            <td>12345678</td>
                            <td>arya@gmail.com</td>
                            <td>1235678</td>
                            <td>
                                <button class="btn btn-primary me-2">RFID</button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 12 12">
                                        <path fill="#ffffff" d="M5 3h2a1 1 0 0 0-2 0M4 3a2 2 0 1 1 4 0h2.5a.5.5 0 0 1 0 1h-.441l-.443 5.17A2 2 0 0 1 7.623 11H4.377a2 2 0 0 1-1.993-1.83L1.941 4H1.5a.5.5 0 0 1 0-1zm3.5 3a.5.5 0 0 0-1 0v2a.5.5 0 0 0 1 0zM5 5.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5M3.38 9.085a1 1 0 0 0 .997.915h3.246a1 1 0 0 0 .996-.915L9.055 4h-6.11z" /></svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Arya Rizki</td>
                            <td>SMKN 1 Kepanjen</td>
                            <td>12345678</td>
                            <td>arya@gmail.com</td>
                            <td>1235678</td>
                            <td>
                                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-create-student">Tambah RFID</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane p-3" id="employee" role="tabpanel">
        <div class="row mt-3 mb-4">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <select name="" class="form-select" id="search-status">
                        <option value="">pegawai</option>
                        <option value="">guru</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="table-responsive rounded-2">
            <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>NISN</th>
                        <th>Email</th>
                        <th>RFID</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Arya Rizki</td>
                        <td>SMKN 1 Kepanjen</td>
                        <td>12345678</td>
                        <td>arya@gmail.com</td>
                        <td>1235678</td>
                        <td>
                            <button class="btn btn-primary me-2">RFID</button>
                            <button type="button" class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 12 12">
                                    <path fill="#ffffff" d="M5 3h2a1 1 0 0 0-2 0M4 3a2 2 0 1 1 4 0h2.5a.5.5 0 0 1 0 1h-.441l-.443 5.17A2 2 0 0 1 7.623 11H4.377a2 2 0 0 1-1.993-1.83L1.941 4H1.5a.5.5 0 0 1 0-1zm3.5 3a.5.5 0 0 0-1 0v2a.5.5 0 0 0 1 0zM5 5.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5M3.38 9.085a1 1 0 0 0 .997.915h3.246a1 1 0 0 0 .996-.915L9.055 4h-6.11z" /></svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Arya Rizki</td>
                        <td>SMKN 1 Kepanjen</td>
                        <td>12345678</td>
                        <td>arya@gmail.com</td>
                        <td>1235678</td>
                        <td>
                            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modal-create-employee">Tambah RFID</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-create-student" tabindex="-1" aria-labelledby="tambahRfid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRfid">Tambah RFID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <span class="text-dark fw-semibold me-2">Nama :</span>
                    Arya Rizki
                </div>
                <div class="mb-3">
                    <span class="text-dark fw-semibold me-2">Email :</span>
                    arya@gmail.com
                </div>
                <div class="mb-3">
                    <span class="text-dark fw-semibold me-2">RFID :</span>
                </div>
                <div class="mb-3">
                    Lakukan tab pada rfid reader untuk menginputkan rfid
                </div>
                <div>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-create-employee" tabindex="-1" aria-labelledby="tambahRfid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRfid">Tambah RFID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <span class="text-dark fw-semibold me-2">Nama :</span>
                    Arya Rizki
                </div>
                <div class="mb-3">
                    <span class="text-dark fw-semibold me-2">Email :</span>
                    arya@gmail.com
                </div>
                <div class="mb-3">
                    <span class="text-dark fw-semibold me-2">Status :</span>
                    Pegawai
                </div>
                <div class="mb-3">
                    <span class="text-dark fw-semibold me-2">RFID :</span>
                </div>
                <div class="mb-3">
                    Lakukan tab pada rfid reader untuk menginputkan rfid
                </div>
                <div>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>


@endsection
