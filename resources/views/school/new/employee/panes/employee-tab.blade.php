<div class="card w-100 position-relative overflow-hidden">
    <div class="px-4 py-3">
        <h5 class="card-title fw-semibold mb-0 lh-sm">Daftar Staff</h5>
    </div>
    <div class="container-fluid px-4 py-3">
        <div class="row gx-3">
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-between col-md-5 align-items-center">
                    <form class="d-flex gap-2 align-items-center flex-grow-1">
                        <div class="position-relative flex-grow-1">
                            <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5"
                                id="search-name" placeholder="Cari" value="{{ old('search', request('search')) }}">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        </div>
                    </form>
                    <form class="d-flex gap-2 align-items-center ms-3">
                        <select name="filter" class="form-select" id="search-status">
                            <option value="terbaru">Laki-Laki</option>
                            <option value="terlama">Perempuan</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card-body p-4">
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>NIP</th>
                        <th>RFID</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (range(1, 5) as $item)
                        <tr>
                            <td>{{ $item }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="40" height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">Ahmad Lukman Hakim</h6>
                                        <span class="fw-normal">Laki Laki</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light-primary text-primary">Aktif</span>
                            </td>
                            <td>lukman@gmail.com</td>
                            <td>2131123123</td>
                            <td>123123123
                                <button type="submit" class="btn btn-rounded btn-warning p-1 ms-2 btn-rfid"
                                    data-bs-toggle="modal" data-bs-target="#modal-rfid">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                    </svg>
                                </button>
                            </td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="#" class="text-muted" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
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
                                            <button type="button" data-id="1dbf93d1-4e70-37ec-abda-b496e6a3c177" data-bs-toggle="modal" data-bs-target="#modal-detail"
                                                class="btn-detail dropdown-item d-flex align-items-center gap-3"><i
                                                    class="fs-4 ti ti-eye"></i>Detail</button>
                                        </li>

                                        <li>
                                            <button type="button" data-id="1dbf93d1-4e70-37ec-abda-b496e6a3c177"
                                                class="btn-update dropdown-item d-flex align-items-center gap-3"
                                                data-bs-toggle="modal" data-bs-target="#update-employe">
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('school.new.employee.widgets.employe.update-employe')
@include('school.new.employee.widgets.employe.modal-rfid')
@include('school.new.employee.widgets.employe.modal-detail')
