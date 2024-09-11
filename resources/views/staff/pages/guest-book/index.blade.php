@extends('staff.fulllayouts.app')

@section('title')
    Buku Tamu
@endsection

@section('content')
    <h2 class="text-white pt-3"><b>Selamat Datang di Buku Tamu</b></h2>
    <h6 class="text-white">Kunjungan akan di simpan dibuku tamu dan direkap oleh sekolah</h6>

    <div class="row">
        <div class="col-12 pt-3">
            <div class="card p-2 shadow" style="border: none; border-radius: 30px">
                <div class="card-body">
                    <form action="{{ route('employee.guestbook.store') }}" method="POST" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class="d-flex align-items-center justify-content-between" style="border-bottom: 2px solid #CCCCCC; padding-bottom: 5px;">
                            <h5 class="mb-4">
                                <b>Pengisian Form</b>
                            </h5>
                            <span id="currentDate" class="mb-1 badge bg-light-warning text-warning" style="font-size: 14px; border-radius: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z" />
                                </svg>
                            </span>
                        </div>


                        <div class="row">
                            <div class="col-8 pt-3">
                                <div class="d-flex align-items-center">
                                    <span class="mb-1 badge  p-2"
                                        style="color: white; background-color: #5D87FF; border-radius: 11px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 192 512">
                                            <path fill="currentColor"
                                                d="M48 80a48 48 0 1 1 96 0a48 48 0 1 1-96 0M0 224c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v224h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h32V256H32c-17.7 0-32-14.3-32-32" />
                                        </svg>
                                    </span>
                                    <h5 class="ms-3 mb-0">Informasi</h5>
                                </div>
                                <p class="pt-2" style="font-size: 15px;">Fitur buku tamu ini memungkinkan
                                    Anda mencatat dan melacak data pengunjung, memberikan catatan lengkap tentang siapa
                                    saja yang telah berkunjung</p>

                                <div class="row">
                                    <input type="hidden" name="date" id="currentDateInput">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name1" class="mb-2"><b>Nama</b></label>
                                            <input type="text" class="form-control" id="name1"
                                                placeholder="Masukkan nama" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status" class="mb-2"><b>Status</b></label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="individual">Individu</option>
                                                <option value="negeri">Negeri</option>
                                                <option value="swasta">Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="mb-2"><b>Email</b></label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Masukkan email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number" class="mb-2"><b>Nomor Telepon</b></label>
                                            <input type="number" class="form-control" id="phone_number"
                                                placeholder="Masukkan nomor telepon" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position" class="mb-2"><b>Jabatan</b></label>
                                            <input type="text" class="form-control" id="position"
                                                placeholder="Masukkan jabatan" name="position">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="instansi-container" style="display: none;">
                                        <div class="form-group">
                                            <label for="address" class="mb-2"><b>Asal Instansi</b></label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="Masukkan asal instansi" name="address">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4" style="margin-top: 118px">
                                <label for="needs" class="mb-2"><b>Keperluan</b></label>
                                <textarea class="form-control" id="needs" placeholder="Masukkan keperluan" name="needs" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn mb-1 waves-effect waves-light px-5" type="submit"
                                style="background-color: #13DEB9; color: white;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('staff.pages.guest-book.scripts.script-input')
@endsection
