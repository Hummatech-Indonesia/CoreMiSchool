<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-3">Daftar Pelanggaran</h5>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
                <div class="mb-3 mb-md-0 me-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Cari..."
                        value="{{ old('name', request('name')) }}">
                </div>

                <div class="mb-3 mb-md-0 me-md-3">
                    <select name="filter" class="form-select">
                        <option value="highest" {{ old('filter', request('filter')) == 'highest' ? 'selected' : '' }}>
                            Terbanyak</option>
                        <option value="lowest" {{ old('filter', request('filter')) == 'lowest' ? 'selected' : '' }}>
                            Tersedikit</option>
                        <option value="latest" {{ old('filter', request('filter')) == 'latest' ? 'selected' : '' }}>
                            Terbaru</option>
                        <option value="oldest" {{ old('filter', request('filter')) == 'oldest' ? 'selected' : '' }}>
                            Terlama</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        {{-- <div class="table-responsive rounded-2">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4 text-center">
                    <tr>
                        <th>No</th>
                        <th class="text-start nama-col">Nama</th>
                        <th>Kelas</th>
                        <th>Point</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($violations as $violation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $violation->violation }}</td>
                            <td>{{ $violation->point }}</td>
                            <td>
                                <span class="mb-1 badge font-medium bg-light-danger text-danger">{{ $violation->point }}
                                    Point</span>
                            </td>
                            <td>
                                <a href="#" type="button" class="btn mb-1 waves-effect waves-light btn-primary">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                    <p class="fs-5 text-dark text-center mt-2">
                                        Tidak ada pelanggaran
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> --}}


        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Point</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (range(1,5) as $student)
                        <tr>
                            <td>{{ $student }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                        class="rounded-circle me-2 user-profile" style="object-fit: cover"
                                        width="40" height="40" alt="" />
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0 text-start">nama siswa</h6>
                                        <span class="fw-normal">nisn</span>
                                    </div>
                                </div>
                            </td>
                            <td>XRPL1</td>
                            <td>
                                <span class="badge bg-light-danger text-danger">10 Point</span>
                            </td>
                            <td>
                                <a href="#"
                                    class="btn btn-primary py-1 px-4">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                        width="300px">
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
</div>
