    <!-- modal tambah -->
    <div class="modal fade" id="create-class" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="">
                        <div class="">
                            <div class="email-repeater mb-3">
                                <div data-repeater-list="repeater-group">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-md-5">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" placeholder="Masukkan nama kelas" />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="custom-file">
                                                <select class="form-control">
                                                    <option value="">Pilih wali kelas</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button">
                                                <i class="ti ti-circle-x fs-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">
                                    <div class="d-flex align-items-center">
                                        Add More File
                                        <i class="ti ti-circle-plus ms-1 fs-5"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
            </div>
        </div>
    </div>
