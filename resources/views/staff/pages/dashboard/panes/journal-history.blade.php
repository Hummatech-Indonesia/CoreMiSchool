<div class="row">
    <div class="col-lg-12 col-md-12">
        @forelse (range(1,3) as $item)
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary" style="border-radius: 0.50rem;">
                        <h4 class="mb-0 text-white card-title">
                            Jurnal Staff
                        </h4>
                        <div class="position-absolute top-0 end-0" style="padding: 0px; position: relative;">
                            <img src="{{ asset('assets/images/background/arrow-leftwarning.png') }}" alt="Description"
                                class="img-fluid" style="max-width: 210px; height: auto; position: relative;">
                            <span class="d-flex align-items-center ms-5 fs-4"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold;width: 100%;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                                </svg>
                                20 Mei 2024
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row pb-2" style="border-bottom: 1px solid #ffffff">
                            <div class="col-lg-12" style="border-right: 1px solid #ffffff;">
                                <div class="pe-3">
                                    <h5 class="card-title mb-4">Deskripsi:</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula lacus
                                        massa, a finibus urna hendrerit fringilla.
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                        himenaeos.
                                        lorem ipsum....</p>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4">
                                <div class="ps-3">
                                    <h5 class="card-title mb-4 ms-5 ps-3">Rekap Absensi:</h5>
                                    <div class="row px-5">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <span
                                                    class="badge bg-light-primary text-primary fs-7 fw-semibold mb-1 py-2">{{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::PERMIT)->count() }}</span>
                                                <p>Izin</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <span
                                                    class="badge bg-light-warning text-warning fs-7 fw-semibold mb-1 py-2">{{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::SICK)->count() }}</span>
                                                <p>Sakit</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <span
                                                    class="badge bg-light-danger text-danger fs-7 fw-semibold mb-1 py-2">{{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::ALPHA)->count() }}</span>
                                                <p>Alfa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div>
                            <a href="javascript:void(0)" class="btn btn-primary mt-3">
                                Lihat Detail Jurnal
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mb-1"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="text-center align-middle">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                    <p class="fs-5 text-dark text-center mt-2">
                        Belum ada data
                    </p>
                </div>
            </div>
        @endforelse

        <button class="btn mb-1 waves-effect waves-light btn-outline-primary w-100" type="button">Lihat Selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mb-1" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76" />
            </svg>
        </button>

    </div>
</div>
