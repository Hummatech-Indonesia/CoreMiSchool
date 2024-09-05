<div class="row d-flex">
    <div class="col-lg-9 col-md-12 d-flex">
        <div class="card w-100 h-100 border">
            <div class="card-body">
                <h5 class="mb-4"><b>Daftar Guru Tidak Mengisi Jurnal</b></h5>
                <div class="table-responsive rounded-2 mb-4">
                    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                        <thead class="text-dark fs-4">
                            <tr class="">
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">No</th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Nama Guru
                                </th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Tanggal
                                </th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Kelas
                                </th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Status
                                </th>
                                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (range(1, 5) as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        Ahmad Lukman Hakim
                                    </td>
                                    <td>
                                        10 Januari 2024
                                    </td>
                                    <td>X RPL 1 - Bahasa Indonesia</td>
                                    <td>
                                        <span class="badge bg-light-danger text-danger fw-semibold fs-2">Tidak Mengisi</span>
                                    </td>
                                    <td>
                                        <button class="btn mb-1 btn-primary" type="button">Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-3 d-flex">
        <div class="card w-100 h-100 overflow-hidden border">
            <div class="card-body">
                {{-- <div class="row align-items-center">
                    <h5 class="card-title fw-semibold">Statistik Absensi Siswa</h5>
                    <h6 class="mb-3">Hari ini</h6>
                    <div id="chart-student" class="d-flex justify-content-center"></div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
