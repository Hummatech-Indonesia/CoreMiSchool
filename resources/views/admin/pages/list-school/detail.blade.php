@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="gap-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>Detail Sekolah</h4>
                            <div class="row pb-4 mt-5 mx-3">
                                <div class="d-flex align-items-center mb-5">
                                    <img class="card-img-top img-responsive me-3" style="max-height:80px; width: auto;"
                                        src="{{ asset('admin_assets/dist/images/profile/smkn1kepanjen.png') }}"
                                        alt="Card image cap">
                                    <div class="d-flex justify-content-between w-100 ms-3">
                                        <div>
                                            <h3 class="mb-1">SMK NEGERI 1 KEPANJEN</h3>
                                            <span class="badge font-medium bg-light-primary text-primary">Negeri</span>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Tahun Ajaran</h5>
                                            <h5>2023/2024</h5>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="d-flex justify-content-between">
                                    <div class="col-md-5">
                                        <div class="d-flex justify-content-between">
                                            <h6>Kepala Sekolah :</h6>
                                            <p>Lasmono S.Pd.Mm</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>NPSN :</h6>
                                            <p>123123123</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Nomor Telepon :</h6>
                                            <p>082229414949</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Email</h6>
                                            <p>smkn1kepanjen@gmail.com</p>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="d-flex justify-content-between">
                                            <h6>Jenjang Pendidikan :</h6>
                                            <p>SMA/SMK/MA</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Akreditasi :</h6>
                                            <p>A</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Deskripsi :</h6>
                                            <p>SMA/SMK/MA</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>Alamat:</h6>
                                            <div class="ms-5">
                                                <p class="text-end">Jl, Ngadiluwih, Kedungpedaringan, Kec. Kepanjen, Kabupaten Malang, Jawa Timur 65163, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
