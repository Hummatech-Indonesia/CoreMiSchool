@php
    use App\Enums\AttendanceEnum;
@endphp
@section('script')
    <script>
        const attendance = {{count($attendanceJournals)}};
        console.log(attendance);

        // console.log(status);
        $(document).ready(function() {

            let students = {}

            if(attendance) {
                $attendanceElement = `
                    @forelse ($attendanceJournals as $attendanceJournal)
                        <tr>
                            <td>
                                <select class="form-select select2 w-100" name="siswa">
                                    <option value="" selected disabled>Pilih Siswa</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}" {{ $attendanceJournal->classroomStudent->student_id == $student->id ? 'selected' : '' }}>{{ $student->student->user->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-select select2 w-100" name="jam">
                                        <option value="" selected disabled>Pilih Jam</option>
                                    @foreach ($lessonHours as $lessonHour)
                                        <option value="{{ $lessonHour->id }}" {{ $attendanceJournal->lesson_hour_id == $lessonHour->id ? 'selected' : '' }}>{{ $lessonHour->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-select select2 w-100" name="status">
                                    <option value="" selected disabled>Pilih Status</option>
                                    @foreach (AttendanceEnum::cases() as $status)
                                        <option value="{{ $status->value }}" {{ $status->value === $attendanceJournal->status->value ? 'selected' : '' }}>{{ ucfirst($status->label()) }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="delete-btn btn btn-rounded btn-danger p-1 ms-2 btn-rfid">
                                    <!-- SVG Icon -->
                                    Batalkan
                                </button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                `;

                $('#student-table tbody').append($attendanceElement);

                $('.delete-btn').click(function() {
                    $(this).closest('tr').remove();
                });
            }

                $element = `
                    <tr>
                        <td>
                            <select class="form-select select2 w-100" name="siswa">
                                <option value="" selected disabled>Pilih Siswa</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->student->user->name }}</option>
                                @endforeach
                                </select>
                        </td>
                        <td>
                            <select class="form-select select2 w-100" name="jam">
                                    <option value="" selected disabled>Pilih Jam</option>
                                @foreach ($lessonHours as $lessonHour)
                                    <option value="{{ $lessonHour->id }}">{{ $lessonHour->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select select2 w-100" name="status">
                                <option value="" selected disabled>Pilih Status</option>
                                @foreach (AttendanceEnum::cases() as $status)
                                    @if ($status->value !== 'present')
                                        <option value="{{ $status->value }}" {{ $status->value === 'alpha' ? 'selected' : '' }}>{{ ucfirst($status->label()) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="text-center">
                            <button type="button"delete-btn class="delete-btn btn btn-rounded btn-danger p-1 ms-2 btn-rfid">
                                <!-- SVG Icon -->
                                Batalkan
                            </button>
                        </td>
                    </tr>
                `;

            $('#student-add-btn').click(function() {
                $('#student-table tbody').append($element);
                $('.select2').select2({
                    dropdownParent: $('body') // Adjust as necessary
                });

                $('.delete-btn').click(function() {
                    $(this).closest('tr').remove();
                });
            });

            $('#submit-btn').click(function() {
                let students = [];

                $('#student-table tbody tr').each(function() {
                    var status = $(this).find('select[name="status"]').val();
                    var studentId = $(this).find('select[name="siswa"]').val();
                    var lessonHourId = $(this).find('select[name="jam"]').val();
                    students.push({
                        classroom_student_id: studentId,
                        lesson_hour_id: lessonHourId,
                        status: status
                    });
                });

                function handleDeleteStudent(studentId) {
                    students = students.filter(student => student.classroom_student_id !== studentId);
                }

                $('.delete-btn').click(function() {
                    var row = $(this).closest('tr');
                    var studentId = row.find('select[name="siswa"]').val();
                    handleDeleteStudent(studentId);
                    row.remove();
                });

                var urls;
                var method;


                if (attendance) {
                    urls = `{{ route('teacher.journals.update', request()->lessonSchedule->id) }}`;
                    method = `PUT`;
                } else {
                    urls = `{{ route('teacher.journals.store', request()->lessonSchedule->id) }}`;
                    method = `POSt`;
                }

                $.ajax({
                    url: urls,
                    method: method,
                    data: {
                        _token: '{{ csrf_token() }}',
                        description: $('#description').val(),
                        date: $('#date').val(),
                        students: students
                    },
                    success: function(response) {
                        console.log(response);
                        // alert('Data berhasil dikirim');
                        // location.reload();
                    },
                    error: function(xhr) {
                        // alert('Terjadi kesalahan saat mengirim data');
                        // console.log(xhr);
                    }
                })

                // console.log(students);

                // console.log(
                //     $('#lesson_schedule_id').val()
                // );
                // console.log(
                //     $('#description').val(),
                //     // $('#date').val(),
                //     // students
                // )
            })
        });
    </script>
@endsection
