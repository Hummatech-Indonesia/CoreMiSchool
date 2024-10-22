<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <h4>Riwayat Absensi</h4>
            <div class="table-responsive rounded-2 mt-3">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="text-white" style="background-color: #3DBCEC;">Hari</th>
                            <th class="text-white" style="background-color: #3DBCEC;">Tanggal</th>
                            <th class="text-white" style="background-color: #3DBCEC;">Masuk</th>
                            <th class="text-white" style="background-color: #3DBCEC;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances->take(5) as $attendance)
                            <tr>
                                <td>{{ $attendance->created_at->translatedFormat('l') }}</td>
                                <td>{{ $attendance->created_at->format('d F Y') }}</td>
                                <td>{{ $attendance->checkin }}</td>
                                <td>
                                    <span
                                        class="mb-1 badge font-medium {{ $attendance->status->color() }}">{{ $attendance->status->label() }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center align-middle">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}"
                                            alt="" width="300px">
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
        </div>
    </div>
</div>

<div class="col-lg-4 d-flex">
    <div class="card w-100 h-100 overflow-hidden border">
        <div class="card-body">
            <div class="row align-items-center">
                <h5 class="card-title fw-semibold">Statistik Absensi Guru</h5>
                <h6 class="mb-3">Hari ini</h6>
                <div id="chart-teacher" class="d-flex justify-content-center"></div>
            </div>
        </div>
    </div>
</div>
