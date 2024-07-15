@extends('school.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-4 mt-5 mx-3">
            <h4>Edit Profil Sekolah</h4>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/'.$school->image) }}" width="180px" alt="">
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-primary px-4">Ganti Foto</button>
            </div>

            <form action="{{ route('settings-information.update') }}" method="POST">
                @csrf
                <div class="row mt-5">
                    <div class="col-md-6 mb-4">
                        <label for="">Nama Sekolah</label>
                        <input type="text" class="form-control mt-1" placeholder="Masukan nama sekolah" name="name" value="{{ old('name', $school->user->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Kepala Sekolah</label>
                        <input type="text" class="form-control mt-1" placeholder="Masukan kepala sekolah" name="head_school" value="{{ old('head_school', $school->head_school) }}">
                        @error('head_school')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Email Sekolah</label>
                        <input type="text" class="form-control mt-1" placeholder="Masukan email sekolah" name="email" value="{{ old('email', $school->user->email) }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Telepon Sekolah</label>
                        <input type="text" name="phone_number" class="form-control mt-1" placeholder="Masukan telepon sekolah" value="{{ old('phone_number', $school->phone_number) }}">
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Alamat Sekolah</label>
                        <textarea name="address" class="form-control mt-1" placeholder="Masukan alamat sekolah" rows="6">{{ old('address', $school->address) }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Akreditasi</label>
                        <input type="text" class="form-control mt-1" name="accreditation" placeholder="Masukan akreditasi sekolah" value="{{ old('accreditation', $school->accreditation) }}">
                        @error('accreditation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website_school" id="" placeholder="Masukan website sekolah" value="{{ old('website_school', $school->website_school) }}">
                        @error('website_school')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">Kode Pos</label>
                        <input type="text" class="form-control" name="pas_code" id="" placeholder="Masukan kode pos sekolah" value="{{ old('pas_code', $school->pas_code) }}">
                        @error('pas_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">NPSN</label>
                        <input type="text" class="form-control" name="npsn" id="" placeholder="Masukan NPSN sekolah" value="{{ old('npsn', $school->npsn) }}">
                        @error('npsn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">NIP</label>
                        <input type="text" class="form-control" name="nip" id="" placeholder="Masukan NIP sekolah" value="{{ old('nip', $school->nip) }}">
                        @error('nip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-end">
                        <a href="{{ route('settings-information.index') }}" class="btn btn-primary me-2">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
