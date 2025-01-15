@php
    use Carbon\Carbon;
@endphp

<table>
    <thead>
        <tr>
            <th colspan="8">DAFTAR HADIR SISWA</th>
        </tr>
        <tr>
            <th colspan="8">SMKS MUHAMMADIYAH 1 GENTENG</th>
        </tr>
        <tr></tr>
        <tr>
            <th colspan="3">Kelas</th>
            <th>: {{ $items->first()->model->classroom->name }}</th>
        </tr>
        <tr>
            <th colspan="3">Wali kelas</th>
            <th>: {{ $items->first()->model->classroom->employee->user->name }}</th>
        </tr>
        <tr></tr>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>NISN</th>
            <th>Nama Lengkap</th>
            <th>Masuk</th>
            <th>Terlambat</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        @php
            $rule = \App\Models\AttendanceRule::where('day', $item->created_at->format('l'))->where('role', \App\Enums\RoleEnum::STUDENT->value)->first();
            $checkinTime = $item->checkin ? Carbon::parse($item->checkin) : null;
            $ruleCheckinEnd = $rule ? Carbon::parse($rule->checkin_end) : null;
            $maxLate = \App\Models\MaxLate::first();

            if ($rule && $maxLate) {
                $lateStart = $ruleCheckinEnd->copy()->subMinutes($maxLate->max_late);
                $lateMinutes = $checkinTime && $checkinTime->greaterThan($lateStart)
                    ? $checkinTime->diffInMinutes($lateStart)
                    : 0;
            } else {
                $lateMinutes = 0;
            }

            $lateHours = floor($lateMinutes / 60);
            $remainingMinutes = $lateMinutes % 60;

            $formattedLate = $lateMinutes > 0
                ? ($lateHours > 0 ? "{$lateHours} jam " : "") . "{$remainingMinutes} menit"
                : '-';
        @endphp

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ Carbon::parse($item->created_at)->format('d-m-y') }}</td>
            <td>{{ $item->model->student->nisn }}</td>
            <td>{{ $item->model->student->user->name }}</td>
            <td>{{ $item->checkin ? $checkinTime->format('H:i') : '-' }}</td>
            <td>{{ $formattedLate }}</td>
            <td>{{ $item->status->label() }}</td>
        </tr>
        @empty
            <tr>
                <td colspan="10">Data tidak tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
