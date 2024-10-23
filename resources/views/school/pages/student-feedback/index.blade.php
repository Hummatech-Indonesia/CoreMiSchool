@extends('school.layouts.app')
@section('style')
    <style>
        .btn-primary.toggle-btn.active {
            background-color: #5D87FF;
            border: none;
        }

        .btn-primary.toggle-btn:not(.active) {
            background-color: transparent;
            color: #5D87FF;
        }
    </style>
@endsection
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden mb-0">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold text-white mb-8">Tanggapan Siswa</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">Tanggapan siswa mengenai guru pengajar</a></li>
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


    <div class="row d-flex align-items-center mb-4">
        <form class="row g-3 align-items-center col-md-9">
            <div class="col-md-3 col-sm-12">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </div>
            <div class="col-md-2 col-sm-12">
                <select name="points" class="form-select">
                    <option value="">Laki-laki</option>
                    <option value="">Perempuan</option>
                </select>
            </div>
            <div class="col-md-1 col-sm-12">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </form>

        <div class="col-md-3 d-flex justify-content-end pt-3">
            <div class="btn-group" role="group" aria-label="Button Navigation">
                <button type="button" class="btn btn-light-primary {{ $feedback_id == null ? 'active' : 'btn-nonactive' }}">
                    Nonaktif
                </button>
                <button type="button" class="btn btn-light-primary {{ $feedback_id != null ? 'active' : 'btn-active' }}">
                    Aktif
                </button>
            </div>
        </div>
    </div>


    <div class="row">
        @forelse ($teachers as $teacher)
            <div class="col-lg-3">
                <div class="card border">
                    <div class="card-body">
                        <div class="p-2 d-block text-center">
                            <img src="{{ $teacher->image != null ? asset('storage/' . $teacher->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                width="90" class="rounded-circle img-fluid" alt="">
                            <h5 class="card-title mt-3 fw-semibold">
                                {{ $teacher->user->name }}
                            </h5>
                            <p>{{ $teacher->user->email }}</p>
                            <a href="{{ route('school.feedback.detail', ['teacher' => $teacher->user->slug]) }}"
                                class="btn btn-primary d-block w-100">Lihat Tanggapan</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.btn-nonactive').click(function() {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Untuk nonaktifkan tanggapan siswa ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('school.feedback.nonactive') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                        },
                        success: function(res) {
                            location.reload();
                            Swal.fire({
                            title: 'Sukses!',
                            text: 'Tanggapan siswa berhasil dinonaktifkan.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                            });
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
        });

        $('.btn-active').click(function() {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Untuk aktifkan tanggapan siswa ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('school.feedback.active') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                        },
                        success: function(res) {
                            location.reload();
                            Swal.fire({
                            title: 'Sukses!',
                            text: 'Tanggapan siswa berhasil diaktifkan.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                            });
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
