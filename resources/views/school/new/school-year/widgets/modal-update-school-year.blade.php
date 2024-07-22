<div class="modal fade" id="modal-update-school-year" tabindex="-1" aria-labelledby="tambahTahunAjaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahTahunAjaran">Edit Tahun Ajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-update" enctype="multipart/form-data" method="POST">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Tahun Ajaran <span class="text-danger" style="font-size: larger;">*</span></label>
                        <input type="text" id="name-update" name="school_year" class="form-control" placeholder="Masukkan tahun ajaran">
                        @error('school_year')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
