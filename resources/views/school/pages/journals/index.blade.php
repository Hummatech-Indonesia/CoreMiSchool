@extends('school.layouts.app')

@section('content')
<div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-8 col-md-9">
                <h4 class="fw-semibold mb-2 text-light">Jurnal Mengajar</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Daftar jurnal guru setelah kegiatan mengajar</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4 col-md-3 text-center mb-n5">
                <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                    class="img-fluid mb-n4">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid note-has-grid">
    <!-- Navigation Tabs -->
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row flex-wrap" id="nav-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                id="all-tab" data-bs-toggle="pill" href="#all-content" role="tab"
                aria-controls="teacher-content">
                <span class="d-none d-md-block font-weight-medium">Semua</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                id="fill-tab" data-bs-toggle="pill" href="#fill-content" role="tab"
                aria-controls="employee-content">
                <span class="d-none d-md-block font-weight-medium">Mengisi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                id="notfill-tab" data-bs-toggle="pill" href="#notfill-content" role="tab"
                aria-controls="employee-content">
                <span class="d-none d-md-block font-weight-medium">Tidak Mengisi</span>
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="all-content" role="tabpanel" aria-labelledby="all-tab">
            @include('school.pages.journals.panes.journal-all')
        </div>
        <div class="tab-pane fade" id="fill-content" role="tabpanel" aria-labelledby="fill-tab">
            @include('school.pages.journals.panes.journal-fill')
        </div>
        <div class="tab-pane fade" id="notfill-content" role="tabpanel" aria-labelledby="notfill-tab">
            @include('school.pages.journals.panes.journal-notfill')
        </div>
    </div>
</div>

@include('school.pages.journals.widgets.modal-detail')

@endsection

@section('script')
    @include('school.pages.journals.scripts.tab-script')
    @include('school.pages.journals.scripts.detail')
@endsection
