<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-3">Daftar Siswa</h5>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
                <div class="mb-3 mb-md-0 me-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari...">
                </div>

                <div class="mb-3 mb-md-0 me-md-3">
                    <select name="gender" class="form-select">
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3 mb-md-0 me-md-3">
                    <select name="points" class="form-select">
                        <option value="highest">Point Tertinggi</option>
                        <option value="lowest">Point Terendah</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <div class="table-responsive rounded-2">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4 text-center">
                    <tr>
                        <th class="text-start nama-col">Nama</th>
                        <th>Kelas</th>
                        <th>NISN</th>
                        <th>Point</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($students as $student)
                        <tr>
                            <td class="text-start">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $student->image ? asset('storage/'. $student->image) : asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                        class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                        height="40" alt="" />
                                    <div class="ms-2">
                                        <h6 class="fs-4 fw-semibold mb-0 text-start">{{ $student->user->name }}</h6>
                                        <span class="fw-normal">{{ $student->gender->label() }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $student->classroomStudents->first()->classroom->name }}</td>
                            <td>{{ $student->nisn }}</td>
                            <td>
                                <span class="mb-1 badge font-medium bg-light-danger text-danger">{{ $student->point }} Point</span>
                            </td>
                            <td>
                                <button type="button" class="btn mb-1 waves-effect waves-light btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#detail-repair">Detail</button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    {{-- <tr>
                        <td class="text-start">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                    height="40" alt="" />
                                <div class="ms-2">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">Ahmad Lukman Hakim</h6>
                                    <span class="fw-normal">Laki-laki</span>
                                </div>
                            </div>
                        </td>
                        <td>X RPL 1</td>
                        <td>2131123123</td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-warning text-warning">50 Point</span>
                        </td>
                        <td>
                            <button type="button" class="btn mb-1 waves-effect waves-light btn-primary"
                                data-bs-toggle="modal" data-bs-target="#detail-repair">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40"
                                    height="40" alt="" />
                                <div class="ms-2">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">Ahmad Lukman Hakim</h6>
                                    <span class="fw-normal">Laki-laki</span>
                                </div>
                            </div>
                        </td>
                        <td>X RPL 1</td>
                        <td>2131123123</td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-primary text-primary">10 Point</span>
                        </td>
                        <td>
                            <button type="button" class="btn mb-1 waves-effect waves-light btn-primary"
                                data-bs-toggle="modal" data-bs-target="#detail-repair">Detail</button>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>

    </div>
</div>
