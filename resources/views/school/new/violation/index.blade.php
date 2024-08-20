@extends('school.layouts.app')

@section('content')
    <div class="row d-flex align-items-stretch">
        <div class="col-lg-8">
            <div class="card bg-primary shadow-none position-relative overflow-hidden h-75">
                <div class="card-body px-4 py-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold text-white fs-5 mt-1">Daftar Pelanggaran</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-white fs-2" href="javascript:void(0)">daftar-daftar pelanggaran
                                            disekolah</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-3">
                            <div class="text-center mb-n5">
                                <img src="{{ asset('admin_assets/dist/images/breadcrumb/pagar.png') }}" width="130px"
                                    alt="" class="img-fluid mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-none position-relative overflow-hidden h-75"
                style="background: linear-gradient(to bottom, #FFE252, #ffc107);">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="fw-semibold text-white mb-8">Statistik Absensi</h5>
                                <span class="mb-1 badge bg-white p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-warning" width="15"
                                        height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                                    </svg>
                                </span>
                            </div>
                            <nav aria-label="breadcrumb">
                                <span class="badge fw-semibold fs-6 text-warning bg-white p-2">200 Point</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </div>
            <div class="mb-3 mb-md-0 me-md-3">
                <select name="points" class="form-select">
                    <option value="highest">Laki-laki</option>
                    <option value="lowest">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 mb-md-0 me-md-3">
                <select name="points" class="form-select">
                    <option value="highest">Point Tertinggi</option>
                    <option value="lowest">Point Terendah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <div class="d-flex align-items-center">
            <button class="btn btn-warning btn-create d-flex align-items-center" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="me-2">
                    <path fill="currentColor"
                        d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2" />
                </svg>
                Setting Maksimal Point
            </button>

            <button class="btn btn-primary btn-create ms-2" type="button">Tambah Pelanggaran</button>
        </div>

    </div>

    <div class="row">
        {{-- @forelse ($regulations as $regulation)
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
        @endforelse --}}

        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="text-start">Jenis Pelanggaran</th>
                        <th class="text-center">Point</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($regulations as $regulation)
                        <tr>
                            <td class="text-start">{{ $regulation->violation }}</td>
                            <td class="text-center">
                                <span class="mb-1 badge font-medium bg-light-primary text-primary w-50"><b>+
                                        {{ $regulation->point }}</b></span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5">
                                                <path d="M3 13c3.6-8 14.4-8 18 0" />
                                                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                                            </g>
                                        </svg>
                                    </a>
                                    <a data-id="{{ $regulation->id }}" data-violation="{{ $regulation->violation }}"
                                        data-point="{{ $regulation->point }}" class="btn-update" type="button">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="text-warning" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                        </svg>
                                    </a>

                                    <a data-id="{{ $regulation->id }}" type="button" class="btn-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="text-danger" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-width="2"
                                                d="M9.5 14.5v-3m5 3v-3M3 6.5h18v0c-1.404 0-2.107 0-2.611.337a2 2 0 0 0-.552.552C17.5 7.893 17.5 8.596 17.5 10v5.5c0 1.886 0 2.828-.586 3.414s-1.528.586-3.414.586h-3c-1.886 0-2.828 0-3.414-.586S6.5 17.386 6.5 15.5V10c0-1.404 0-2.107-.337-2.611a2 2 0 0 0-.552-.552C5.107 6.5 4.404 6.5 3 6.5zm6.5-3s.5-1 2.5-1s2.5 1 2.5 1" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                        width="300px">
                                    <p class="fs-5 text-dark text-center mt-2">
                                        Belum ada data
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

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
