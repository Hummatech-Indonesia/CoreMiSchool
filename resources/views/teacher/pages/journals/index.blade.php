@extends('teacher.layouts.app')
@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8 text-dark">Jurnal dan Absensi</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-dark fs-3" aria-current="page">{{ auth_user()->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <h4>Jurnal</h4>
            {{-- <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="name" value="{{ old('name', request('name')) }}" class="form-control search-chat py-2 px-5 ps-5" id="search-name" placeholder="Cari">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
            <div class="d-flex gap-2">
                <div class="form-group">
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form> --}}
        </div>
        {{-- <div class="col-lg-6 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('teacher.journals.create') }}" type="button" class="btn mb-1 btn-success">
                    Tambah Jurnal
                </a>
            </div>
        </div> --}}
    </div>

    <div class="card shadow">
        <div class="card-body pt-3">
            <h4 class="pb-3">Jadwal Mengajar Hari Ini</h4>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="text-white rounded-start" style="background-color: #5D87FF;">Mapel</th>
                            <th class="text-white" style="background-color: #5D87FF;">Waktu</th>
                            <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                            <th class="text-white" style="background-color: #5D87FF;">Kelas</th>
                            <th class="text-white text-center" style="background-color: #5D87FF;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teacherSchedules as $lessonSchedule)
                            {{-- @php
                                dd(explode(' - ', $lessonSchedule->start->name)[1]);
                            @endphp --}}
                            <tr>
                                <td>{{ $lessonSchedule->teacherSubject->subject->name }}</td>
                                <td>{{ Carbon\Carbon::parse($lessonSchedule->start->start)->format('H:i') }} -
                                    {{ Carbon\Carbon::parse($lessonSchedule->end->end)->format('H:i') }}</td>
                                @if ($lessonSchedule->start->name != 'Istirahat')
                                    <td>Jam ke {{ explode(' - ', $lessonSchedule->start->name)[1] }} -
                                        {{ explode(' - ', $lessonSchedule->end->name)[1] }}</td>
                                @endif
                                <td>{{ $lessonSchedule->classroom->name }}</td>
                                <td class="text-center"><a
                                        href="{{ route('teacher.journals.create', $lessonSchedule->id) }}"
                                        class="btn btn-md btn-primary">Isi Jurnal</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center align-middle">
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
    {{-- <div class="pagination justify-content-end mt-2 mb-0">
    </div> --}}
    <div class="row me-3 mb-3">
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="d-flex align-items-center">
                <span class="mb-1 badge bg-primary p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                    </svg>
                </span>
                <h4 class="ms-3 mb-0">Riwayat Jurnal</h4>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach (range(1, 3) as $item)
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary" style="border-radius: 0.50rem;">
                        <h4 class="mb-0 text-white card-title">
                            20 Mei 2023
                        </h4>
                    </div>

                    <div class="card-body">
                        <h3 class="card-title mb-4">Total keseluruhan siswa tidak mengikuti pelajaran:</h3>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex">
                                <div class="text-center me-4">
                                    <div class="bg-light-info text-info d-inline-block px-3 py-2 rounded">
                                        <b class="fs-7">12</b>
                                    </div>
                                    <p class="fs-5">Izin</p>
                                </div>
                                <div class="text-center me-4">
                                    <div class="bg-light-warning text-warning d-inline-block px-3 py-2 rounded">
                                        <b class="fs-7">12</b>
                                    </div>
                                    <p class="fs-5">Sakit</p>
                                </div>
                                <div class="text-center">
                                    <div class="bg-light-danger text-danger d-inline-block px-3 py-2 rounded">
                                        <b class="fs-7">12</b>
                                    </div>
                                    <p class="fs-5">Alfa</p>
                                </div>
                            </div>
                            <a href="/journals/detail" class="btn btn-primary">Detail</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>


    {{-- <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$attendances" />
    </div> --}}

    <!-- modal upload -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Upload Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                            <form class="mt-3">
                                <input class="form-control" type="file" id="formFile">
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                            <select id="pengajar" class="form-select">
                                <option value="1">izin</option>
                                <option value="2">sakit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-info">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Edit Surat Izin Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                            <input class="form-control mb-2" type="file" id="formFile">
                            <small class="text-info">Download</small>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                            <select id="pengajar" class="form-select">
                                <option value="1">izin</option>
                                <option value="2">sakit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-info">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
