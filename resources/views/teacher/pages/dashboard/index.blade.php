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
                        <div class="col-lg-8">
                            <h5><b>Wali Kelas Dari</b></h5>
                            <h3 class="my-4"><b>XII RPL 1</b></h3>
                            <div class="badge bg-light-primary text-primary fs-5">34 Total Siswa</div>
                        </div>
                        <div class="col-lg-4">
                            <img src="{{ asset('assets/images/Topi.png') }}">
                        </div>
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
                        <h4>10 Mei 2023 - 08.00</h4>
                    </div>
                    <div class="badge bg-light-success text-success fs-6 pt-4 px-5">Masuk</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <h4>Jadwal Mengajar Hari ini</h4>
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
            
        </div>
        <div class="col-lg-4">

        </div>
    </div>


    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Selamat Datang</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-dark text-decoration-none"
                                    href="javascript:void(0)">Halaman Dashboard Guru</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
