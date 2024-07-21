<div class="col-12 col-md-6 col-lg-2 mb-3 me-3">
    <form action="/school/class" class="position-relative">
        <input type="text" class="form-control product-search ps-5" name="name"
            value="{{ old('name', request()->name) }}" id="input-search" placeholder="Cari...">
        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
    </form>
</div>

<div class="row">
    @foreach (range(1, 3) as $item)
        <div class="col-lg-4">
            <div class="card position-relative">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h2 class="fs-4 mb-0">Tingkatan Kelas</h2>
                        {{-- <span class="fs-2">2023/2024</span> --}}
                        <div class="category-selector btn-group">
                            <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="true" aria-expanded="true">
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
                                <button type="button" data-bs-toggle="modal" data-bs-target="#update-level"
                                    class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-edit">
                                    Edit
                                </button>

                                <button
                                    class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete"
                                    data-id="">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pt-3">
                        <span class="mb-1 badge font-medium fs-5 bg-light-primary text-primary">
                            Kelas 10
                        </span>
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

@include('school.new.class.widgets.update-level')
