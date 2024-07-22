<h4 class="mb-3">Jam Pelajaran</h4>
<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead>
            <tr>
                <th class="text-white" style="background-color: #5D87FF;">No</th>
                <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                <th class="text-white" style="background-color: #5D87FF;">Penempatan</th>
                <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @php
            $lastHour = $lessonHours->sortByDesc('end')->first();
            if ($lastHour->name != 'Istirahat') {
            preg_match('/\d+/', $lastHour->name, $matches);
            $jam = $matches[0];
            }
            @endphp --}}

            @forelse (range(1,4) as $lessonHour)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> <span class="badge bg-light-warning text-warning">
                        12.00 -13.00
                    </span></td>
                <td>istirahat</td>
                <td>
                    <div class="gap-3">
                        <button class="btn btn-light-primary text-primary me-2 btn-edit" data-bs-toggle="modal">Edit</button>
                        <button class="btn btn-light-danger text-danger btn-delete">Hapus</button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center align-middle">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                        <p class="fs-5 text-dark text-center mt-2">
                            RFID belum ditambahkan
                        </p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <div>
                        <button type="button" class="btn btn-info btn-rounded m-t-10 mb-3" data-bs-toggle="modal" data-bs-target="#modal-create">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"></path>
                        </svg>
                        Tambah Jam
                    </button>
                    </div>
                </td>
                <td colspan="2"></td>
                <td>
                    <div class="mb-3">
                        <button class="btn-delete btn btn-danger btn-sm" data-day="monday" data-bs-toggle="modal" data-bs-target="#modal-delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24">
                            <path fill="#FFFFFF" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z"></path>
                        </svg>
                    </button>
                    </div>
                    
                </td>
            </tr>
        </tfoot>
    </table>
</div>