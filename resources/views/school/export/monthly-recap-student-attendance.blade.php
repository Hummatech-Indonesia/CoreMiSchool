<table>
    <thead>
        <tr>
            <th colspan="8">REKAPITULASI DAFTAR HADIR SISWA</th>
        </tr>
        <tr>
            <th colspan="8">SMK NEGERI 2 KRAKSAAN</th>
        </tr>
        <tr></tr>
        <tr>
            <th colspan="2">BULAN</th>
            <th>: {{ $month }}</th>
        </tr>
        <tr>
            <th colspan="2">KELAS</th>
            <th>: {{ $classroom->name }}</th>
        </tr>
        <tr>
            <th colspan="2">WALI KELAS</th>
            <th>: {{ $classroom->employee->user->name }}</th>
        </tr>
        <tr></tr>
        <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">NISN</th>
            <th rowspan="2">NAMA LENGKAP</th>
            <th colspan="4">JUMLAH</th>
        </tr>
        <tr>
            <th>HADIR</th>
            <th>IJIN</th>
            <th>SAKIT</th>
            <th>ALPHA</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)        
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->classroomStudent->student->nisn }}</td>
            <td>{{ $item->classroomStudent->student->user->name }}</td>
            <td>{{ $item->present }}</td>
            <td>{{ $item->permit }}</td>
            <td>{{ $item->sick }}</td>
            <td>{{ $item->alpha }}</td>
        </tr>
        @empty
            <tr>
                <td colspan="7">Data tidak tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
