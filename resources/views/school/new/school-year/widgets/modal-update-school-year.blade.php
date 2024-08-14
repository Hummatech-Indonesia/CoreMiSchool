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
                        <div class="d-flex justify-content-between mt-3">
                            <select name="start_year" id="update-start-year" class="me-2 select2 select-start-update">
                                @for ($year = now()->year + 5; $year >= now()->year - 10; $year--)
                                    <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                            <p class="fs-7">/</p>                            <select name="end_year" id="update-end-year" class="ms-2 select2 select-end-update">
                                @for ($year = now()->year + 5; $year >= now()->year - 10; $year--)
                                    <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
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
