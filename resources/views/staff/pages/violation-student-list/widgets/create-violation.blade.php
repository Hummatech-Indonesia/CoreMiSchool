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
                            <span class="mb-1 badge bg-warning p-0 rounded-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16">
                                    <path fill="currentColor" d="m8.93 6.588l-2.29.287l-.082.38l.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319c.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246c-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                                </svg>
                            </span>
                        </div>
                        <h6 class="text-warning ms-2" style="font-size: 16">Maksimal point pelanggaran pada sekolah</h6>
                    </div>
                </div>

                <form class="mt-4">
                    <div class="email-repeater mb-3">
                        <div data-repeater-list="repeater-group">
                            <div data-repeater-item class="mb-3 position-relative">
                                <div class="mb-3">
                                    <label for="" class="mb-2"><b>Jenis Pelanggaran</b></label>
                                    <select class="form-select select2-jenis" style="width: 100%; height: 36px" name="">
                                        <option value="" disabled selected>Pilih Jenis Pelanggaran</option>
                                        <option value="jenis1">Jenis Pelanggaran 1</option>
                                        <option value="jenis2">Jenis Pelanggaran 2</option>
                                        <option value="jenis3">Jenis Pelanggaran 3</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <label for="" class="mb-2"><b>Nama Siswa Melakukan Pelanggaran</b></label>
                                        <select class="form-select select2-siswa" multiple="multiple" style="width: 100%; height: 36px" name="siswa[]">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 48 48">
                                    <g fill="none">
                                        <rect width="38" height="26" x="5" y="16" stroke="currentColor" stroke-linejoin="round" stroke-width="4" rx="3" />
                                        <path fill="currentColor" d="M19 8h10V4H19zm11 1v7h4V9zm-12 7V9h-4v7zm11-8a1 1 0 0 1 1 1h4a5 5 0 0 0-5-5zM19 4a5 5 0 0 0-5 5h4a1 1 0 0 1 1-1z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M18 29h12m-6-6v12" />
                                    </g>
                                </svg>
                                Tambah Pelanggaran
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-1 waves-effect waves-light" style="background-color: #C7C7C7; color: white;" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn mb-1 waves-effect waves-light btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
