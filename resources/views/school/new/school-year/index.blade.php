@extends('school.layouts.app')

@section('content')
<div class="card bg-primary shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold text-white mb-8">Tahun Ajaran</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="javascript:void(0)">Atur tahun ajaran dan semester disini</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" href="#pills-student" role="tab" aria-controls="pills-student" aria-selected="true">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 24 24"><path fill="currentColor" d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z"/></svg>
            Tahun Ajaran
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-semesters-tab" data-bs-toggle="pill" href="#pills-semesters" role="tab" aria-controls="pills-semesters" aria-selected="false">
            Semester
        </a>
    </li>
    <li class="nav-item ms-auto">
        <a href="javascript:void(0)" class="btn btn-primary d-flex align-items-center px-3" data-bs-toggle="modal" data-bs-target="#modal-create-school-year">
          <span class="d-none d-md-block font-weight-medium fs-3">Tambah tahun ajaran</span>
        </a>
      </li>
</ul>

<div class="tab-content mt-4" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
      @include('school.new.school-year.panes.tab-school-year')
    </div>
    <div class="tab-pane fade" id="pills-semesters" role="tabpanel" aria-labelledby="pills-semesters-tab">
      @include('school.new.school-year.panes.tab-semesters')
    </div>
</div>

{{-- modal --}}
@include('school.new.school-year.widgets.modal-create-school-year')
@include('school.new.school-year.widgets.modal-update-school-year')
@include('school.new.school-year.widgets.modal-confirm-active')

<x-delete-modal-component />

@endsection

@section('script')
<script>
    $('.btn-update-year').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');
        $('#name-update').val(name);
        $('#status-update').val(status).trigger('change');
        $('#form-update').attr('action', '{{ route('school.school-years.update', '') }}/' + id);
        $('#modal-update-school-year').modal('show');
    });

    $('.btn-delete-year').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.school-years.destroy', '') }}/' + id);
        $('#modal-delete').modal('show');
    });
</script>

@endsection
