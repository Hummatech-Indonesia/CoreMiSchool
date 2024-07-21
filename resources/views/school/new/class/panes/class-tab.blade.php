<div class="col-12 col-md-6 col-lg-2 mb-3 me-3">
    <form action="/school/class" class="position-relative">
        <input type="text" class="form-control product-search ps-5" name="name"
            value="{{ old('name', request()->name) }}" id="input-search" placeholder="Cari...">
        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
    </form>
</div>

<div class="row">

    <div class="col-lg-3">
        <div class="card">
            <div class="position-relative">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h2 class="fs-4 mb-0">XII RPL 2</h2>
                        <span class="fs-2 ms-5">2023/2024</span>
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
                            <div class="dropdown-menu dropdown-menu-right category-menu"
                                data-popper-placement="bottom-end">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#update-class"
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


                    <span class="fs-3">Rahayu Soviya</span>
                    <div class="d-flex align-items-center mb-4 pt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                        </svg>
                        <span class="ms-2 fs-4">
                            31 Siswa
                        </span>
                    </div>

                    <a href="/new/school/class/detail" type="button"
                        class="btn waves-effect waves-light btn-primary w-100">Masuk Kelas</a>
                </div>
            </div>
        </div>

    </div>
</div>

@include('school.new.class.widgets.class.update-class')
