<!-- modal edit -->
<div class="modal fade" id="modal-update-teacher" tabindex="-1" aria-labelledby="editPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPegawaiLabel">Edit Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="wizard-content">
                    <form id="form-update" class="tab-wizard wizard-circle wizard clearfix" role="application" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <!-- Step 1 -->
                        <section>
                            <div class="row mx-3">
                                <div class="col-md-12">
                                    <label for="" class="mb-2">Foto Guru (opsional)</label>
                                    <img id="employeeImagePreview" alt="Preview" style="max-width: 200px; display: none; height: auto;">
                                    <input type="file" name="image" id="employeeImage" class="form-control mt-2 mb-3" onchange="previewAddImage(event)">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="name" placeholder="Masukkan nama" id="name-edit" class="form-control mb-3" value="{{ old('name') }}">
                                        @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NIP <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="nip" placeholder="Masukkan nip" id="nip-edit" class="form-control mb-3" value="{{ old('nip') }}">
                                        @error('nip')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <select name="religion_id" id="religion-edit" class="form-select">
                                            <option>Pilih agama..</option>
                                            {{-- @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('religion_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="date" name="birth_date" id="birth_date-edit" class="form-control mb-3" value="{{ old('birth_date') }}">
                                        @error('birth_date')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" placeholder="Masukkan tempat lahir" class="form-control" id="birth_place-edit" name="birth_place" value="{{ old('birth_place') }}">
                                        @error('birth_place')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jenis Kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <div class="form-check d-flex align-items-center mt-2">
                                        <div class="custom-control custom-radio me-4">
                                            <input type="radio" class="custom-control-input" id="maleEdit" name="gender" value="male">
                                            <label class="custom-control-label" for="maleEdit">Laki-laki</label>
                                        </div>
                                        <div class="custom-control custom-radio me-4">
                                            <input type="radio" class="custom-control-input" id="femaleEdit" name="gender" value="female">
                                            <label class="custom-control-label" for="femaleEdit">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 mx-4">
                                <button type="button" class="btn btn-primary next-step">Berikutnya</button>
                            </div>
                        </section>

                        <!-- Step 2 -->
                        <section>
                            <div class="row mx-3 pt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="nik" placeholder="Masukkan nik" id="nik-edit" class="form-control mb-3" value="{{ old('nik') }}">
                                        @error('nik')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">No Telp <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="phone_number" placeholder="Masukkan no telp" id="phone-edit" class="form-control mb-3" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="email" placeholder="Masukkan email" id="email-edit" class="form-control mb-3" value="{{ old('email') }}">
                                        @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="active" id="status-edit" class="form-select mb-3">
                                            <option value="1">Aktif</option>
                                            <option value="0">NonAktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h6>Alamat <span class="text-danger" style="font-size: larger;">*</span></h6>
                                        <textarea name="address" placeholder="Masukkan alamat" id="address-edit" class="form-control mb-3" rows="3">{{ old('address') }}</textarea>
                                        @error('address')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 mx-4">
                                <button type="button" class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3">Simpan</button>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
