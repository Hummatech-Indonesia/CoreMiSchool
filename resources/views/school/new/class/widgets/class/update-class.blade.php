<!-- modal Edit -->
<div class="modal fade" id="update-class" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Edit Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="edit-class-form">
                    <div class="mb-3">
                        <label for="class-name" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="class-name" name="class_name" placeholder="Masukkan nama kelas">
                    </div>
                    <div class="mb-3">
                        <label for="class-teacher" class="form-label">Wali Kelas</label>
                        <select class="form-control" id="class-teacher" name="class_teacher">
                            <option value="">Pilih wali kelas</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-rounded btn-primary" form="edit-class-form">Simpan</button>
            </div>
        </div>
    </div>
</div>
