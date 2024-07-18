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
            <td>{{ $item->classroomStudent->student->user->name }}</td>
            <td>{{ $item->classroomStudent->classroom->name }}</td>
            <td>{{ $item->status == 'present' ? 'Masuk' : ($item->status == 'sick' ? 'Sakit' : ($item->status == 'alpha' ? 'Alpha' : ($item->status == 'permit' ? 'Izin' : ''))) }}</td>
            <td>{{ \Carbon\Carbon::parse($item->checkin)->format('H:i') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->checkout)->format('H:i') }}</td>
            <td>{{ $item->point }}</td>
            <td>10</td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
