<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-3">Daftar Siswa</h5>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
                <div class="mb-3 mb-md-0 me-md-3">
                    <input type="text" name="search_student" class="form-control" placeholder="Cari..." value="{{ old('search_student', request('search_student')) }}">
                </div>

                <div class="mb-3 mb-md-0 me-md-3">
                    <select name="gender" class="form-select">
                        <option value="">Jenis Kelamin</option>
                        <option value="male" {{ old('gender', request('gender')) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female"  {{ old('gender', request('gender')) == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3 mb-md-0 me-md-3">
                    <select name="point_student" class="form-select">
                        <option value="highest" {{ old('point_student', request('point_student')) == 'highest' ? 'selected' : '' }}>Point Tertinggi</option>
                        <option value="lowest" {{ old('point_student', request('point_student')) == 'lowest' ? 'selected' : '' }}>Point Terendah</option>
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
                </tbody>
            </table>
            <x-paginate-component :paginator="$students" />
        </div>

    </div>
</div>
