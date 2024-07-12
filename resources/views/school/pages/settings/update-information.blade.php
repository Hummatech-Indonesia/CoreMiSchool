@extends('school.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-4 mt-5 mx-3">
            <h4>Edit Profil Sekolah</h4>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('admin_assets/dist/images/profile/smkn1kepanjen.png') }}" width="180px" alt="">
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-primary px-4">Ganti Foto</button>
            </div>

            <div class="row mt-5">
                <div class="col-md-6 mb-4">
                    <label for="">Nama Sekolah</label>
                    <input type="text" class="form-control mt-1" placeholder="Masukan nama sekolah">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Kepala Sekolah</label>
                    <input type="text" class="form-control mt-1" placeholder="Masukan kepala sekolah">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Email Sekolah</label>
                    <input type="text" class="form-control mt-1" placeholder="Masukan email sekolah">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Telepon Sekolah</label>
                    <input type="text" class="form-control mt-1" placeholder="Masukan telepon sekolah">
                </div>
                <div class="col-md-12 mb-4">
                    <label for="">Alamat Sekolah</label>
                    <textarea name="" class="form-control mt-1" id="" placeholder="Masukan alamat sekolah" rows="6"></textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Akreditasi</label>
                    <input type="text" class="form-control mt-1" placeholder="Masukan akreditasi sekolah">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Website</label>
                    <input type="text" class="form-control" name="" id="" placeholder="Masukan website sekolah">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Kode Pos</label>
                    <input type="text" class="form-control" name="" id="" placeholder="Masukan kode pos sekolah">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">NPSN</label>
                    <input type="text" class="form-control" name="" id="" placeholder="Masukan NPSN sekolah">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">NIP</label>
                    <input type="text" class="form-control" name="" id="" placeholder="Masukan NIP sekolah">
                </div>

                <div class="text-end">
                    <button class="btn btn-primary me-2">Kembali</button>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
