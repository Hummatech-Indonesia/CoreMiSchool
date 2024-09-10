<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Kelas</th>
            <th>Judul</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
            <td>{{ $item->employeeJournal->employee->user->name }}</td>
            <td>{{ $item->employeeJournal->employee->nip }}</td>
            <td>{{ $item->employeeJournal->first() ? $item->employeeJournal->first()->title : 'kosong...' }}</td>
            <td>{{ $item->employeeJournal->first() ? $item->employeeJournal->first()->description : 'kosong...' }}</td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
