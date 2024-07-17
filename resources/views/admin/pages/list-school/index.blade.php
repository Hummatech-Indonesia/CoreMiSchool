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
                    <a class="nav-link" data-bs-toggle="tab" href="#active" role="tab" aria-selected="false">
                        <span>Aktif</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#nonactive" role="tab" aria-selected="false">
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
                    <input type="text" class="form-control product-search px-4 ps-5" name="name" value="{{ old('name') }}" id="input-search"
                        placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
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
            <a href="{{ route('school-admin.create') }}" type="button" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary">Tambah</a>
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
                                            class="mb-1 badge bg-{{ $school->active == 1 ? 'success' : 'danger' }} ms-3">{{ $school->active == 1 ? 'Aktif' : 'Tidak aktif' }}</span>
                                    </div>
                                    <div class="d-flex pt-3">
                                        @if ($school->active == 1)
                                            <button type="button" data-id="{{ $school->id }}"
                                                class="btn waves-effect waves-light btn-rounded btn-light-danger text-danger w-50 btn-disable">Non-aktifkan</button>
                                        @else
                                            <button type="button" data-id="{{ $school->id }}"
                                                class="btn waves-effect waves-light btn-rounded btn-light-success text-success w-50 btn-enable">Aktifkan</button>
                                        @endif
                                        <a href="{{ route('school-admin.show', $school->user->slug) }}" type="button" class="btn waves-effect waves-light btn-rounded btn-light-info text-info w-50 ms-3">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            Belum ada sekolah
                        </div>
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
                    @forelse ($activeSchools as $activeSchool)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title p-3 rounded-2">
                                    <div class="position-relative p-3 rounded-2" style="background-color: #F0F0F0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="category-selector btn-group ms-auto">
                                                <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
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
                                                src="{{ asset('storage/'. $activeSchool->image) }}"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body pt-0">
                                    <h3 class="fs-6">{{ $activeSchool->user->name }}</h3>
                                    <p class="mb-0 mt-2 text-muted">{{ $activeSchool->head_school }}</p>
                                    <h6 class="pt-3">Alamat :</h6>
                                    <p class="mb-0 mt-2 text-muted">{{ $activeSchool->address }}</p>
                                    <div class="d-flex pt-3">
                                        <span class="mb-1 badge bg-primary w-25 text-capitalize">{{ $activeSchool->type }}</span>
                                        <span class="mb-1 badge bg-success ms-3 w-25">Aktif</span>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <button type="button" data-id="{{ $school->id }}" class="btn waves-effect waves-light btn-rounded btn-light-danger text-danger w-50 btn-disable">Non-aktifkan</button>
                                        <a href="{{ route('school-admin.show', $school->user->slug) }}" type="button" class="btn waves-effect waves-light btn-rounded btn-light-info text-info w-50 ms-3">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="text-center">Belum ada sekolah yang aktif</div>
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

        <div class="tab-pane" id="nonactive" role="tabpanel">
            <div class="p-3">
                <div class="row">
                    @forelse ($nonActiveSchools as $nonActiveSchool)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title p-3 rounded-2">
                                    <div class="position-relative p-3 rounded-2" style="background-color: #F0F0F0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="category-selector btn-group ms-auto">
                                                <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
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
                                                src="{{ asset('storage/'. $nonActiveSchool->image) }}"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body pt-0">
                                    <h3 class="fs-6">{{ $nonActiveSchool->user->name }}</h3>
                                    <p class="mb-0 mt-2 text-muted">{{ $nonActiveSchool->head_school }}</p>
                                    <h6 class="pt-3">Alamat :</h6>
                                    <p class="mb-0 mt-2 text-muted">{{ $nonActiveSchool->address }}</p>
                                    <div class="d-flex pt-3">
                                        <span class="mb-1 badge bg-primary w-25">{{ $nonActiveSchool->type }}</span>
                                        <span class="mb-1 badge bg-danger ms-3">Nonaktif</span>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <button type="button" data-id="{{ $school->id }}" class="btn waves-effect waves-light btn-rounded btn-light-success text-success w-50 btn-enable">Aktifkan</button>
                                        <a href="{{ route('school-admin.show', $school->user->slug) }}" type="button" class="btn waves-effect waves-light btn-rounded btn-light-info text-info w-50 ms-3">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="text-center">Belum ada sekolah yang tidak aktif</div>
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
    </div>
<x-delete-modal-component />
<x-active-confirmation-modal-component />
<x-nonactive-confirmation-modal-component />
@endsection

@section('script')
    <script>
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-enable').click(function() {
            var id = $(this).data('id');
            $('#form-enable').attr('action', '/admin/school/' + id + '/enable');
            $('#modal-enable').modal('show');
        });

        $('.btn-disable').click(function() {
            var id = $(this).data('id');
            $('#form-disable').attr('action', '/admin/school/' + id + '/disable');
            $('#modal-disable').modal('show');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the active tab from local storage
            var activeTab = localStorage.getItem('activeTab');
            
            // If there is an active tab stored, activate it
            if (activeTab) {
                var tabToActivate = document.querySelector('.nav-tabs a[href="' + activeTab + '"]');
                var bootstrapTab = new bootstrap.Tab(tabToActivate);
                bootstrapTab.show();
            }

            // Store the active tab in local storage when a tab is clicked
            var tabLinks = document.querySelectorAll('a[data-bs-toggle="tab"]');
            tabLinks.forEach(function (tabLink) {
                tabLink.addEventListener('shown.bs.tab', function (event) {
                    var currentTab = event.target.getAttribute('href');
                    localStorage.setItem('activeTab', currentTab);
                });
            });
        });
    </script>
@endsection    