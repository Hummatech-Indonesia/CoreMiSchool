<div class="card card-body">
    <h4>Daftar Alumni</h4>
    <div class="row mb-3 mt-3">
        <div class="col-lg-8 col-md-12 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <input type="text" name="search" class="form-control product-search ps-5" id="input-search" placeholder="Cari..." value="{{ old('name', request('name')) }}">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>

                <div class="d-flex gap-2">
                    <select name="gender" class="form-select" id="">
                        <option value="">Tampilkan semua</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                    <div>
                        <button type="submit" class="btn btn-primary btn-md">filter</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- <div class="col-lg-4 col-md-12 mb-3 d-flex justify-content-end">
            <button type="button" class="btn mb-1 btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-alumni">
                Tambah Alumni
            </button>
        </div> --}}
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
                @forelse ($alumnus as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40" height="40" alt="" />
                            <div class="ms-3">
                                <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $student->student->user->name }}</h6>
                                <span class="fw-normal">{{ $student->classroom->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td>{{ $student->student->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}</td>
                    <td>{{ $student->student->nisn }}</td>
                    <td>{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : 'Kosong' }}</td>
                    <td>
                        <div class="dropdown dropstart">
                            <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <a data-id="1dbf93d1-4e70-37ec-abda-b496e6a3c177" class="btn-detail dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal" data-bs-target="#modal-detail-alumni"><i class="fs-4 ti ti-eye"></i>Detail</a>
                                </li>
                                <li>
                                    <a data-id="1dbf93d1-4e70-37ec-abda-b496e6a3c177" class="btn-update dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal" data-bs-target="#modal-update-alumni"><i class="fs-4 ti ti-user"></i>Jadikan siswa</a>
                                </li>
                                <li>
                                    <a data-id="1dbf93d1-4e70-37ec-abda-b496e6a3c177" class="btn-delete dropdown-item d-flex align-items-center text-danger gap-3"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center align-middle">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                            <p class="fs-5 text-dark text-center mt-2">
                                Siswa belum ditambahkan
                            </p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>