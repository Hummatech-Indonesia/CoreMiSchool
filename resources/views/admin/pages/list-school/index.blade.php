@extends('admin.layouts.app')

@section('content')
    <div class="row mb-3 align-items-center">
        <div class="col-12 col-md-6 col-lg-6 mb-3">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-selected="true" href="#all">
                        <span>Semua</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#active" role="tab" aria-selected="false"
                        tabindex="-1">
                        <span>Aktif</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#nonactive" role="tab" aria-selected="false"
                        tabindex="-1">
                        <span>Non Aktif</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-4 mb-3 me-2">
                <form action="" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search"
                        placeholder="Cari tim...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3 me-2">
                <select id="status-school" class="form-select">
                    <option value="">SMKN 1 Kepanjen</option>
                    <option value="">SMKN 6 Malang</option>
                    <option value="">SMKN 8 Malang</option>
                </select>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 me-2">
                <select id="status-activity" class="form-select">
                    <option value="">Semua</option>
                    <option value="">Aktif</option>
                    <option value="">NonAktif</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-auto mb-3">
            <a href="/admin/add-school" type="button"
                class="btn mb-1 waves-effect waves-light btn-rounded btn-primary">Tambah</a>
        </div>
    </div>


    <div class="tab-content">
        <div class="tab-pane active show" id="all" role="tabpanel">
            <div class="p-3">
                <div class="row">
                    @forelse ($schools as $school)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title p-3 rounded-2">
                                    <div class="position-relative p-3 rounded-2" style="background-color: #F0F0F0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="category-selector btn-group ms-auto">
                                                <a class="nav-link category-dropdown label-group p-0"
                                                    data-bs-toggle="dropdown" href="#" role="button"
                                                    aria-haspopup="true" aria-expanded="true">
                                                    <div class="category">
                                                        <div class="category-business"></div>
                                                        <div class="category-social"></div>
                                                        <span class="more-options text-dark">
                                                            <i class="ti ti-dots-vertical fs-5"></i>
                                                        </span>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right category-menu"
                                                    data-popper-placement="bottom-end">
                                                    <a
                                                        class="note-business badge-group-item text-danger badge-business dropdown-item position-relative category-business d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="me-1"
                                                            width="20" height="20" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="M216 48h-36V36a28 28 0 0 0-28-28h-48a28 28 0 0 0-28 28v12H40a12 12 0 0 0 0 24h4v136a20 20 0 0 0 20 20h128a20 20 0 0 0 20-20V72h4a12 12 0 0 0 0-24M100 36a4 4 0 0 1 4-4h48a4 4 0 0 1 4 4v12h-56Zm88 168H68V72h120Zm-72-100v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0m48 0v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0" />
                                                        </svg>
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mb-3"
                                            style="height: 130px;">
                                            <img class="card-img-top img-responsive" style="max-height: 100%; width: auto"
                                                src="{{ asset('storage/' . $school->image) }}" alt="Card image cap">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body pt-0">
                                    <h3 class="fs-6">
                                        {{ $school->user->name }}
                                    </h3>
                                    <p class="mb-0 mt-2 text-muted">{{ $school->head_school }}</p>
                                    <h6 class="pt-3">Alamat :</h6>
                                    <p class="mb-0 mt-2 text-muted">{{ $school->address }}</p>
                                    <div class="d-flex pt-3">
                                        <span class="mb-1 badge bg-primary w-25 text-capitalize">{{ $school->type }}</span>
                                        <span
                                            class="mb-1 badge bg-success ms-3 w-25">{{ $school->active == 1 ? 'Aktif' : 'Tidak aktif' }}</span>
                                    </div>
                                    <div class="d-flex pt-3">
                                        @if ($school->active == 1)
                                            <button type="button" data-id="{{ $school->id }}"
                                                class="btn waves-effect waves-light btn-rounded btn-light-danger text-danger w-50">Non-aktifkan</button>
                                        @else
                                            <button type="button" data-id="{{ $school->id }}"
                                                class="btn waves-effect waves-light btn-rounded btn-light-danger text-danger w-50">Aktifkan</button>
                                        @endif
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded btn-light-info text-info w-50 ms-3">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <nav aria-label="..." class="mb-3">
                    <ul class="pagination justify-content-center mb-0 mt-4">
                        <li class="page-item disabled">
                            <a href="#" class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="tab-pane" id="active" role="tabpanel">
            <div class="p-3">
                <div class="row">
                    @foreach (range(1, 5) as $item)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title p-3 rounded-2">
                                    <div class="position-relative p-3 rounded-2" style="background-color: #F0F0F0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="category-selector btn-group ms-auto">
                                                <a class="nav-link category-dropdown label-group p-0"
                                                    data-bs-toggle="dropdown" href="#" role="button"
                                                    aria-haspopup="true" aria-expanded="true">
                                                    <div class="category">
                                                        <div class="category-business"></div>
                                                        <div class="category-social"></div>
                                                        <span class="more-options text-dark">
                                                            <i class="ti ti-dots-vertical fs-5"></i>
                                                        </span>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right category-menu"
                                                    data-popper-placement="bottom-end">
                                                    <a
                                                        class="note-business badge-group-item text-danger badge-business dropdown-item position-relative category-business d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="me-1"
                                                            width="20" height="20" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="M216 48h-36V36a28 28 0 0 0-28-28h-48a28 28 0 0 0-28 28v12H40a12 12 0 0 0 0 24h4v136a20 20 0 0 0 20 20h128a20 20 0 0 0 20-20V72h4a12 12 0 0 0 0-24M100 36a4 4 0 0 1 4-4h48a4 4 0 0 1 4 4v12h-56Zm88 168H68V72h120Zm-72-100v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0m48 0v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0" />
                                                        </svg>
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mb-3"
                                            style="height: 130px;">
                                            <img class="card-img-top img-responsive" style="max-height: 100%; width: auto"
                                                src="{{ asset('admin_assets/dist/images/profile/smkn1kepanjen.png') }}"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body pt-0">
                                    <h3 class="fs-6">
                                        SMK NEGERI 1 KEPANJEN
                                    </h3>
                                    <p class="mb-0 mt-2 text-muted">Lasmono S.Pd.Mm</p>
                                    <h6 class="pt-3">Alamat :</h6>
                                    <p class="mb-0 mt-2 text-muted">Jl, Ngadiluwih, Kedungpedaringan, Kec. Kepanjen,
                                        Kabupaten Malang, Jawa Timur 65163, Indonesia</p>
                                    <div class="d-flex pt-3">
                                        <span class="mb-1 badge bg-primary w-25">Negeri</span>
                                        <span class="mb-1 badge bg-success ms-3 w-25">Aktif</span>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded btn-light-danger text-danger w-50">Jadikan
                                            Nonaktif</button>
                                        <a href="/admin/detail-school" type="button"
                                            class="btn waves-effect waves-light btn-rounded btn-light-info text-info w-50 ms-3">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="..." class="mb-3">
                    <ul class="pagination justify-content-center mb-0 mt-4">
                        <li class="page-item disabled">
                            <a href="#" class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="tab-pane" id="nonactive" role="tabpanel">
            <div class="p-3">
                <div class="row">
                    @foreach (range(1, 5) as $item)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title p-3 rounded-2">
                                    <div class="position-relative p-3 rounded-2" style="background-color: #F0F0F0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="category-selector btn-group ms-auto">
                                                <a class="nav-link category-dropdown label-group p-0"
                                                    data-bs-toggle="dropdown" href="#" role="button"
                                                    aria-haspopup="true" aria-expanded="true">
                                                    <div class="category">
                                                        <div class="category-business"></div>
                                                        <div class="category-social"></div>
                                                        <span class="more-options text-dark">
                                                            <i class="ti ti-dots-vertical fs-5"></i>
                                                        </span>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right category-menu"
                                                    data-popper-placement="bottom-end">
                                                    <a
                                                        class="note-business badge-group-item text-danger badge-business dropdown-item position-relative category-business d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="me-1"
                                                            width="20" height="20" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="M216 48h-36V36a28 28 0 0 0-28-28h-48a28 28 0 0 0-28 28v12H40a12 12 0 0 0 0 24h4v136a20 20 0 0 0 20 20h128a20 20 0 0 0 20-20V72h4a12 12 0 0 0 0-24M100 36a4 4 0 0 1 4-4h48a4 4 0 0 1 4 4v12h-56Zm88 168H68V72h120Zm-72-100v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0m48 0v64a12 12 0 0 1-24 0v-64a12 12 0 0 1 24 0" />
                                                        </svg>
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mb-3"
                                            style="height: 130px;">
                                            <img class="card-img-top img-responsive" style="max-height: 100%; width: auto"
                                                src="{{ asset('admin_assets/dist/images/profile/smkn1kepanjen.png') }}"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body pt-0">
                                    <h3 class="fs-6">
                                        SMK NEGERI 1 KEPANJEN
                                    </h3>
                                    <p class="mb-0 mt-2 text-muted">Lasmono S.Pd.Mm</p>
                                    <h6 class="pt-3">Alamat :</h6>
                                    <p class="mb-0 mt-2 text-muted">Jl, Ngadiluwih, Kedungpedaringan, Kec. Kepanjen,
                                        Kabupaten Malang, Jawa Timur 65163, Indonesia</p>
                                    <div class="d-flex pt-3">
                                        <span class="mb-1 badge bg-primary w-25">Negeri</span>
                                        <span class="mb-1 badge bg-danger ms-3 w-25">Nonaktif</span>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded btn-light-danger text-danger w-50">Jadikan
                                            Aktif</button>
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded btn-light-info text-info w-50 ms-3">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="..." class="mb-3">
                    <ul class="pagination justify-content-center mb-0 mt-4">
                        <li class="page-item disabled">
                            <a href="#" class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
