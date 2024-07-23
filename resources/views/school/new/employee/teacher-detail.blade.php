@extends('school.layouts.app')

@section('style')
    <style>
        .select2 {
            width: 100% !important;
        }

        .select2-selection__rendered {
            width: 100%;
            height: 100px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select2-selection {
            height: fit-content !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
        }
    </style>
@endsection

@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('assets/images/default-user.jpeg') }}"
                        alt="Profile Image" class="img-fluid rounded-circle" style="width: 84px; height: 84px;">

                </div>
                <div class="col">
                    <h4 class="fw-semibold mb-2 text-light">{{ $teacher->user->name }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 m-0">
                            <li class="breadcrumb-item" aria-current="page">{{ $teacher->user->email }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-12 mb-3 me-3 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <span class="mb-1 badge bg-primary p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                </svg>
            </span>
            <h4 class="ms-3 mb-0">Daftar Mata Pelajaran Guru</h4>
        </div>
        <div class="d-flex gap-2">
            <a href="/school/employees" type="button" class="btn px-4" style="background-color: #E8E8E8">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20 11v2H8l5.5 5.5l-1.42 1.42L4.16 12l7.92-7.92L13.5 5.5L8 11z" />
                </svg>
                Kembali
            </a>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#subject-teacher">
                Tambah Mapel Guru
            </button>
        </div>
    </div>

    @include('school.new.employee.widgets.teacher.create-subject')

    <div class="row">
        @forelse ($teacher_subjects as $teacher_subject)
            <div class="col-lg-4">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="mb-0">{{ $teacher_subject->subject->name }}</h4>
                        </div>
                        <div class="align-items-center pt-3">
                            <h6 class="mb-3">Jenis Pelajaran :</h6>
                            @if ($teacher_subject->subject->religion_id != null)
                                <div class="align-items-center pt-3">
                                    <h6 class="mb-3">Jenis Pelajaran :</h6>
                                    <div class="d-flex align-items-center">
                                        <span class="mb-1 badge font-medium fs-5 bg-light-warning text-warning">
                                            Keagamaan
                                        </span>
                                        <span class="mb-1 badge font-medium ms-2 fs-5 bg-light-primary text-primary">
                                            {{ $teacher_subject->subject->religion->name }}
                                        </span>
                                    </div>
                                </div>
                            @else
                                <span class="mb-1 badge font-medium fs-5 bg-light-primary text-primary">
                                    Umum
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Image Container -->
                    <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
                        <img src="{{ asset('assets/images/background/buble.png') }}" alt="Description" class="img-fluid"
                            style="max-width: 100px; height: auto;">
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                <p class="fs-5 text-dark text-center mt-2">
                    Belum ada data
                </p>
            </div>
        @endforelse
    </div>
@endsection

@section('script')

<script>
     $(document).ready(function() {
            $('.select2').select2({
                dropdownParent: $('#subject-teacher')
            });
        });
</script>
@endsection
