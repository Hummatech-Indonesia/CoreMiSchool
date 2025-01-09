@php
    use Carbon\Carbon;
@endphp

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Keterangan</th>
            <th>Durasi Telat</th>
            <th>Masuk</th>
            <th>Pulang</th>
            <th>Poin</th>
            <th>Maksimal poin</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        @php
            $rule = \App\Models\AttendanceRule::where('day', $item->created_at->format('l'))->first();
            $checkinTime = $item->checkin ? Carbon::parse($item->checkin) : null;
            $ruleCheckinEnd = $rule ? Carbon::parse($rule->checkin_end) : null;
            
            $lateMinutes = $checkinTime && $ruleCheckinEnd && $checkinTime->greaterThan($ruleCheckinEnd)
                ? $checkinTime->diffInMinutes($ruleCheckinEnd)
                : 0;

            $lateHours = floor($lateMinutes / 60);
            $remainingMinutes = $lateMinutes % 60;
            $formattedLate = $lateMinutes > 0 
                ? ($lateHours > 0 ? "{$lateHours} jam " : "") . "{$remainingMinutes} menit"
                : '-';
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ Carbon::parse($item->created_at)->format('d-m-y') }}</td>
            <td>{{ $item->model->student->user->name }}</td>
            <td>{{ $item->model->classroom->name }}</td>
            <td>{{ $item->status->label() }}</td>
            <td>{{ $formattedLate }}</td>
            <td>{{ $item->checkin ? $checkinTime->format('H:i') : '-' }}</td>
            <td>{{ $item->checkout ? Carbon::parse($item->checkout)->format('H:i') : '-' }}</td>
            <td>{{ $item->point }}</td>
            <td>{{ $item->point }}</td>
        </tr>
        @empty
            <tr>
                <td colspan="10">Data tidak tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
