@extends('school.layouts.app')

@section('content')
<div class="card card-body">
    <div class="d-flex justify-content-between">
        <div>
            <h4>{{ $classroom->name }}</h4>
            <div>
                <p>Pilih siswa di sebelah kiri untuk memasukkan siswa ke dalam Kelas</p>
            </div>
        </div>
        <div>
            <button id="save-button" class="btn btn-primary px-4">Simpan</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex flex-wrap mb-3">
                <form class="position-relative">
                    <input type="text" name="name" class="form-control product-search ps-5" id="input-search-left" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>

            <div class="table-responsive rounded-2">
                <table id="left-table" class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>NISN</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr data-id="{{ $student->id }}">
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->nisn }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-tr">
                            <td colspan="3" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                        width="200px">
                                    <p class="fs-5 text-dark text-center mt-2">
                                        Siswa belum ditambahkan
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-end mt-3 mb-3">
                    <button id="move-to-right" class="btn btn-success">
                        Masukan
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap mb-3">
                <form class="position-relative">
                    <input type="text" name="search" class="form-control product-search ps-5" id="input-search-right" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>

            <div class="table-responsive rounded-2">
                <table id="right-table" class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>NISN</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classroomStudents as $classroomStudent)
                        <tr data-id="{{ $classroomStudent->student->id }}">
                            <td>{{ $classroomStudent->student->user->name }}</td>
                            <td>{{ $classroomStudent->student->nisn }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-end mt-3 mb-3">
                    <button id="move-to-left" class="btn btn-danger">
                        Keluarkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden fields to store changes -->
{{-- <form id="save-form" action="{{ route('classroom.update', $classroom->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="add_students" id="add-students">
    <input type="hidden" name="remove_students" id="remove-students">
</form> --}}


<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($classroomStudents as $classroomStudent)
            <tr>
                <td>
                    <img src="{{ $classroomStudent->image ? asset('storage/' . $classroomStudent->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                    {{ $classroomStudent->student->user->name }}
                </td>
                <td>{{ $classroomStudent->classroom->name }}</td>
                <td>{{ $classroomStudent->student->nisn }}</td>
                <td>
                    {{ $classroomStudent->student->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}
                </td>
            </tr>
            @empty
            <tr class="empty-tr">
                <td colspan="4">Kelas ini kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination justify-content-end mb-0">
    <x-paginate-component :paginator="$classroomStudents" />
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
    // Handle move to right
    $('#move-to-right').click(function() {
        $('#left-table tbody tr').each(function() {
            if ($(this).find('.form-check-input').is(':checked')) {
                $(this).find('.form-check-input').prop('checked', false);
                $('#right-table tbody').append($(this));
            }
        });
    });

    // Handle move to left
    $('#move-to-left').click(function() {
        $('#right-table tbody tr').each(function() {
            if ($(this).find('.form-check-input').is(':checked')) {
                $(this).find('.form-check-input').prop('checked', false);
                $('#left-table tbody').append($(this));
            }
        });
    });

    // Handle save button
    $('#save-button').click(function() {
        var addStudents = [];
        var removeStudents = [];

        $('.empty-tr').remove();
        $('#right-table tbody tr').each(function() {
            addStudents.push($(this).data('id'));
        });

        $('#left-table tbody tr').each(function() {
            removeStudents.push($(this).data('id'));
        });

        $('#add-students').val(addStudents.join(','));
        $('#remove-students').val(removeStudents.join(','));

        $('#save-form').submit();
    });
});

    </script>
@endsection
