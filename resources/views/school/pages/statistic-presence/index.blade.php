@extends('school.layouts.app')

@section('style')
<style>
    .apexcharts-toolbar {
        display: none !important;
    }

    #custom-legend {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 10px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        margin-right: 15px;
    }

    .legend-marker {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin-right: 5px;
    }

    .legend-text {
        font-size: 12px;
        color: #373d3f;
        font-family: Helvetica, Arial, sans-serif;
    }

</style>
@endsection

@section('content')
<div class="card bg-primary shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-12">
                <h4 class="fw-semibold text-white mb-8">Statistik Absensi</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="javascript:void(0)">Statistik absensi siswa dan pegawai</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" href="#pills-student" role="tab" aria-controls="pills-student" aria-selected="true">
            Keseluruhan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-alumni-tab" data-bs-toggle="pill" href="#pills-alumni" role="tab" aria-controls="pills-alumni" aria-selected="false">
            Detail
        </a>
    </li>
    <li class="nav-item d-flex align-items-center ms-md-auto mt-2 gap-2 mt-md-0 guru-buttons">
        <input type="date" name="" class="form-control" id="">
        <button type="button" class="btn btn-primary">
            Cari
        </button>
    </li>
</ul>

<div class="tab-content mt-4" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
        @include('school.pages.statistic-presence.panes.tab-student')
    </div>
    <div class="tab-pane fade" id="pills-alumni" role="tabpanel" aria-labelledby="pills-alumni-tab">
        @include('school.pages.statistic-presence.panes.tab-employee')
    </div>
</div>


<x-delete-modal-component />
@endsection

@section('script')
@include('school.pages.statistic-presence.script.chart')
@endsection