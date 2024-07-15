@extends('school.layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h3>Detail Sekolah</h3>

    <div class="gap-3">
        <a href="{{ route('settings-information.edit') }}" class="btn btn-success me-2">Edit Informasi</a>
        <button class="btn btn-primary btn-rfid">Tambah Master Key</button>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row pb-4 mt-5 mx-3">
            <div class="d-flex align-items-center mb-5">
                <img class="card-img-top img-responsive me-3" style="max-height:80px; width: auto;" src="{{ asset('admin_assets/dist/images/profile/smkn1kepanjen.png') }}" alt="Card image cap">
                <div class="d-flex flex-column flex-sm-row justify-content-between w-100 ms-3">
                    <div>
                        <h3 class="mb-1">{{ $school->user->name }}</h3>
                        <span class="badge font-medium bg-light-primary text-primary">{{ $school->type }}</span>
                    </div>
                    <div>
                        <h5 class="mb-1">Tahun Ajaran</h5>
                        <h5>{{ $schoolYear->school_year }}</h5>
                    </div>
                </div>
            </div>
            <hr>

            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div class="col-md-5 mb-3 mb-md-0">
                    <div class="d-flex justify-content-between">
                        <h6>Kepala Sekolah :</h6>
                        <p>{{ $school->head_school }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>NPSN :</h6>
                        <p>{{ $school->npsn }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Nomor Telepon :</h6>
                        <p>{{ $school->phone_number }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Email</h6>
                        <p>{{ $school->user->email }}</p>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="d-flex justify-content-between">
                        <h6>Jenjang Pendidikan :</h6>
                        <p>{{ $school->level }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Akreditasi :</h6>
                        <p>{{ $school->accreditation }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Deskripsi :</h6>
                        <p>{{ $school->description != null ? $school->description : '-' }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Alamat:</h6>
                        <div class="ms-5">
                            <p class="text-end">{{ $school->address }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-create-masterKey" tabindex="-1" aria-labelledby="tambahRfid" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('master-key.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRfid">Tambah Master Key</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        Anda bisa menggunakan reader card untuk menambahkan master key
                    </div>
                    <div>
                        <input type="text" name="rfid" class="form-control">
                        @error('rfid')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
    <script>
        $('.btn-rfid').on('click', function() {
            $('#modal-create-masterKey').modal('show');
        });
    </script>
@endsection