<div class="table-responsive rounded-2 mb-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead class="text-dark fs-4">
            <tr class="">
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">No</th>
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Nama</th>
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Kelas</th>
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Jam</th>
                <th class="fs-4 fw-semibold mb-0" style="background-color: #5D87FF; color: white">Status</th>
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
                        X RPL 1
                    </td>
                    <td>08.00</td>
                    <td>
                        <span class="badge bg-light-primary text-primary fw-semibold fs-2">Telat</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
