<div class="modal fade" id="violation-student-create" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg px-4">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai" style="font-size: 20px"><b>Tambah Pelanggaran</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 overflow-auto" style="max-height: 70vh;">
                <div class="border rounded-2 py-3" style="background-color: #FEF5E5">
                    <div class="d-flex px-2 align-items-center">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-warning" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1zm-8-5v4m0 4h.01" />
                            </svg>
                        </div>
                        <h6 class="text-warning ms-2" style="font-size: 16">Maksimal point pelanggaran pada sekolah
                            <br> 200 Point
                        </h6>
                    </div>
                </div>

                <form class="mt-4">
                    <div class="email-repeater mb-3">
                        <div data-repeater-list="repeater-group">
                            <div data-repeater-item class="mb-3 position-relative">
                                <div class="mb-3">
                                    <label for="" class="mb-2"><b>Jenis Pelanggaran</b></label>
                                    <select class="form-select select2-jenis" style="width: 100%; height: 36px"
                                        name="">
                                        <option value="" disabled selected>Pilih Jenis Pelanggaran</option>
                                        <option value="jenis1">Jenis Pelanggaran 1</option>
                                        <option value="jenis2">Jenis Pelanggaran 2</option>
                                        <option value="jenis3">Jenis Pelanggaran 3</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <label for="" class="mb-2"><b>Nama Siswa Melakukan
                                                Pelanggaran</b></label>
                                        <select class="form-select select2-siswa" multiple="multiple"
                                            style="width: 100%; height: 36px" name="siswa[]">
                                            <option value="" disabled>Pilih Nama Siswa</option>
                                            <option value="siswa1">Nama Siswa 1</option>
                                            <option value="siswa2">Nama Siswa 2</option>
                                            <option value="siswa3">Nama Siswa 3</option>
                                        </select>
                                    </div>
                                    <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light"
                                        type="button" style="padding: 6px 12px; height: 38px; margin-top: 24px;">
                                        <i class="ti ti-circle-x fs-5"></i>
                                    </button>
                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2"
                                    viewBox="0 0 48 48">
                                    <g fill="none">
                                        <rect width="38" height="26" x="5" y="16" stroke="currentColor"
                                            stroke-linejoin="round" stroke-width="4" rx="3" />
                                        <path fill="currentColor"
                                            d="M19 8h10V4H19zm11 1v7h4V9zm-12 7V9h-4v7zm11-8a1 1 0 0 1 1 1h4a5 5 0 0 0-5-5zM19 4a5 5 0 0 0-5 5h4a1 1 0 0 1 1-1z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="4" d="M18 29h12m-6-6v12" />
                                    </g>
                                </svg>
                                Tambah Pelanggaran
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-1 waves-effect waves-light"
                    style="background-color: #C7C7C7; color: white;" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn mb-1 waves-effect waves-light btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
