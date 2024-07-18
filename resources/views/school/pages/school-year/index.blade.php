@extends('school.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="name" value="{{ old('name', request()->name) }}" class="form-control search-chat py-2 px-5 ps-5" id="search-name"
                            placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                    Tambah Tahun Ajaran
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive rounded-2">
        <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($schoolYears as $schoolYear)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schoolYear->school_year }}</td>
                        <td>{{ $schoolYear->active == 1 ? 'Aktif' : 'Tidak aktif' }}</td>
                        <td>
                            <div class="gap-3">
                                <button class="btn btn-edit btn-light-primary text-primary mb-2 me-2"
                                    data-id="{{ $schoolYear->id }}" data-year="{{ $schoolYear->school_year }}"
                                    data-status="{{ $schoolYear->active }}">Edit</button>
                                <button class="btn btn-delete btn-light-danger text-danger mb-2"
                                    data-id="{{ $schoolYear->id }}">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Tahun ajaran belum ditambahkan
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$schoolYears" />
    </div>

    <x-delete-modal-component />

    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahTahunAjaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahTahunAjaran">Tambah Tahun Ajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school-year.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Tahun Ajaran</label>
                            <input type="text" name="school_year" class="form-control">
                            @error('school_year')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="active" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            @error('active')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="tambahTahunAjaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahTahunAjaran">Tambah Tahun Ajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Tahun Ajaran</label>
                            <input type="text" id="year-update" name="school_year" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="active" class="form-control" id="active-update">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            @error('active')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var year = $(this).data('year');
            var status = $(this).data('status');
            $('#form-update').attr('action', '/school/update-school-year/' + id);
            $('#year-update').val(year);
            $('#active-update').val(status).trigger('change');
            $('#modal-update').modal('show');
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/delete-school-year/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
