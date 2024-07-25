@extends('school.layouts.app')
@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Jadwal Pelajaran</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">X RPL 1</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="card card-body shadow">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-pills rounded align-items-center flex-row" id="pills-tab" role="tablist">
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
        </div>
    </div>



    <div class="mt-2 card card-body shadow">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-senin" role="tabpanel" aria-labelledby="pills-senin-tab">
                @include('school.new.lesson-schedule.panes.tab-monday')
            </div>
            <div class="tab-pane fade" id="pills-selasa" role="tabpanel" aria-labelledby="pills-selasa-tab">
                @include('school.new.lesson-schedule.panes.tab-tuesday')
            </div>
            <div class="tab-pane fade" id="pills-rabu" role="tabpanel" aria-labelledby="pills-rabu-tab">
                @include('school.new.lesson-schedule.panes.tab-wednesday')
            </div>
            <div class="tab-pane fade" id="pills-kamis" role="tabpanel" aria-labelledby="pills-kamis-tab">
                @include('school.new.lesson-schedule.panes.tab-thursday')
            </div>
            <div class="tab-pane fade" id="pills-jumat" role="tabpanel" aria-labelledby="pills-jumat-tab">
                @include('school.new.lesson-schedule.panes.tab-friday')
            </div>
            <div class="tab-pane fade" id="pills-sabtu" role="tabpanel" aria-labelledby="pills-sabtu-tab">
                @include('school.new.lesson-schedule.panes.tab-saturday')
            </div>
            <div class="tab-pane fade" id="pills-minggu" role="tabpanel" aria-labelledby="pills-minggu-tab">
                @include('school.new.lesson-schedule.panes.tab-sunday')
            </div>
        </div>
    </div>

@endsection
