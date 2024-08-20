@extends('school.layouts.app')

@section('content')
    {{-- <div class="card bg-primary shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold text-white">Pelanggaran</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                href="javascript:void(0)">Daftar dan atur pelanggaran sekolah di sini</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                        class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div> --}}

    {{-- <div class="card w-100">
        <div class="card-body">
        </div>
    </div> --}}

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </div>
            <div class="mb-3 mb-md-0 me-md-3">
                <select name="points" class="form-select">
                    <option value="highest">Point Tertinggi</option>
                    <option value="lowest">Point Terendah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <button class="btn btn-primary btn-create" type="button">Tambah Pelanggaran</button>
    </div>

    <div class="row">
        @forelse ($regulations as $regulation)
            <div class="col-lg-4 col-md-12">
                <div class="card border shadow">
                    <div class="card-body py-4 px-4">
                        <div class="justify-content-between d-flex align-items-center">
                            <div>
                                <h6>Ditambahkan pada :</h6>
                            </div>
                            <div class="d-flex">
                                <h6>{{ $regulation->created_at->format('j F Y') }}</h6>
                                <div class="category-selector btn-group">
                                    <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                        <div class="category d-flex align-items-center">
                                            <div class="category-business"></div>
                                            <div class="category-social"></div>
                                            <span class="more-options text-dark ms-2">
                                                <i class="ti ti-dots-vertical fs-5"></i>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end category-menu overflow-auto"
                                        style="max-height: 200px;">
                                        <button type="button" data-id="{{ $regulation->id }}"
                                            data-violation="{{ $regulation->violation }}"
                                            data-point="{{ $regulation->point }}"
                                            class="btn-update note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center">
                                            Edit
                                        </button>
                                        <button
                                            class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete"
                                            data-id="{{ $regulation->id }}">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-start mt-1 ">
                            <h5><strong>{{ $regulation->violation }}</strong></h5>
                        </div>
                        <div class="justify-content-between d-flex mt-4 align-items-center">
                            <div>
                                <h6>Point Pelanggaran :</h6>
                            </div>
                            <span class="mb-1 badge font-medium bg-light-danger text-danger">+ {{ $regulation->point }}
                                point</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>

    @include('school.new.violation.widgets.modal-create-violation')
    @include('school.new.violation.widgets.modal-update-violation')
    <x-delete-modal-component />
@endsection

@section('script')
    @include('school.new.violation.scripts.script-modal-create')
    @include('school.new.violation.scripts.script-modal-update')
    @include('school.new.violation.scripts.script-modal-delete')
@endsection
