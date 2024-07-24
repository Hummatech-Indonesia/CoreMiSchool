<div class="modal fade" id="modal-create-student" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                {{-- @method('post') --}}
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Kelas</label>
                            <select id="pengajar" class="form-select" name="class">
                                <option value="">X rpl</option>
                                <option value="">XI RPL 1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Nama Siswa</label>
                            <select id="pengajar" class="form-select" name="student">
                                <option value="">oke</option>
                                <option value="">Suyadi</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
