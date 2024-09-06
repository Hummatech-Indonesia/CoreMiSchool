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
            @foreach ($alpha as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $item->model->student->user->name }}
                    </td>
                    <td>
                        {{ $item->model->classroom->name }}
                    </td>
                    <td>{{ $item->checkin ? \Carbon\Carbon::parse($item->checkin)->format('H.i') : '-' }}</td>
                    <td>
                        <span class="badge bg-light-danger text-danger fw-semibold fs-2">Alpha</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
