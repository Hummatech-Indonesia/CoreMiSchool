@extends('staff.fulllayouts.app')

@section('title')
    Detail Siswa
@endsection

@section('style')
    <style>
        .label-profile {
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection

@section('content')
    <h2 class="text-white ms-3"><b>Catatan Pelanggaran & Perbaikan</b></h2>
    <h4 class="text-white ms-3 mb-5">Ardian Supriadi Jaga Kali Brantas </h4>

    <div class="row">
        <div class="col-lg-3">
            <div class="col-lg-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <h4>Profil Siswa</h4>
                        <div class="text-center">
                            <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded-circle" width="125" height="125">
                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                <h5><b>Ardian Supriadi Jago Kali</b></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>RFID</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>0923892733834</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>Kelas</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>XI RPL 1</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>Jenis Kelamin</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>Laki - Laki</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>Agama</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>Islam</h6>
                                <hr class="full-width-hr">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title fw-semibold mb-0 me-1">
                                <b>Total Point</b>
                            </h5>
                            <div class="d-flex align-items-center justify-content-center"
                                style="width: 24px; height: 24px; background-color: #FEF5E5; border-radius: 50%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                    style="color: #FFAE1F;">
                                    <path fill="currentColor"
                                        d="M15.333 9.5A3.5 3.5 0 0 0 8.8 7.75a1 1 0 0 0 1.733 1a1.5 1.5 0 0 1 1.3-.75a1.5 1.5 0 1 1 0 3h-.003a1 1 0 0 0-.19.039a1 1 0 0 0-.198.04a1 1 0 0 0-.155.105a1 1 0 0 0-.162.11a1 1 0 0 0-.117.174a1 1 0 0 0-.097.144a1 1 0 0 0-.043.212a1 1 0 0 0-.035.176v1l.002.011v.491a1 1 0 0 0 1 .998h.003a1 1 0 0 0 .998-1.002l-.002-.662A3.49 3.49 0 0 0 15.333 9.5m-4.203 6.79a1 1 0 0 0 .7 1.71a1.04 1.04 0 0 0 .71-.29a1.015 1.015 0 0 0 0-1.42a1.034 1.034 0 0 0-1.41 0" />
                                </svg>
                            </div>
                        </div>

                        <div class="card position-relative mt-3 py-3 rounded-4"
                            style="background: linear-gradient(135deg, #51B6FF, #4F7CFF); color: #fff;">
                            <div class="card-body p-3" style="background: none;">
                                <h6 class="text-light text-center" style="font-size: 24px"><b>Jumlah Point</b></h6>
                                <h1 class="text-light text-center" style="font-size: 48px"><b>40</b></h1>
                                <p class="card-text text-center" style="font-size: 13px">Siswa dapat melakukan perbaikan
                                    untuk
                                    mengurangi poin.</p>
                                <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Image" class="position-absolute"
                                    style="bottom: 0; right: 0; width: 130px; height: auto; margin-bottom: 0px; margin-right: 0px; border-bottom-right-radius: 10px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
