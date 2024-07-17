@extends('school.layouts.app')

@section('style')
    <style>
        #keagamaan {
            display: none;
        }

        #editKeagamaan {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 mb-3">
            <div class="d-flex gap-2">
                <form class="flex-grow-1">
                    <div class="position-relative">
                        <input type="text" name="name" value="{{ old('name', request('name')) }}" class="form-control search-chat py-2 px-4 ps-5" id="search-name" placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </form>

                <select name="" class="form-select w-auto" id="search-status" style="width: 150px;">
                    <option value="">2023/2024</option>
                    <option value="">2024/2025</option>
                </select>
            </div>
        </div>


        <div class="col-lg-8 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#modal-create">
                    Tambah Pelajaran
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($maples as $maple)
            <div class="col-lg-3">
                <div class="card card-body bg-transparent border-2 shadow-none">
                    <div class="text-center">
                        <h5>{{ $maple->name }}</h5>
                        <div class="mt-4">
                            <button type="button" class="btn btn-edit mb-1 btn-primary px-4 me-2"
                                data-id="{{ $maple->id }}" data-name="{{ $maple->name }}"
                                data-religion="{{ $maple->religion_id }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-delete mb-1 btn-light-danger text-danger px-4"
                                data-id="{{ $maple->id }}">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                <p class="fs-5 text-dark text-center mt-2">
                    Mata pelajaran belum ditambahkan
                </p>
            </div>
        @endforelse
    </div>

    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPelajaran">Tambah Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Mata Pelajaran</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Kagamaan</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <div class="mb-3">
                            <select id="keagamaan" name="religion_id" class="form-select form-select mb-3">
                                <option value="">Pilih agama</option>
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPelajaran">Edit Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-edit" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" id="name-edit" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Kagamaan</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="check">
                            </div>
                        </div>
                        <div class="mb-3">
                            <select id="religion-edit" name="religion_id" class="form-select form-select mb-3">
                                <option value="">Pilih agama</option>
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var religion = $(this).data('religion');
            $('#form-edit').attr('action', '{{ route('subjects.update', '') }}/' + id);
            $('#name-edit').val(name);
            $('#religion-edit').val(religion).trigger('change');
            religion == '' ? $('#check').prop('checked', false) : $('#check').prop('checked', true);
            religion == '' ? $('#religion-edit').hide() : $('#religion-edit').show();
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/delete-subjects/' + id);
            $('#modal-delete').modal('show');
        });
    </script>

    <script>
        document.getElementById('flexSwitchCheckDefault').addEventListener('change', function() {
            var keagamaanSelect = document.getElementById('keagamaan');
            if (this.checked) {
                keagamaanSelect.style.display = 'block';
            } else {
                keagamaanSelect.style.display = 'none';
            }
        });

        document.getElementById('check').addEventListener('change', function() {
            var keagamaanSelect = document.getElementById('religion-edit');
            if (this.checked) {
                keagamaanSelect.style.display = 'block';
            } else {
                keagamaanSelect.style.display = 'none';
            }
        });
    </script>

    <script>
        document.getElementById('editflexSwitchCheckDefault').addEventListener('change', function() {
            var editKeagamaanSelect = document.getElementById('editKeagamaan');
            if (this.checked) {
                editKeagamaanSelect.style.display = 'block';
            } else {
                editKeagamaanSelect.style.display = 'none';
            }
        });
    </script>
@endsection
