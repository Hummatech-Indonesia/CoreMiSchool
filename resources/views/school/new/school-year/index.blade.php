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
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 16 16">
                <path fill="currentColor" d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" /></svg>
            Tahun Ajaran
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-semesters-tab" data-bs-toggle="pill" href="#pills-semesters" role="tab" aria-controls="pills-semesters" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 24 24"><path fill="currentColor" d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z"/></svg>
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

<x-delete-modal-component />

@endsection

@section('script')
<script>
    $('.btn-update-year').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');
        $('#name-update').text(name);
        $('#status-update').text(status);
        $('#form-update').attr('action', '{{ route('school.school-years.update', '') }}/' + id);
        $('#modal-update-student').modal('show');
    });

    $('.btn-delete-year').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.school-years.destroy', '') }}/' + id);
        $('#modal-delete').modal('show');
    });
</script>

@endsection
