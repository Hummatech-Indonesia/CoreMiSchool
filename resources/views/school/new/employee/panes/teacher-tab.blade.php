<div class="card card-body">
    <div class="">
        <h4>Daftar Guru</h4>
    </div>
        <div class="row">
            <div class="col-12 mt-3 mb-3">
                <div class="d-flex justify-content-between mb-3 col-md-5 align-items-center">
                    <form class="d-flex gap-2 align-items-center flex-grow-1">
                        <div class="position-relative flex-grow-1">
                            <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5"
                                id="search-name" placeholder="Cari" value="{{ old('search', request('search')) }}">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        </div>
                    </form>
                    <form class="d-flex gap-2 align-items-center ms-2">
                        <select name="gender" class="form-select" id="search-status">
                            <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>

    <div class="">
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="text-white" style="background-color: #5D87FF;">No</th>
                        <th class="text-white" style="background-color: #5D87FF;">Nama Pegawai</th>
                        <th class="text-white" style="background-color: #5D87FF;">Jumlah Mapel</th>
                        <th class="text-white" style="background-color: #5D87FF;">Email</th>
                        <th class="text-white" style="background-color: #5D87FF;">NIP</th>
                        <th class="text-white" style="background-color: #5D87FF;">RFID</th>
                        <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="40" height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $teacher->user->name }}</h6>
                                        <span class="fw-normal">{{ $teacher->gender->label() }}</span>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <span class="badge bg-light-primary text-primary">{{ $teacher->teacherSubjects->count() }} Mapel</span>
                            </td>
                            <td>{{ $teacher->user->email }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : '-' }}
                                <button type="button" class="btn btn-rounded btn-warning p-1 ms-2 btn-rfid"
                                data-name="{{ $teacher->user->name }}"
                                    data-id="{{ $teacher->id }}"
                                    data-rfid="{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : 'Kosong' }}"
                                    data-old-rfid="{{ $teacher->modelHasRfid ? $teacher->modelHasRfid->rfid : 'Kosong' }}"
                                    data-role="Employee">
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
                                            <a href="{{ route('school.teacher.show', $teacher->user->slug) }}" type="button"
                                                class="btn-detail dropdown-item d-flex align-items-center gap-3"><i
                                                    class="fs-4 ti ti-eye"></i>Detail</a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center gap-3 btn-edit-teacher"
                                                data-id="{{ $teacher->id }}"
                                                data-image="{{ asset('storage/'. $teacher->image) }}"
                                                data-name="{{ $teacher->user->name }}"
                                                data-nip="{{ $teacher->nip }}"
                                                data-religion_id="{{ $teacher->religion_id }}"
                                                data-birth_date="{{ $teacher->birth_date }}"
                                                data-birth_place="{{ $teacher->birth_place }}"
                                                data-gender="{{ $teacher->gender->value }}"
                                                data-nik="{{ $teacher->nik }}"
                                                data-phone="{{ $teacher->phone_number }}"
                                                data-email="{{ $teacher->user->email }}"
                                                data-active="{{ $teacher->active }}"
                                                data-address="{{ $teacher->address }}">
                                                <i class="fs-4 ti ti-edit"></i>Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn-delete dropdown-item d-flex align-items-center gap-3 text-danger btn-delete-teacher"
                                                data-id="{{ $teacher->id }}">
                                                <i class="fs-4 ti ti-trash"></i>Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Belum ada data
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-end mt-2 mb-0">
            <x-paginate-component :paginator="$teachers" />
        </div>
    </div>
</div>
