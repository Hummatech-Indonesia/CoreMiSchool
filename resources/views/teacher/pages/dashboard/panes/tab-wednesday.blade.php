<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead>
            <tr>
                <th class="text-white" style="background-color: #5D87FF;">No</th>
                <th class="text-white" style="background-color: #5D87FF;">Mapel</th>
                <th class="text-white" style="background-color: #5D87FF;">Waktu</th>
                <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                <th class="text-white" style="background-color: #5D87FF;">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse (range(1, 3) as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>Matematika</td>
                    <td>07.00 - 08.15</td>
                    <td>Jam ke 1-2</td>
                    <td>X RPL 1</td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
</div>