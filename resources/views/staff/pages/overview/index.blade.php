@extends('staff.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <style>
        .nav-tabs .nav-link {
            margin-bottom: calc(-1* var(--bs-nav-tabs-border-width));
            border: var(--bs-nav-tabs-border-width) solid transparent;
            border-top-left-radius: var(--bs-nav-tabs-border-radius);
            border-top-right-radius: var(--bs-nav-tabs-border-radius);
            color: rgba(var(--bs-primary-rgb), var(--bs-border-opacity));
            border-radius: 5px;
            margin-right: 0.5px;
        }
    </style>
@endsection

@section('content')
    @include('staff.pages.overview.panes.corousel')

    <div class="row d-flex align-items-stretch">
        <div class="col-lg-3">
            <div class="card shadow-none position-relative overflow-hidden h-75"
                style="background: linear-gradient(to bottom, #5D87FF, #5D87FF);">
                <div class="card-body px-4 py-3 position-relative">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="fw-semibold text-white mb-4 pt-3">Maks Poin Pada Sekolah</h5>
                            </div>
                            <nav aria-label="breadcrumb">
                                <span class="badge fw-semibold fs-8 text-primary bg-white p-2 px-3">200</span>
                            </nav>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Image"
                        class="position-absolute"
                        style="bottom: 0; right: 0; width: 130px; height: auto; margin-bottom: -10px; margin-right: -10px;">
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card border border-grey shadow-none position-relative overflow-hidden h-75"
                style="background-color: #FEF5E5;">
                <div class="card-body px-4 py-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fs-5 mt-1"><b>Poin Peringatan</b></h4>
                            <nav aria-label="breadcrumb">
                                <ul style="list-style-type:disc; padding-left: 20px; padding-bottom: 10px">
                                    @forelse (range(1, 3) as $schoolPoint)
                                        <li style="padding-bottom: 3px">Poin peringatan 110+ :
                                            Lorem, ipsum dolor.</li>
                                    @empty
                                        <li style="padding-bottom: 3px">Poin peringatan belum ditambahkan</li>
                                    @endforelse
                                    <li style="padding-bottom: 3px">Guru diharuskan untuk menindak lanjuti siswa yang
                                        mempunyai banyak poin Pelanggaran</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 d-flex">
        <div class="card w-100 h-100 overflow-hidden border">
            <div class="card-body">
                <div class="row align-items-center">
                    <div id="chart-violation" class="d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('script')
    @include('staff.pages.overview.scripts.script-corousel')
    @include('staff.pages.overview.scripts.script-line-chart')
@endsection