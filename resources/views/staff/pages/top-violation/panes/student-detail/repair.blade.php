<div class="card w-100 position-relative overflow-hidden border">
    <div class="card-body">
        <h4 class="mb-4"><b>Daftar Perbaikan</b></h4>
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4 rounded-3">
                    <tr>
                        <th style="background-color: #5D87FF; color: white">Pelanggaran</th>
                        <th style="background-color: #5D87FF; color: white">Tanggal</th>
                        <th style="background-color: #5D87FF; color: white">Point</th>
                        <th style="background-color: #5D87FF; color: white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($repairs as $repair)
                        <tr>
                            <td>{{ $repair->repair->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($repair->created_at)->translatedFormat('d F Y') }}</td>
                            <td>
                                <span class="mb-1 badge font-medium bg-light-primary text-primary">-{{ $repair->repair->point }} Point</span>
                            </td>
                            <td>
                                <button type="button" class="btn mb-1 waves-effect waves-light btn-primary w-100"
                                    data-bs-toggle="modal" data-bs-target="#repair-student-detail">Detail</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                    <p class="fs-5 text-dark text-center mt-2">
                                        Tidak ada Perbaikan bagi siswa ini
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

@include('staff.pages.top-violation.widgets.repair-detail')