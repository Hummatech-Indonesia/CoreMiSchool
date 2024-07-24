@extends('school.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-light">Pegawai</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Daftar - daftar guru dan staff di sekolah</li>
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

    <div class="container-fluid note-has-grid">
        <!-- Navigation Tabs -->
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row flex-wrap" id="nav-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                    id="teacher-tab" data-bs-toggle="pill" href="#teacher-content" role="tab"
                    aria-controls="teacher-content" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"
                        class="me-1">
                        <path fill="currentColor"
                            d="M4 6v2h22v16H12v2h18v-2h-2V6zm4.002 3A4.016 4.016 0 0 0 4 13c0 2.199 1.804 4 4.002 4A4.014 4.014 0 0 0 12 13c0-2.197-1.802-4-3.998-4M14 10v2h5v-2zm7 0v2h3v-2zM8.002 11C9.116 11 10 11.883 10 13c0 1.12-.883 2-1.998 2C6.882 15 6 14.12 6 13c0-1.117.883-2 2.002-2M14 14v2h10v-2zM4 18v8h2v-6h3v6h2v-5.342l2.064 1.092c.585.31 1.288.309 1.872 0v.002l3.53-1.867l-.933-1.77l-3.531 1.867l-3.096-1.634A3.005 3.005 0 0 0 9.504 18z" />
                    </svg>
                    <span class="d-none d-md-block font-weight-medium">Guru</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                    id="employee-tab" data-bs-toggle="pill" href="#employee-content" role="tab"
                    aria-controls="employee-content" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36 36"
                        class="me-1">
                        <path fill="currentColor"
                            d="M16.43 16.69a7 7 0 1 1 7-7a7 7 0 0 1-7 7m0-11.92a5 5 0 1 0 5 5a5 5 0 0 0-5-5M22 17.9a25.4 25.4 0 0 0-16.12 1.67a4.06 4.06 0 0 0-2.31 3.68v5.95a1 1 0 1 0 2 0v-5.95a2 2 0 0 1 1.16-1.86a22.9 22.9 0 0 1 9.7-2.11a23.6 23.6 0 0 1 5.57.66Zm.14 9.51h6.14v1.4h-6.14z" />
                        <path fill="currentColor"
                            d="M33.17 21.47H28v2h4.17v8.37H18v-8.37h6.3v.42a1 1 0 0 0 2 0V20a1 1 0 0 0-2 0v1.47H17a1 1 0 0 0-1 1v10.37a1 1 0 0 0 1 1h16.17a1 1 0 0 0 1-1V22.47a1 1 0 0 0-1-1" />
                    </svg>
                    <span class="d-none d-md-block font-weight-medium">Staff</span>
                </a>
            </li>
            <li class="nav-item d-flex align-items-center ms-md-auto mt-2 mt-md-0 guru-buttons">
                <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#import-teacher">
                    Import Guru
                </button>
            </li>
            <li class="nav-item d-flex align-items-center ms-2 mt-2 mt-md-0 guru-buttons">
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#create-teacher">
                    Tambah Guru
                </button>
            </li>

            <li class="nav-item d-flex align-items-center ms-md-auto mt-2 mt-md-0 pegawai-buttons d-none">
                <button type="button" class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#import-employe">
                    Import Pegawai
                </button>
            </li>
            <li class="nav-item d-flex align-items-center ms-2 mt-2 mt-md-0 pegawai-buttons d-none">
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                    data-bs-target="#modal-add-emplo">
                    Tambah Pegawai
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4" id="nav-tabContent">
            <div class="tab-pane fade" id="teacher-content" role="tabpanel" aria-labelledby="teacher-tab">
                @include('school.new.employee.panes.teacher-tab')
            </div>
            <div class="tab-pane fade" id="employee-content" role="tabpanel" aria-labelledby="employee-tab">
                @include('school.new.employee.panes.employee-tab')
            </div>
        </div>
    </div>

    @include('school.new.employee.widgets.employe.update-employe')
    @include('school.new.employee.widgets.employe.modal-detail')
    {{-- @include('school.new.employee.widgets.employe.modal-rfid') --}}

    @include('school.new.employee.widgets.teacher.update-teacher')
    @include('school.new.employee.widgets.teacher.modal-rfid')

    @include('school.new.employee.widgets.teacher.import-teacher')
    @include('school.new.employee.widgets.employe.import-employe')
    @include('school.new.employee.widgets.employe.add-employe')
    @include('school.new.employee.widgets.teacher.add-teacher')
    <x-delete-modal-component />
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            function resetActiveTab() {
                $('.nav-link').removeClass('active');
                $('.tab-pane').removeClass('active show');
            }

            function changeTab() {
                var hash = window.location.hash;
                resetActiveTab();
                var tab = null;
                switch (hash) {
                    case '#employee-content':
                        tab = $('#employee-tab');
                        break;
                    case '#teacher-content':
                        tab = $('#teacher-tab');
                        break;
                    default:
                        tab = $('#teacher-tab');
                        break;
                }
                tab.addClass('active');
                $(tab.attr('href')).addClass('active show');
            }

            function storeActiveTab() {
                var activeTab = $('.nav-link.active').attr('href');
                localStorage.setItem('activeTab', activeTab);
            }

            $(window).on('hashchange', function() {
                changeTab();
                storeActiveTab();
            });

            $('.nav-link').on('shown.bs.tab', function() {
                storeActiveTab();
            });

            var storedTab = localStorage.getItem('activeTab');
            if (storedTab) {
                window.location.hash = storedTab;
            } else {
                $('#teacher-tab').addClass('active');
                $('#teacher-content').addClass('active show');
            }

            changeTab(); // Initialize the correct tab on page load
        });
    </script>
    {{-- handle rfid teacher --}}
    <script>
        $(document).ready(function() {
            $('.btn-rfid').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var rfid = $(this).data('rfid');
                var oldRfid = $(this).data('old-rfid');
                var role = $(this).data('role');
                $('#name-detail-rfid').text(name);
                $('#detail-rfid').text(rfid);
                $('#old_rfid_input').val(oldRfid);
                $('#form-rfid').attr('action', '/school/add-to-rfid/' + role + '/' + id);
                $('#rfid-teacher').modal('show');
            });

            $('#rfid-teacher').on('shown.bs.modal', function() {
                $('#rfid').focus();
            });
        });
    </script>

    {{-- handle rfid staff --}}
    <script>
        $(document).ready(function() {
            $('.btn-rfid').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var rfid = $(this).data('rfid');
                var oldRfid = $(this).data('old-rfid');
                var role = $(this).data('role');

                $('#name-staff-rfid').text(name);
                $('#detail-staff-rfid').text(rfid);
                $('#old_rfid_input_staff').val(oldRfid);
                $('#form-rfid-staff').attr('action', '/school/add-to-rfid/' + role + '/' + id);
                $('#modal-rfid-staff').modal('show');
            });

            $('#modal-rfid-staff').on('shown.bs.modal', function() {
                $('#modal-rfid-staff #rfid').focus(); 
            });
        });
    </script>


    {{-- handle detail staff --}}
    <script>
        $('.btn-detail-employee').click(function() {
            let image = $(this).data('image');
            let name = $(this).data('name');
            let email = $(this).data('email');
            let phone = $(this).data('phone');
            let gender = $(this).data('gender');
            let nip = $(this).data('nip');
            let rfid = $(this).data('rfid');
            let address = $(this).data('address');

            $('#image-detail').attr('src', image);
            $('#name-detail').text(name);
            $('#email-detail').text(email);
            $('#phone-detail').text(phone);
            $('#gender-detail').text(gender);
            $('#nip-detail').text(nip);
            $('#rfid-detail').text(rfid);
            $('#address-detail').text(address);
            $('#modal-detail').modal('show');
        });
    </script>

    {{-- handle delete teacher --}}
    <script>
        $('.btn-delete-teacher').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/teacher/' + id);
            $('#modal-delete').modal('show');
        });
    </script>

    {{-- handle delete staff --}}
    <script>
        $('.btn-delete-staff').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/school/staff/' + id);
            $('#modal-delete').modal('show');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tabs = document.querySelectorAll('#nav-tab a[data-bs-toggle="pill"]');
            var guruButtons = document.querySelectorAll('.guru-buttons');
            var pegawaiButtons = document.querySelectorAll('.pegawai-buttons');

            function updateButtons() {
                var activeTab = document.querySelector('#nav-tab .nav-link.active').getAttribute('id');
                if (activeTab === 'teacher-tab') {
                    guruButtons.forEach(btn => btn.classList.remove('d-none'));
                    pegawaiButtons.forEach(btn => btn.classList.add('d-none'));
                } else if (activeTab === 'employee-tab') {
                    guruButtons.forEach(btn => btn.classList.add('d-none'));
                    pegawaiButtons.forEach(btn => btn.classList.remove('d-none'));
                }
            }

            tabs.forEach(tab => {
                tab.addEventListener('shown.bs.tab', updateButtons);
            });

            updateButtons();
        });
    </script>


    {{-- edit employe --}}
    <script>
        $(document).ready(function() {
            var currentEditSection = 0;
            var editSections = $("#form-edit-employee > section");
            var editSteps = $(".edit-steps li");

            function showStep(stepIndex) {
                editSections.hide();
                editSections.eq(stepIndex).show();
                editSteps.removeClass("current done disabled");
                editSteps.eq(stepIndex).addClass("current");
            }

            showStep(currentEditSection);

            $(".next-edit-step").click(function() {
                if (currentEditSection < editSections.length - 1) {
                    currentEditSection++;
                    showStep(currentEditSection);
                }
            });

            $(".prev-edit-step").click(function() {
                if (currentEditSection > 0) {
                    currentEditSection--;
                    showStep(currentEditSection);
                }
            });

            $('.btn-edit-employee').click(function() {
                let id = $(this).data('id');
                let image = $(this).data('image');
                let name = $(this).data('name');
                let nip = $(this).data('nip');
                let religion_id = $(this).data('religion_id');
                let birth_date = $(this).data('birth_date');
                let birth_place = $(this).data('birth_place');
                let gender = $(this).data('gender');
                let nik = $(this).data('nik');
                let phone = $(this).data('phone');
                let email = $(this).data('email');
                let active = $(this).data('active');
                let address = $(this).data('address');

                $('#edit-preview-img').attr('src', image).show();
                $('#edit-name').val(name);
                $('#edit-nip').val(nip);
                $('#edit-birth-date').val(birth_date);
                $('#edit-birth-place').val(birth_place);
                $('#edit-nik').val(nik);
                $('#edit-phone').val(phone);
                $('#edit-email').val(email);
                $('#edit-address').val(address);

                $('input[name="gender"][value="' + gender + '"]').prop('checked', true);
                $('#edit-religion').val(religion_id);
                $('#edit-status').val(active);

                $('#form-edit-employee').attr('action', '/school/staff/' + id);
                $('#modal-edit-employee').modal('show');
            });
        });

        function previewEditImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('edit-preview-img');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    {{-- edit guru --}}
    <script>
        $(document).ready(function() {
            $('.btn-edit-teacher').click(function() {
                let id = $(this).data('id');
                let image = $(this).data('image');
                let name = $(this).data('name');
                let nip = $(this).data('nip');
                let religion_id = $(this).data('religion_id');
                let birth_date = $(this).data('birth_date');
                let birth_place = $(this).data('birth_place');
                let gender = $(this).data('gender');
                let nik = $(this).data('nik');
                let phone = $(this).data('phone');
                let email = $(this).data('email');
                let active = $(this).data('active');
                let address = $(this).data('address');

                $('#employeeImagePreview').attr('src', image).show();
                $('#name-edit').val(name);
                $('#nip-edit').val(nip);
                $('#edit-religion-teacher').val(religion_id).trigger('change');
                $('#birth_date-edit-teacher').val(birth_date);
                $('#birth_place-edit-teacher').val(birth_place);
                $('#nik-edit').val(nik);
                $('#phone-edit').val(phone);
                $('#email-edit').val(email);
                $('#address-edit').val(address);

                $('#religion-edit').val(religion_id);
                $('#status-edit').val(active);

                $('input[name="gender"][value="' + gender + '"]').prop('checked', true);

                $('#form-update').attr('action', '/school/teacher/' + id);
                $('#modal-update-teacher').modal('show');
            });

            var currentAddSection = 0;
            var addSections = $("#form-update > section");
            var addSteps = $(".add-steps li");

            function showStep(stepIndex) {
                addSections.hide();
                addSteps.removeClass("current done disabled");
                addSections.eq(stepIndex).show();
                addSteps.eq(stepIndex).addClass("current");
            }

            showStep(currentAddSection);

            $(".next-step").click(function() {
                if (currentAddSection < addSections.length - 1) {
                    currentAddSection++;
                    showStep(currentAddSection);
                }
            });

            $(".prev-step").click(function() {
                if (currentAddSection > 0) {
                    currentAddSection--;
                    showStep(currentAddSection);
                }
            });
        });

        function previewAddImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('addImagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    {{-- tambah guru --}}
    <script>
        $(document).ready(function() {
            var currentAddSection = 0;
            var addSections = $("#form-add > section");
            var addSteps = $(".add-steps li");

            addSections.hide();
            addSections.eq(currentAddSection).show();

            $(".next-add-step").click(function() {
                if (currentAddSection < addSections.length - 1) {
                    addSections.eq(currentAddSection).hide();
                    addSteps.eq(currentAddSection).removeClass("current").addClass("done");
                    currentAddSection++;
                    addSections.eq(currentAddSection).show();
                    addSteps.eq(currentAddSection).removeClass("disabled").addClass("current");
                }
            });

            $(".prev-add-step").click(function() {
                if (currentAddSection > 0) {
                    addSections.eq(currentAddSection).hide();
                    addSteps.eq(currentAddSection).removeClass("current").addClass("disabled");
                    currentAddSection--;
                    addSections.eq(currentAddSection).show();
                    addSteps.eq(currentAddSection).removeClass("done").addClass("current");
                }
            });
        });

        function previewAddImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('addImagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


    {{-- tambah pegawai --}}
    <script>
        $(document).ready(function() {
            // Namespace the script
            var employeeFormWizard = (function() {
                var currentStep = 0;
                var steps = $("#add-form > section");
                var stepIndicators = $(".wizard-steps li"); // If you have step indicators

                function showStep(stepIndex) {
                    steps.hide();
                    steps.eq(stepIndex).show();
                    stepIndicators.removeClass("current").addClass("disabled");
                    stepIndicators.eq(stepIndex).removeClass("disabled").addClass("current");
                }

                function nextStep() {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                }

                function prevStep() {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                }

                // Ensure that the button selectors match those in your HTML
                $(document).on('click', '.next-add-step', nextStep);
                $(document).on('click', '.prev-add-step', prevStep);

                // Initialize
                showStep(currentStep);

                return {
                    nextStep: nextStep,
                    prevStep: prevStep
                };
            })();

            function previewFile() {
                var file = document.getElementById('imageInput').files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var output = document.getElementById('previewImg');
                        output.src = event.target.result;
                        output.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            }

            // Attach the preview function to the file input change event
            $("#imageInput").on('change', previewFile);
        });
    </script>
@endsection
