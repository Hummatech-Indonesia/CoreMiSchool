@php
    use Carbon\Carbon;
    use App\Enums\AttendanceEnum;
@endphp
@extends('teacher.layouts.app')

@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
        <div class="card-body px-4 py-4">
            <div class="d-flex justify-content-between">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8 text-dark">Pengisian Jurnal</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-dark fs-3" aria-current="page">Bahasa Indonesia - X RPL 1</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="bg-primary text-light d-flex flex-column align-items-center justify-content-center px-4 py-3 rounded"
                    style="width: 75px; height: 75px;">
                    <b class="fs-8">{{ Carbon::parse($journal->date)->isoFormat('DD') }}</b>
                    <p class="mb-0 fs-3">{{ Carbon::parse($journal->date)->isoFormat('MMM') }}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body pt-3">
            <h4 class="pb-3">Laporan Kegiatan</h4>
            <div class="form-group">
                <h6 class="mt-4">Judul</h6>
                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                    placeholder="Maling Rambutan" value="{{ $journal->title }}">
            </div>
            <div class="form-group">
                <h6 class="mt-4">Isi Laporan</h6>
                <textarea class="form-control" rows="8"
                    placeholder="Pada pertemuan kali ini, ekstrakurikuler band berjalan dengan lancar. Latihan rutin diadakan setiap Selasa dan Kamis sore, dengan fokus pada teknik bermain musik dan kerjasama tim.
Kegiatan ini memberikan banyak manfaat, termasuk peningkatan bakat musik, rasa percaya diri, disiplin, dan kerjasama. Kami optimis ekstrakurikuler band akan terus berkembang dan meraih prestasi di masa depan.">{{ $journal->description }}</textarea>

            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body pt-3">
            <h4 class="pb-3">Presensi Siswa</h4>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="text-white rounded-start" style="background-color: #5D87FF;">No</th>
                            <th class="text-white" style="background-color: #5D87FF;">Nama Siswa</th>
                            <th class="text-white" style="background-color: #5D87FF;">Kelas</th>
                            <th class="text-white text-center" style="background-color: #5D87FF;">Status Kehadiran</th>
                            <th class="text-white text-center" style="background-color: #5D87FF;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendanceJournals as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->classroomStudent->student->user->name }}</td>

                                <td>{{ $attendance->classroomStudent->classroom->name }}</td>
                                <td class="text-center">
                                    @switch($attendance->status)
                                        @case(AttendanceEnum::SICK)
                                            <span class="mb-1 badge font-medium bg-light-warning text-warning w-25">Sakit</span>
                                        @break

                                        @case(AttendanceEnum::PERMIT)
                                            <span class="mb-1 badge font-medium bg-light-primary text-primary w-25">Izin</span>
                                        @break

                                        @case(AttendanceEnum::ALPHA)
                                            <span class="mb-1 badge font-medium bg-light-danger text-danger w-25">Alfa</span>
                                        @break

                                        @default
                                            <span class="mb-1 badge font-medium bg-light-success text-success w-25">Masuk</span>
                                    @endswitch
                                </td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-detail" data-bs-toggle="modal"
                                        data-bs-target="#modal-detail" data-attendance="{{ $attendance->id }}">Detail</button>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('teacher.pages.journals.wigets.detail')
    @endsection

    @section('script')
        <script>
            const attendanceStudents = @json($attendanceJournals);


            $('.btn-detail').click(function () {
                let classroomStudent = attendanceStudents.find(attendanceStudent => attendanceStudent.id == $(this).data('attendance')).classroom_student

                $('#name-detail').text(classroomStudent.student.user.name)
                $('#email-detail').text(classroomStudent.student.user.email)
                $('#phone-detail').text(classroomStudent.student.phone)
                $('#gender-detail').text(classroomStudent.student.gender)
                $('#birth-date-detail').text(classroomStudent.student.birth_date)
                $('#birth-place-detail').text(classroomStudent.student.birth_place)
                $('#number-kk-detail').text(classroomStudent.student.number_kk)
                $('#nik-detail').text(classroomStudent.student.nik)
                $('#order-child-detail').text(classroomStudent.student.order_child)
                $('#number-akta-detail').text(classroomStudent.student.number_akta)
                $('#count-siblings-detail').text(classroomStudent.student.count_siblings)
                $('#address-detail').text(classroomStudent.student.address)
                $('#classroom-detail').text(classroomStudent.classroom.name)
                $('#religion-detail').text(classroomStudent.student.religion_id)
                $('#nisn-detail').text(classroomStudent.student.nisn)

                $('#modal-detail').show('modal')
            });


        </script>
    @endsection
