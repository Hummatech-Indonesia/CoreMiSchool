<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Tambah Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="mataPelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" id="mataPelajaran" name="subject_id" required>
                            <option value="" selected disabled>Pilih Mata Pelajaran</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pengajar" class="form-label">Pengajar</label>
                        <select class="form-select" id="pengajar" name="employee_id" required>
                            <option value="" selected disabled>Pilih Pengajar</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jamKe" class="form-label">Jam Ke -</label>
                        <select class="form-select" id="jamKe" name="lesson_hour_id" required>
                            <option value="" selected disabled>Pilih Jam Ke</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
