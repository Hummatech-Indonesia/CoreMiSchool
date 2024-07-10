@extends('admin.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Daftarkan Sekolah</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                    href="index-2.html">Tambahkan kerjasama mischool dengan sekolah</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="checkout">
            <div class="card shadow-none border">
                <div class="card-body p-4">
                    <h2><b>Pendaftaran Sekolah</b></h2>
                    <h6>Registrasi</h6>
                    <div class="wizard-content">
                        <form action="#" class="tab-wizard wizard-circle wizard clearfix" role="application"
                            id="steps-uid-0">
                            <div class="steps clearfix">
                                <ul role="tablist">
                                    <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                                        <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0">
                                            <span class="current-info audible">current step: </span>
                                            <span class="step">1</span>
                                            Info Umum
                                        </a>
                                    </li>
                                    <li role="tab" class="disabled" aria-disabled="true">
                                        <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
                                            <span class="step">2</span>
                                            Alamat
                                        </a>
                                    </li>
                                    <li role="tab" class="disabled" aria-disabled="true">
                                        <a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2">
                                            <span class="step">3</span>
                                            Lainnya
                                        </a>
                                    </li>
                                    <li role="tab" class="disabled last" aria-disabled="true">
                                        <a id="steps-uid-0-t-3" href="#steps-uid-0-h-3" aria-controls="steps-uid-0-p-3">
                                            <span class="step">4</span>
                                            Password
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Step 1 -->
                            {{-- <h6>Informasi Umum</h6> --}}
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Nama Sekolah</h6>
                                            <input type="text" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>NPSN</h6>
                                            <input type="number" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Email</h6>
                                            <input type="email" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Nomor Telepon</h6>
                                            <input type="number" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Logo</h6>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn btn-primary next-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            {{-- <h6>Billing & Address</h6> --}}
                            <section>

                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Provinsi</h6>
                                            <select class="form-select mr-sm-2 mb-4" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Kabupaten</h6>
                                            <select class="form-select mr-sm-2 mb-4" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h6>Kecamatan</h6>
                                            <select class="form-select mr-sm-2 mb-4" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h6>Desa</h6>
                                            <select class="form-select mr-sm-2 mb-4" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h6>Kode Pos</h6>
                                            <select class="form-select mr-sm-2 mb-4" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Alamat</h6>
                                            <textarea class="form-control mb-4" rows="3"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h6 class="mb-3">Tingkatan</h6>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidation2" name="radio-stacked">
                                                <label class="custom-control-label" for="customControlValidation2">
                                                    <img src="{{ asset('admin_assets/dist/images/backgrounds/sd.png') }}"
                                                        alt="SD/MI" style="width: 300px; height: auto;"
                                                        class="mb-3">
                                                    <h6>SD/MI</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidation3" name="radio-stacked">
                                                <label class="custom-control-label" for="customControlValidation3">
                                                    <img src="{{ asset('admin_assets/dist/images/backgrounds/smp.png') }}"
                                                        alt="SMP/MTS" style="width: 300px; height: auto;"
                                                        class="mb-3">
                                                    <h6>SMP/MTS</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidation4" name="radio-stacked" disabled>
                                                <label class="custom-control-label" for="customControlValidation4">
                                                    <img src="{{ asset('admin_assets/dist/images/backgrounds/sma.png') }}"
                                                        alt="SMA/SMK/MA" style="width: 300px; height: auto;"
                                                        class="mb-3">
                                                    <h6>SMA/SMK/MA</h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button"
                                        class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                    <button type="button"
                                        class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 3 -->
                            {{-- <h6>Review Order</h6> --}}
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Kepala Sekolah</h6>
                                            <input type="text" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Web (Optional)</h6>
                                            <input type="number" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Status</h6>
                                            <input type="email" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>NIP Kepala Sekolah (opsional)</h6>
                                            <input type="number" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Deskripsi (opsional)</h6>
                                            <textarea class="form-control mb-4" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="mb-3">Akreditasi</h6>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidation2" name="radio-stacked">
                                                <label class="custom-control-label"
                                                    for="customControlValidation2">A</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidation3" name="radio-stacked">
                                                <label class="custom-control-label"
                                                    for="customControlValidation3">B</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidation4" name="radio-stacked" disabled>
                                                <label class="custom-control-label"
                                                    for="customControlValidation4">C</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button"
                                        class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                    <button type="button"
                                        class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 4 -->
                            {{-- <h6>Payment</h6> --}}
                            <section class="payment-method">

                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Password</h6>
                                            <input type="password" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Konfirmasi Password</h6>
                                            <input type="password" class="form-control mb-3">
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Tampilkan Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button"
                                        class="btn mb-1 waves-effect waves-light btn-outline-primary prev-step">Kembali</button>
                                    <button type="button"
                                        class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-step">Berikutnya</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentSection = 0;
            var sections = $("form > section");
            var steps = $(".steps li");

            sections.hide();
            sections.eq(currentSection).show();

            $(".next-step").click(function() {
                if (currentSection < sections.length - 1) {
                    sections.eq(currentSection).hide();
                    steps.eq(currentSection).removeClass("current").addClass("done");
                    currentSection++;
                    sections.eq(currentSection).show();
                    steps.eq(currentSection).removeClass("disabled").addClass("current");
                }
            });

            $(".prev-step").click(function() {
                if (currentSection > 0) {
                    sections.eq(currentSection).hide();
                    steps.eq(currentSection).removeClass("current").addClass("disabled");
                    currentSection--;
                    sections.eq(currentSection).show();
                    steps.eq(currentSection).removeClass("done").addClass("current");
                }
            });
        });
    </script>
@endsection
