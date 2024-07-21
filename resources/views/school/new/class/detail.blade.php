@extends('school.layouts.app')
@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6 col-lg-4 mb-3 me-3">
                <form action="/school/class" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" name="name"
                        value="{{ old('name', request()->name) }}" id="input-search" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-7 mb-3 d-flex align-items-center">
                <form method="GET" class="d-flex">
                    <select id="status-activity" name="status" class="form-select me-2">
                        <option value="terbaru">Laki-Laki</option>
                        <option value="terlama">Perempuan</option>
                    </select>
                    <button type="submit" class="btn btn-primary px-4">Filter</button>
                </form>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#import-student">
                Import Siswa
            </button>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#create-student">
                Tambah Siswa
            </button>
        </div>

    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Jenis Kelamin</th>
                    <th class="fs-4 fw-semibold mb-0">NISN</th>
                    <th class="fs-4 fw-semibold mb-0">RFID</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                height="40" alt="nama siswa" />
                            <div class="ms-3">
                                <h6 class="fs-4 fw-semibold mb-0 text-start">Ahmad Lukman Hakim</h6>
                                <span class="fw-normal">X RPL 1</span>
                            </div>
                        </div>
                    </td>
                    <td>Laki - laki</td>
                    <td>2131123123</td>
                    <td>-
                        <button type="submit" class="btn btn-rounded btn-warning ms-2 btn-rfid p-1" data-bs-toggle="modal"
                            data-bs-target="#rfid-student">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                            </svg>
                        </button>
                    </td>

                    <td>
                        <div class="dropdown dropstart">
                            <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="category">
                                    <div class="category-business"></div>
                                    <div class="category-social"></div>
                                    <span class="more-options text-dark">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                <li>
                                    <button type="button" data-id="1dbf93d1-4e70-37ec-abda-b496e6a3c177"
                                        data-bs-toggle="modal" data-bs-target="#student-detail"
                                        class="btn-detail dropdown-item d-flex align-items-center gap-3"><i
                                            class="fs-4 ti ti-eye"></i>Detail</button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="dropdown-item d-flex align-items-center gap-3 btn-edit-teacher"
                                        data-bs-toggle="modal" data-bs-target="#update-student">
                                        <i class="fs-4 ti ti-edit"></i>Edit
                                    </button>
                                </li>
                                <li>
                                    <a data-id="1dbf93d1-4e70-37ec-abda-b496e6a3c177"
                                        class="btn-delete dropdown-item d-flex align-items-center gap-3 text-danger"><i
                                            class="fs-4 ti ti-trash"></i>Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @include('school.new.class.widgets.create-student')
    @include('school.new.class.widgets.import-student')
    @include('school.new.class.widgets.update-student')
    @include('school.new.class.widgets.rfid-student')
    @include('school.new.class.widgets.detail-student')
@endsection
