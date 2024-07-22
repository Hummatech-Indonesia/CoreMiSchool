@extends('school.layouts.app')
@section('content')
    <div class="col-12 col-md-6 col-lg-12 mb-3 me-3 d-flex justify-content-between">
        <form action="/school/class" class="position-relative d-flex align-items-center">
            <div class="input-group">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                <input type="text" class="form-control product-search ps-5" name="name"
                    value="{{ old('name', request()->name) }}" id="input-search" placeholder="Cari...">
            </div>
            <select class="form-select ms-2" name="filter" id="filter">
                <option value="">Pilih Kategori</option>
                <option value="religion">Keagamaan</option>
                <option value="general">Umum</option>
            </select>
        </form>
        <div class="text-end d-flex ">
            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#create">Tambah Pelajaran</button>
        </div>
    </div>


    <div class="row">
        @foreach (range(1, 3) as $item)
            <div class="col-lg-4">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="mb-0">Pendidikan Agama Islam</h4>
                            <div class="btn-group">
                                <a class="nav-link label-group p-0" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="true">
                                    <div>
                                        <span class="more-options text-dark">
                                            <i class="ti ti-dots-vertical fs-5"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" data-popper-placement="bottom-end">
                                    <button type="button"
                                        class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-edit gap-3">
                                        <i class="fs-4 ti ti-edit"></i>
                                        Edit
                                    </button>

                                    <button
                                        class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete gap-3"
                                        data-id="">
                                        <i class="fs-4 ti ti-trash"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="align-items-center pt-3">
                            <h6 class="mb-3">Jenis Pelajaran :</h6>
                            <div class="d-flex align-items-center">
                                <span class="mb-1 badge font-medium fs-5 bg-light-warning text-warning">
                                    Keagamaan
                                </span>
                                <span class="mb-1 badge font-medium ms-2 fs-5 bg-light-primary text-primary">
                                    Islam
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Image Container -->
                    <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
                        <img src="{{ asset('assets/images/background/buble.png') }}" alt="Description" class="img-fluid"
                            style="max-width: 100px; height: auto;">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
