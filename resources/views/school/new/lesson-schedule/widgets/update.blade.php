<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Edit Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="mataPelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" id="mataPelajaran" name="mataPelajaran" required>
                            <option value="" selected disabled>Pilih Mata Pelajaran</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Kimia">Kimia</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pengajar" class="form-label">Pengajar</label>
                        <select class="form-select" id="pengajar" name="pengajar" required>
                            <option value="" selected disabled>Pilih Pengajar</option>
                            <option value="John Doe">Suyadi ole</option>
                            <option value="Jane Smith">okee</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jamKe" class="form-label">Jam Ke -</label>
                        <select class="form-select" id="jamKe" name="jamKe" required>
                            <option value="" selected disabled>Pilih Jam Ke</option>
                            <option value="1">Jam Ke-1</option>
                            <option value="2">Jam Ke-2</option>
                            <option value="3">Jam Ke-3</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
