<h5 class="mb-3 fw-semibold">Jadwal Pelajaran Pada Hari ini</h5>
<div class="row">
    @forelse (range(1,3) as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="bg-primary p-3 rounded-3 rounded-bottom-0">
                    <div class="text-white display-6 d-flex justify-content-between px-2">
                        <h5 class="text-white">Pertemuan 1</h5>
                        <h5 class="text-white">Jam ke 1 - 2</h5>
                    </div>
                </div>
                <div class="card-body" style="border-top-left-radius: 20%">
                    <h6 class="fw-semibolld">Mata Pelajaran :</h6>
                    <h5 class="mb-4">Pendidikan Kewarganegaraan</h5>
                    <div class="d-flex">
                        <div class="d-flex align-items-center">
                            <span class="me-2 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M4 6v2h22v16H12v2h18v-2h-2V6zm4.002 3A4.016 4.016 0 0 0 4 13c0 2.199 1.804 4 4.002 4A4.014 4.014 0 0 0 12 13c0-2.197-1.802-4-3.998-4M14 10v2h5v-2zm7 0v2h3v-2zM8.002 11C9.116 11 10 11.883 10 13c0 1.12-.883 2-1.998 2C6.882 15 6 14.12 6 13c0-1.117.883-2 2.002-2M14 14v2h10v-2zM4 18v8h2v-6h3v6h2v-5.342l2.064 1.092c.585.31 1.288.309 1.872 0v.002l3.53-1.867l-.933-1.77l-3.531 1.867l-3.096-1.634A3 3 0 0 0 9.504 18z" />
                                </svg>
                            </span>
                            <h5 class="mb-0">Nama Pengajar</h5>
                        </div>
                        <div class="ms-auto">
                            <button class="btn mb-1 waves-effect waves-light btn-primary" type="button"
                                data-bs-toggle="modal" data-bs-target="#modal-create">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
