<!-- tambah subject -->
<div class="modal fade" id="subject-teacher" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-subject" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="old_rfid" id="old_rfid_input">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="subject" class="form-label">Pilih Mata Pelajaran</label>
                            <select id="subject" name="subject" class="form-select" aria-label="Pilih Mata Pelajaran">
                                <option selected>Pilih Mata Pelajaran</option>
                                <option value="matematika">Matematika</option>
                                <option value="fisika">Fisika</option>
                                <option value="kimia">Kimia</option>
                                <option value="biologi">Biologi</option>
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
