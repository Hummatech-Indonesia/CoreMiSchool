@extends('school.layouts.app')

@section('style')
<style>
    .nav-tabs .nav-link.active.success {
        color: var(--bs-nav-tabs-link-active-color);
        background-color: #13deb9;
        border-color: var(--bs-nav-tabs-link-active-border-color);
    }
</style>
@endsection

@section('content')
    <div class="card p-3">
        <ul class="nav nav-tabs gap-2" role="tablist" id="day-tabs">
        </ul>
    </div>

    <div class="tab-content" id="day-tab-content">
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var days = [
            { name: 'Senin', id: 'monday' },
            { name: 'Selasa', id: 'tuesday' },
            { name: 'Rabu', id: 'wednesday' },
            { name: 'Kamis', id: 'thursday' },
            { name: 'Jumat', id: 'friday' },
            { name: 'Sabtu', id: 'saturday' },
            { name: 'Minggu', id: 'sunday' }
        ];

        days.forEach(function(day, index) {
            var dayTab = `<li class="nav-item">
                <a class="nav-link ${index === 0 ? 'active' : ''}" data-bs-toggle="tab" href="#${day.id}" role="tab" data-day="${day.id}">
                    <span>${day.name}</span>
                </a>
            </li>`;
            $('#day-tabs').append(dayTab);

            var dayPane = `<div class="tab-pane ${index === 0 ? 'active' : ''}" id="${day.id}" role="tabpanel">
                <!-- Content for ${day.name} will be loaded here -->
            </div>`;
            $('#day-tab-content').append(dayPane);
        });

        function loadContent(day, role) {
            $.ajax({
                url: '/school/get-clock-settings',
                method: 'GET',
                data: {
                    day: day,
                    role: role
                },
                success: function(response) {
                    renderContent(day, response, role);
                },
                error: function() {
                    renderDefaultContent(day, role);
                }
            });
        }

        function renderContent(day, data, role) {
            var content = `
                <div class="card p-3 mt-2">
                    <ul class="nav nav-tabs gap-2" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link btn-role ${role === 'student' ? 'active success' : 'success'}" data-bs-toggle="tab" data-role="student" role="tab">
                                <span>Siswa</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link btn-role ${role === 'teacher' ? 'active success' : 'success'}" data-bs-toggle="tab" data-role="teacher" role="tab">
                                <span>Guru</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="form-content-${day}-${role}" role="tabpanel">
                            <form id="form-store-${day}-${role}" enctype="multipart/form-data" method="POST">
                                @method('post')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-masuk-${day}-${role}" class="mb-2">Waktu Masuk Dimulai</label>
                                        <input type="time" class="form-control" id="waktu-masuk-${day}-${role}" name="checkin_start" value="${data.start_time || ''}">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-selesai-${day}-${role}" class="mb-2">Waktu Masuk Selesai</label>
                                        <input type="time" class="form-control" id="waktu-selesai-${day}-${role}" name="checkin_end" value="${data.end_time || ''}">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-pulang-${day}-${role}" class="mb-2">Waktu Pulang Dimulai</label>
                                        <input type="time" class="form-control" id="waktu-pulang-${day}-${role}" name="checkout_start" value="${data.leave_start || ''}">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-pulang-selesai-${day}-${role}" class="mb-2">Waktu Pulang Selesai</label>
                                        <input type="time" class="form-control" id="waktu-pulang-selesai-${day}-${role}" name="checkout_end" value="${data.leave_end || ''}">
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" value="${data.holiday == '1' ? '0' : '1'}" name="is_holiday" id="libur-${day}-${role}" ${data.holiday ? 'checked' : ''}>
                                            <label class="form-check-label" for="libur-${day}-${role}">Libur</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4 mb-3">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            <form>
                        </div>
                    </div>
                </div>
            `;
            $('#' + day).html(content);
            $('#form-store-' + day + '-' + role).attr('action', '/school/add-clock-settings/' + day + '/' + role);
        }

        function renderDefaultContent(day, role) {
            var defaultContent = `
                <div class="card p-3 mt-2">
                    <ul class="nav nav-tabs gap-2" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link btn-role ${role === 'student' ? 'active success' : 'success'}" data-bs-toggle="tab" data-role="student" role="tab">
                                <span>Siswa</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link btn-role ${role === 'teacher' ? 'active success' : 'success'}" data-bs-toggle="tab" data-role="teacher" role="tab">
                                <span>Guru</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="form-content-${day}-${role}" role="tabpanel">
                            <form id="form-store-${day}-${role}" enctype="multipart/form-data" method="POST">
                                @method('post')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-masuk-${day}-${role}" class="mb-2">Waktu Masuk Dimulai</label>
                                        <input type="time" class="form-control" id="waktu-masuk-${day}-${role}" name="checkin_start">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-selesai-${day}-${role}" class="mb-2">Waktu Masuk Selesai</label>
                                        <input type="time" class="form-control" id="waktu-selesai-${day}-${role}" name="checkin_end">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-pulang-${day}-${role}" class="mb-2">Waktu Pulang Dimulai</label>
                                        <input type="time" class="form-control" id="waktu-pulang-${day}-${role}" name="checkout_start">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="waktu-pulang-selesai-${day}-${role}" class="mb-2">Waktu Pulang Selesai</label>
                                        <input type="time" class="form-control" id="waktu-pulang-selesai-${day}-${role}" name="checkout_end">
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" role="switch" name="is_holiday" id="libur-${day}-${role}">
                                            <label class="form-check-label" for="libur-${day}-${role}">Libur</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4 mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            `;
            $('#' + day).html(defaultContent);
            $('#form-store-' + day + '-' + role).attr('action', '/school/add-clock-settings/' + day + '/' + role);
        }

        $('.nav-tabs a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var day = $(this).data('day');
            loadContent(day, 'student');
        });

        $(document).on('click', '.btn-role', function() {
            var role = $(this).data('role');
            var day = $(this).closest('.tab-pane').attr('id');
            loadContent(day, role);
        });

        var activeDay = $('.nav-tabs a[data-bs-toggle="tab"].active').data('day');
        loadContent(activeDay, 'student');
    });
</script>
@endsection
