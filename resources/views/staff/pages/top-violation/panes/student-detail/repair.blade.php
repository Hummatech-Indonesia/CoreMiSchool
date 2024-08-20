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
                    @forelse (range(1,3) as $item)
                        <tr>
                            <td>Menyapu halaman sekolah</td>
                            <td>10 Mei 2024 - 20 Mei 2024</td>
                            <td>
                                <span class="mb-1 badge font-medium bg-light-primary text-primary">-80 Point</span>
                            </td>
                            <td>
                                <button type="button" class="btn mb-1 waves-effect waves-light btn-primary w-100"
                                    data-bs-toggle="modal" data-bs-target="#detail-repair">Detail</button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
