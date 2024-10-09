<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Izin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Nama Siswa</label>
                            <select id="" class="select2 select2-create" name="employee_id">
                                <option value="">Pilih Siswa</option>
                                <option value=""> Siswa</option>
                            </select>
                            @error('employee_id', 'create')
                                <span class="text-danger error-create">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="mr-sm-2 mb-2" for="inlineFormCustomSelect">Tanggal Mulai</label>
                            <div class="form-group">
                                <input type="date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="mr-sm-2 mb-2" for="inlineFormCustomSelect">Tanggal Akhir</label>
                            <div class="form-group">
                                <input type="date" class="form-control" value="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group mb-4">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Status</label>
                            <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                <option value="1">Izin</option>
                                <option value="2">Sakit</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="mr-sm-2 mb-2" for="inlineFormCustomSelect">Bukti</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
