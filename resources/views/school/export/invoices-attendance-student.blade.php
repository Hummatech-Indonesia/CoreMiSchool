<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Keterangan</th>
            <th>Masuk</th>
            <th>Pulang</th>
            <th>Poin</th>
            <th>Maksimal poin</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-y') }}</td>
            <td>{{ $item->student->user->name }}</td>
            <td>{{ $item->classroom->name }}</td>
            <td>{{ $item->attendances->first()->status->label() }}</td>
            <td>{{ $item->attendances->first()->checkin ? \Carbon\Carbon::parse($item->attendances->first()->checkin)->format('H:i') : '-' }}</td>
            <td>{{ $item->attendances->first()->checkout ? \Carbon\Carbon::parse($item->attendances->first()->checkout)->format('H:i') : '-' }}</td>
            <td>{{ $item->attendances->first()->point }}</td>
            <td>{{ $item->attendances->first()->point }}</td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
