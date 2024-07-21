<div class="modal fade" id="modal-create-school-year" tabindex="-1" aria-labelledby="tambahTahunAjaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahTahunAjaran">Tambah Tahun Ajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Tahun Ajaran <span class="text-danger" style="font-size: larger;">*</span></label>
                        <input type="text" name="school_year" class="form-control" placeholder="Masukkan tahun ajaran">
                        @error('school_year')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <select name="active" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        @error('active')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>