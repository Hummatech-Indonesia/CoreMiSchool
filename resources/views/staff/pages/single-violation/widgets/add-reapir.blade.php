<div class="modal fade" id="modal-repair" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Perbaikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="" class="mb-2">Jenis Perbaikan</label>
                            <input type="text" name="" placeholder="Masukkan jenis perbaikan"
                                class="form-control">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="" class="mb-2">Poin Perbaikan</label>
                            <input type="text" name="" placeholder="Masukkan poin perbaikan"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tanggal Mulai</label>
                                    <input type="date" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tanggal Akhir</label>
                                    <input type="date" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
