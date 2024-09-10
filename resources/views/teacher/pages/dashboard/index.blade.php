@extends('teacher.layouts.app')

@section('content')

    @if (!empty($notifications))
        @foreach ($notifications as $notification)
            <div class="alert alert-warning">
                {{ $notification }}
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4><b>Profil guru</b></h4>
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <img src="{{ asset('assets/images/default-user.jpeg') }}" width="120px" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col-lg-8 ms-1">
                            <h3><b>{{ auth()->user()->name }}</b></h3>
                            <h5>Tahun Ajaran {{ $schoolYear->school_year }}</h5>
                            <div class="pt-2">
                                @forelse ($teacherSubjects as $teacherSubject)
                                    <div class="m-1 badge bg-light-primary text-primary">
                                        {{ $teacherSubject->subject->name }}</div>
                                @empty
                                    <div class="badge bg-light-warning text-warning">Anda tidak megajar pelajaran apapun
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        @if ($classroom)
                            <div class="col-lg-8">
                                <h5><b>Wali Kelas Dari</b></h5>
                                <h3 class="my-4"><b>{{ $classroom->name }}</b></h3>
                                <div class="badge bg-light-primary text-primary fs-5">{{ $classroom->classroomStudents->count() }} Total Siswa</div>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('assets/images/Topi.png') }}">
                            </div>
                        @else
                            <div class="col-lg-12">
                                <img src="{{ asset('assets/images/Topi.png') }}">
                                <h4>Anda tidak menjadi wali kelas manapun</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div class="">
                        <h4>Absensi Hari Ini:</h4>
                        @if ($todayAttendance != null)
                            <h4>{{ $todayAttendance->created_at->format('d M Y') }} - {{ $todayAttendance->checkin }}</h4>      
                        @else
                            <p class="badge bg-light-danger text-danger">Anda belum absen hari ini</p>
                        @endif
                    </div>
                    @if ($todayAttendance != null)    
                        <div class="badge bg-light-{{ $todayAttendance->status->color() }} text-{{ $todayAttendance->status->color() }} fs-6 pt-4 px-5">{{ $todayAttendance->status->label() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <h4>Jadwal Mengajar</h4>
        <ul class="nav nav-pills mt-3 rounded align-items-center flex-row" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-senin-tab" data-bs-toggle="pill" href="#pills-senin" role="tab"
                    aria-controls="pills-senin" aria-selected="true">
                    Senin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-selasa-tab" data-bs-toggle="pill" href="#pills-selasa" role="tab"
                    aria-controls="pills-selasa" aria-selected="false">
                    Selasa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-rabu-tab" data-bs-toggle="pill" href="#pills-rabu" role="tab"
                    aria-controls="pills-rabu" aria-selected="false">
                    Rabu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-kamis-tab" data-bs-toggle="pill" href="#pills-kamis" role="tab"
                    aria-controls="pills-kamis" aria-selected="false">
                    Kamis
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-jumat-tab" data-bs-toggle="pill" href="#pills-jumat" role="tab"
                    aria-controls="pills-jumat" aria-selected="false">
                    Jumat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-sabtu-tab" data-bs-toggle="pill" href="#pills-sabtu" role="tab"
                    aria-controls="pills-sabtu" aria-selected="false">
                    Sabtu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-minggu-tab" data-bs-toggle="pill" href="#pills-minggu" role="tab"
                    aria-controls="pills-minggu" aria-selected="false">
                    Minggu
                </a>
            </li>
        </ul>

        <div class="tab-content mt-4" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-senin" role="tabpanel" aria-labelledby="pills-senin-tab">
                @include('teacher.pages.dashboard.panes.tab-monday')
            </div>
            <div class="tab-pane fade" id="pills-selasa" role="tabpanel" aria-labelledby="pills-selasa-tab">
                @include('teacher.pages.dashboard.panes.tab-tuesday')
            </div>
            <div class="tab-pane fade" id="pills-rabu" role="tabpanel" aria-labelledby="pills-rabu-tab">
                @include('teacher.pages.dashboard.panes.tab-wednesday')
            </div>
            <div class="tab-pane fade" id="pills-kamis" role="tabpanel" aria-labelledby="pills-kamis-tab">
                @include('teacher.pages.dashboard.panes.tab-thursday')
            </div>
            <div class="tab-pane fade" id="pills-jumat" role="tabpanel" aria-labelledby="pills-jumat-tab">
                @include('teacher.pages.dashboard.panes.tab-friday')
            </div>
            <div class="tab-pane fade" id="pills-sabtu" role="tabpanel" aria-labelledby="pills-sabtu-tab">
                @include('teacher.pages.dashboard.panes.tab-saturday')
            </div>
            <div class="tab-pane fade" id="pills-minggu" role="tabpanel" aria-labelledby="pills-minggu-tab">
                @include('teacher.pages.dashboard.panes.tab-sunday')
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4>Riwayat Absensi</h4>
                    <div class="table-responsive rounded-2 mt-3">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th class="text-white" style="background-color: #5D87FF;">Hari</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Tanggal</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($attendances->take(5) as $attendance)
                                    <tr>
                                        <td>{{ $attendance->created_at->translatedFormat('l') }}</td>
                                        <td>{{ $attendance->created_at->format('d F Y') }}</td>
                                        <td>{{ $attendance->checkin }}</td>
                                        <td>
                                            <span
                                                class="mb-1 badge font-medium {{ $attendance->status->color() }}">{{ $attendance->status->label() }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center align-middle">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                                    width="300px">
                                                <p class="fs-5 text-dark text-center mt-2">
                                                    Belum ada data
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="card w-100 h-100 overflow-hidden border">
                <div class="card-body">
                    <div class="row align-items-center">
                        <h5 class="card-title fw-semibold">Statistik Absensi Guru</h5>
                        <h6 class="mb-3">Hari ini</h6>
                        <div id="chart-teacher" class="d-flex justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4>Riwayat Jurnal</h4>
    <h6 class="mb-5">Daftar jurnal guru setelah berkegiatan mengajar</h6>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            @forelse ($teacherJournals->take(3) as $teacherJournal)
                <div class="col-md-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-header bg-primary" style="border-radius: 0.50rem;">
                            <h4 class="mb-0 text-white card-title">
                                {{ $teacherJournal->lessonSchedule->classroom->name }} - {{ $teacherJournal->lessonSchedule->teacherSubject->subject->name }}
                            </h4>
                            <div class="position-absolute top-0 end-0" style="padding: 0px; position: relative;">
                                <img src="{{ asset('assets/images/background/arrow-leftwarning.png') }}" alt="Description"
                                    class="img-fluid" style="max-width: 210px; height: auto; position: relative;">
                                <span class="d-flex align-items-center ms-5 fs-4"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold;width: 100%;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                                    </svg>
                                    {{ $teacherJournal->date }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row pb-2" style="border-bottom: 1px solid #c0c0c0">
                                <div class="col-lg-8" style="border-right: 1px solid #c0c0c0;">
                                    <div class="pe-3">
                                        <h5 class="card-title mb-4">Deskripsi:</h5>
                                        <p>{{ Str::limit($teacherJournal->description, 130) }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ps-3">
                                        <h5 class="card-title mb-4 ms-5 ps-3">Rekap Absensi:</h5>
                                        <div class="row px-5">
                                            <div class="col-lg-4">
                                                <div class="text-center">
                                                    <span
                                                        class="badge bg-light-primary text-primary fs-7 fw-semibold mb-1 py-2">{{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::PERMIT)->count() }}</span>
                                                    <p>Izin</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="text-center">
                                                    <span
                                                        class="badge bg-light-warning text-warning fs-7 fw-semibold mb-1 py-2">{{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::SICK)->count() }}</span>
                                                    <p>Sakit</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="text-center">
                                                    <span
                                                        class="badge bg-light-danger text-danger fs-7 fw-semibold mb-1 py-2">{{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::ALPHA)->count() }}</span>
                                                    <p>Alfa</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <a href="{{ route('teacher.journals.show', $teacherJournal->id) }}" class="btn btn-primary mt-3">
                                    Lihat Detail Jurnal
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mb-1"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76"
                                        />
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center align-middle">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                            width="300px">
                        <p class="fs-5 text-dark text-center mt-2">
                            Belum ada data
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    @if ($teacherJournals->count() > 3)
    <a class="btn mb-5 waves-effect waves-light btn-outline-info w-100" href="{{ route('teacher.journals.index') }}">Lihat Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
            <path fill="currentColor"
                d="M8.22 2.97a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.042-.018a.75.75 0 0 1-.018-1.042l2.97-2.97H3.75a.75.75 0 0 1 0-1.5h7.44L8.22 4.03a.75.75 0 0 1 0-1.06" />
        </svg>
    </a>
    @endif

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card border">
                <div class="card-body">
                    <h4 class="mb-4">Daftar Murid Dikelas Anda</h4>
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Cari Siswa..." id="searchStudent">
                        </div>

                        <div class="col-md-2">
                            <select class="form-select" id="filterGender">
                                <option value="">10 - 30 poin</option>
                                <option value="">30 - 60 poin</option>
                                <option value="">60 - 100 poin</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select class="form-select" id="filterAttendance">
                                <option value="">Tampilkan Semua</option>
                                <option value="">Terbaru</option>
                                <option value="">Terlama</option>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </div>

                    <div class="table-responsive rounded-2 mt-3">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th class="text-white" style="background-color: #5D87FF;">No</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Nama</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Email</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Poin</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($classroom->classroomStudents as $classroomStudent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $classroomStudent->student->user->name }}</td>
                                        <td>{{ $classroomStudent->student->user->email }}</td>
                                        <td>{{ $classroomStudent->student->point }}</td>
                                        <td>
                                            <button type="button" class="btn font-medium btn-primary text-white">Detail</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center align-middle">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                                <p class="fs-5 text-dark text-center mt-2">
                                                    Kelas kosong
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('teacher.pages.dashboard.scripts.donut-chart')
@endsection
