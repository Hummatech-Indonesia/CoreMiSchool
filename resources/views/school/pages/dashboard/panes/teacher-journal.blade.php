<div class="row d-flex">
    <div class="col-lg-9 col-md-12 d-flex">
        <div class="card border shadow">
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

    <div class="col-lg-3 mb-3 ">
        <div class="statistik-container">
            <h4><b>Statistik</b></h4>
            <div class="line">
                <div class="small-line"></div>
                <div class="smaller-line"></div>
            </div>
        </div>

        <div class="row">
            <div class="card border shadow rounded-4 p-0 mb-3">
                <div class="card-body card-body-with-line">
                    <h5><b>Jumlah Guru</b></h5>
                    <h3 class="text-primary">59 Guru</h3>
                </div>
            </div>
            <div class="card border shadow rounded-4 p-0">
                <div class="card-body card-body-with-line2">
                    <h5><b>Guru Mengisi Jurnal</b></h5>
                    <h3 class="text-success">59 Guru</h3>
                </div>
            </div>
            <div class="card border shadow rounded-4 p-0">
                <div class="card-body card-body-with-line3">
                    <h5><b>Guru Tidak Mengisi Jurnal</b></h5>
                    <h3 class="text-danger">59 Guru</h3>
                </div>
            </div>
        </div>

        <button class="btn waves-effect waves-light btn-outline-primary w-100" type="button">Lihat Selengkapnya</button>
    </div>



</div>
