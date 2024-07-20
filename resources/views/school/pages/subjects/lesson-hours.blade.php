@extends('school.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="name" value="{{ old('name', request('name')) }}"
                            class="form-control search-chat py-2 px-4 ps-5" id="search-name" placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                    Tambah Jam Pelajaran
                </button>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <div class="table-responsive rounded-2">
            <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jam</th>
                        <th>Penempatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $lastHour = $lessonHours->sortByDesc('end')->first();
                        if ($lastHour->name != 'Istirahat') {
                            preg_match('/\d+/', $lastHour->name, $matches);
                            $jam = $matches[0];
                        }
                    @endphp

                    @forelse ($lessonHours as $lessonHour)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lessonHour->start }} - {{ $lessonHour->end }}</td>
                            <td>{{ $lessonHour->name }}</td>
                            <td>
                                <div class="gap-3">
                                    <button class="btn btn-light-primary text-primary me-2 btn-edit" data-bs-toggle="modal"
                                        data-id="{{ $lessonHour->id }}" data-start="{{ $lessonHour->start }}"
                                        data-end="{{ $lessonHour->end }}" data-name="{{ $lessonHour->name }}">Edit</button>
                                    <button class="btn btn-light-danger text-danger btn-delete"
                                        data-id="{{ $lessonHour->id }}">Hapus</button>
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
                                        RFID belum ditambahkan
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$lessonHours" />
    </div>

    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPelajaran">Tambah Jam Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('lesson-hours.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="">Jam Mulai<span class="text-danger">*</span></label>
                                <input type="time" name="start" class="form-control @error('end') is-invalid @enderror"
                                    value="{{ $lastHour->end }}">
                                @error('start')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            {{-- @dd(Carbon\Carbon::create($lastHour->start)->addMinute(45)->format('H:i')) --}}
                            <div class="col-lg-6 mb-3">
                                <label for="">Jam Berakhir<span class="text-danger">*</span></label>
                                <input type="time" name="end" value="{{ Carbon\Carbon::create($lastHour->start)->addMinutes(45 * 2)->format('H:i') }}"
                                    class="form-control @error('end') is-invalid @enderror">
                                @error('end')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Jam Ke-<span class="text-danger">*</span></label>
                                <input type="number" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ isset($jam) ? $jam + 1 : '' }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch">
                                    Istirahat
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPelajaran">Edit Jam Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="form-update">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="">Jam Mulai<span class="text-danger">*</span></label>
                                <input type="time" name="start"
                                    class="form-control @error('start') is-invalid @enderror" id="start">
                                @error('start')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="">Jam Berakhir<span class="text-danger">*</span></label>
                                <input type="time" name="end"
                                    class="form-control @error('end') is-invalid @enderror" id="end">
                                @error('end')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Jam Ke-<span class="text-danger">*</span></label>
                                <input type="number" name="name"
                                    class="form-control @error('name') is-active @enderror" id="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    Istirahat
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var start = $(this).data('start');
            var end = $(this).data('end');
            var name = $(this).data('name');

            // get hour number
            const matches = name.match(/\d+/);
            const hour = matches ? matches[0] : null;

            $('#name').val(hour);
            $('#start').val(start);
            $('#end').val(end);
            $('#modal-update').modal('show');
            $('#form-update').attr('action', `{{ route('lesson-hours.update', '') }}/${id}`);
        })
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#modal-delete').modal('show');
            $('#form-delete').attr('action', `{{ route('lesson-hours.destroy', '') }}/${id}`);
        })
    </script>
@endsection
