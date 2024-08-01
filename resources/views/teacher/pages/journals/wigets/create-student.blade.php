<!-- modal tambah -->
<div class="modal fade" id="create-student" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('school.classroom.store') }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="">
                        <div class="email-repeater mb-3">
                            <div data-repeater-list="store-class">
                                <div data-repeater-item class="row mb-3 align-items-end">
                                    <div class="col-md-6 mb-2">
                                        <div class="custom-file">
                                            <label for="" class="mb-2">Siswa</label>
                                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama kelas" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="custom-file">
                                            <label for="" class="mb-2">Status</label>
                                            <select class="form-control" name="student_id">
                                                <option value="">Pilih tingkatan kelas</option>
                                                @forelse ($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button">
                                            <i class="ti ti-circle-x fs-5"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">
                                <div class="d-flex align-items-center">
                                    Tambah data
                                    <i class="ti ti-circle-plus ms-1 fs-5"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
