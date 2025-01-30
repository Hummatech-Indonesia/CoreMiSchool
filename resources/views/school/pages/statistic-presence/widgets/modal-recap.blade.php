<div class="modal fade" id="recap" tabindex="-1" aria-labelledby="modal-recap" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-recap">Rekap Kehadiran Bulanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.attendance-student-monthly-recap', $classroom->id) }}" method="GET" enctype="multipart/form-data" id="recap-form">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Bulan</label>
                        <select name="month" class="form-select" id="month-select">
                            <option value="" >Pilih bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-rounded btn-primary" data-bs-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>