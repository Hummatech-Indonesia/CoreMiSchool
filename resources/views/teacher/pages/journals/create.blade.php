@php
use Carbon\Carbon;
    use App\Enums\AttendanceEnum;
@endphp
@extends('teacher.layouts.app')

@section('style')
    <style>
        .select2-selection__rendered {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
        <div class="card-body px-4 py-4">
            <div class="d-flex justify-content-between">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8 text-dark">Pengisian Jurnal</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-dark fs-3" aria-current="page">{{ $lessonSchedule->teacherSubject->subject->name }} - {{ $lessonSchedule->classroom->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="bg-primary text-light d-flex flex-column align-items-center justify-content-center px-4 py-3 rounded"
                    style="width: 75px; height: 75px;">
                    <b class="fs-8">{{ now()->isoFormat('DD') }}</b>
                    <p class="mb-0 fs-3">{{ now()->isoFormat('MMM') }}</p>
                </div>

            </div>
        </div>
    </div>
    <form action="{{ route('teacher.journals.store', $lessonSchedule->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-6 mb-3">
                <h4>Tambah Jurnal</h4>
            </div>
        </div>

        {{-- description --}}
        <div class="card shadow">
            <div class="card-body">
                <h5 class="fw-bold pb-3">Laporan Kegiatan</h5>
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Tuliskan laporan di sini</label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                        placeholder="Tuliskan deskripsi kegiatan di sini...">{{ $teacherJournal->description ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- attendance --}}
        <div class="card shadow">
            <div class="card-body pt-3">
                <div class="d-flex flex-direction-row justify-content-between">
                    <h5 class="pb-3">Presensi Siswa</h5>
                </div>
                <div class="table-responsive rounded-2 mb-4">
                    <table class="table text-nowrap customize-table mb-0 align-middle" id="student-table">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="text-white rounded-start" style="background-color: #5D87FF;">Siswa</th>
                                <th class="text-white" style="background-color: #5D87FF;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classroomStudents as $classroomStudent)
                                <tr>
                                    <td>{{ $classroomStudent->student->user->name }}</td>
                                    <td>
                                        <div class="d-flex gap-5 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="attendance[{{ $classroomStudent->id }}]"
                                                    id="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::PRESENT->value }}"
                                                    value="{{ AttendanceEnum::PRESENT->value }}" checked>
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::PRESENT->value }}">
                                                    Masuk
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="attendance[{{ $classroomStudent->id }}]"
                                                    id="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::PERMIT->value }}"
                                                    value="{{ AttendanceEnum::PERMIT->value }}">
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::PERMIT->value }}">
                                                    Izin
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="attendance[{{ $classroomStudent->id }}]"
                                                    id="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::SICK->value }}"
                                                    value="{{ AttendanceEnum::SICK->value }}">
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::SICK->value }}">
                                                    Sakit
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="attendance[{{ $classroomStudent->id }}]"
                                                    id="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::ALPHA->value }}"
                                                    value="{{ AttendanceEnum::ALPHA->value }}">
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->id . '-' . AttendanceEnum::ALPHA->value }}">
                                                    Alpha
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-end mb-5">
            <a href="{{ route('teacher.journals.index') }}" type="button" class="btn mb-1 btn-light-secondary">
                Kembali
            </a>
            <button type="submit" class="btn mb-1 btn-success" id="submit-btn">
                Simpan Laporan
            </button>
        </div>
    </form>
@endsection
