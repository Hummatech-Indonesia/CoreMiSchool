<div class="card">
    <div class="card-body">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
                <div class="mb-3 mb-md-0 me-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari..."
                        value="{{ old('search', request()->input('search')) }}">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>

        <div class="table-responsive rounded-2">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-s4">
                    <tr class="">
                        <th>No</th>
                        <th>Nama Staff</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (range(1, 5) as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}"
                                        class="rounded-circle me-2 user-profile" style="object-fit: cover"
                                        width="40" height="40" alt="" />
                                    <div class="ms-2">
                                        <h6 class="fs-4 fw-semibold mb-0 text-start">
                                            Ahmad Lukman Hakim</h6>
                                        <span
                                            class="fw-normal">2973892740</span>
                                    </div>
                                </div>
                            </td>
                            <td>10 Mei 2024</td>
                            <td><span
                                    class="mb-1 badge font-medium bg-light-success text-success">Mengisi</span>
                            </td>
                            <td>Lorem ipsum dolor sit amet...
                            </td>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a type="button" class="text-primari btn-detail-journal"
                                        data-author="Ahmad Lukman Hakim"
                                        data-date="10 Mei 2024"
                                        data-description="Lorem ipsum dolor sit amet" 
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5">
                                                <path d="M3 13c3.6-8 14.4-8 18 0" />
                                                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                                            </g>
                                        </svg>
                                    </a>
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
                                        Data tidak ditemukan
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
