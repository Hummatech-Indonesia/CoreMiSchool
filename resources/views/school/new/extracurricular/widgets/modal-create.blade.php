<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Extracurricular</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.extracurricular.store') }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Nama Extracurricular</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Pengajar</label>
                            <select id="pengajar" class="select2 select2-create" name="employee_id">
                                <option value="">Pilih Pengajar</option>
                                @forelse ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                                @empty
                                @endforelse
                            </select>
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
