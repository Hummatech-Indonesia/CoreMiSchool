@extends('staff.layouts.app')

@section('style')
    <style>
        .table th,
        .table td {
            padding: 0.5rem;
        }

        .table .text-start {
            text-align: left;
        }

        .table .nama-col {
            width: 200px;
        }

        .table .nama-col .d-flex {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .table .text-center .btn {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .table .text-center .badge {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Perbaikan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-dark text-decoration-none"
                                    href="javascript:void(0)">Daftar siswa perbaikan untuk mengurangi point pelanggaran</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/welcome.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link d-flex align-items-center active" data-bs-toggle="tab" href="#student" role="tab"
                aria-selected="true">
                <span class="d-flex align-items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="20" height="20"
                        viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                    </svg>
                </span>
                <span class="d-none d-md-block">Siswa</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link d-flex align-items-center" data-bs-toggle="tab" href="#class" role="tab"
                aria-selected="false" tabindex="-1">
                <span class="d-flex align-items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"
                        class="me-2">
                        <path fill="currentColor"
                            d="M232 212h-20V40a20 20 0 0 0-20-20H64a20 20 0 0 0-20 20v172H24a12 12 0 0 0 0 24h208a12 12 0 0 0 0-24M68 44h120v168H68Zm104 88a16 16 0 1 1-16-16a16 16 0 0 1 16 16" />
                    </svg>
                </span>
                <span class="d-none d-md-block">Kelas</span>
            </a>
        </li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane active show" id="student" role="tabpanel">
            @include('staff.pages.top-violation.panes.student')
        </div>
        <div class="tab-pane" id="class">
            @include('staff.pages.top-violation.panes.class')
        </div>
    </div>
@endsection

@section('script')
@include('staff.pages.top-violation.script.script-tab')
@endsection
