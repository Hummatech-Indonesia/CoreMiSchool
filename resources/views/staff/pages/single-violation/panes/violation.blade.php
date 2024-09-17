<div class="table-responsive rounded-2 mb-4 mt-3">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th class="text-white" style="background-color: #5D87FF;">Pelanggaran</th>
                <th class="text-white" style="background-color: #5D87FF;">Tanggal</th>
                <th class="text-white" style="background-color: #5D87FF;">Point</th>
                <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse (range(1,5) as $item)
                <tr>
                    <td>Nyembah Pohon Pisang lorem ipsum dolor sit amet...</td>
                    <td>10 Mei 2024</td>
                    <td>
                        <span class="badge bg-light-danger text-danger fw-semibold fs-2">+
                            20</span>
                    </td>
                    <td>
                        <button class="btn mb-1 waves-effect waves-light btn-primary"
                            type="button">Detail</button>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
