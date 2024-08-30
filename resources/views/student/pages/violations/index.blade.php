@extends('student.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-white">Daftar Pelanggaran</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">Daftar pelanggaran dan jumlah point siswa</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/pagar.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center mb-2">
        <span class="mb-1 badge bg-primary p-0 rounded-2 d-flex align-items-center justify-content-center"
            style="width: 24px; height: 24px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                <path fill="currentColor"
                    d="m8.93 6.588l-2.29.287l-.082.38l.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319c.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246c-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
            </svg>
        </span>
        <h5 class="ms-2 mb-0" style="font-size: 20px;"><b>Informasi</b></h5>
    </div>
    <p>Penjelasan tentang pelanggaran dan point peringatan melanggar</p>

    <div class="row">
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="flex: 0 0 25%; max-width: 25%;">
            <div class="card w-100 border p-0" style="background: linear-gradient(135deg, #51B6FF, #4F7CFF); color: #fff;">
                <div class="card-body d-flex flex-column p-3" style="background: none;">
                    <h6 class="text-light text-center pt-2" style="font-size: 20px"><b>Jumlah Point Kamu</b></h6>
                    <p class="card-text text-center" style="font-size: 12px; margin-bottom: 10px;">Siswa bisa melakukan
                        perbaikan untuk mengurangi point</p>
                    <h1 class="text-light text-center" style="font-size: 40px; margin-top: 20px;"><b>{{ auth()->user()->student->point }}</b></h1>
                    <h6 class="text-light text-center" style="font-size: 20px; margin-top: 10px;"><b>Point Pelanggaran</b>
                    </h6>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="flex: 0 0 37.5%; max-width: 37.5%;">
            <div class="card w-100 border p-0">
                <div class="card-header bg-danger rounded-bottom-2">
                    <h4 class="mb-0 text-white card-title">Pelanggaran</h4>
                </div>
                <div class="card-body p-3 d-flex flex-column">
                    <ul style="list-style-type:disc; padding-left: 20px;">
                        <li style="padding-bottom: 6px">Point maksimal pada sekolah <b>{{ $maxPoint }} point</b></li>
                        <li style="padding-bottom: 6px">Siswa diperkenankan melakukan perbaikan untuk mengurangi point
                            pelanggaran yang dimiliki (silahkan ke staff untuk meminta tugas perbaikan)</li>
                        <li style="padding-bottom: 6px">Siswa melanggar akan diberikan point yang setimpal dengan apa yang
                            telah dilanggar</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="flex: 0 0 37.5%; max-width: 37.5%;">
            <div class="card w-100 border">
                <div class="card-header bg-warning rounded-bottom-2">
                    <h4 class="mb-0 text-white card-title">Point Peringatan</h4>
                </div>
                <div class="card-body p-3 d-flex flex-column">
                    <ul style="list-style-type:disc; padding-left: 20px;">
                        @forelse ($schoolPoints as $schoolPoint)
                            <li style="padding-bottom: 6px">Point {{ $schoolPoint->point }}: {{ $schoolPoint->description }}</li>
                        @empty
                            <li style="padding-bottom: 6px">Belum ada point peringatan</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="d-flex align-items-center mb-2">
        <span class="mb-1 badge bg-primary p-0 rounded-2 d-flex align-items-center justify-content-center"
            style="width: 24px; height: 24px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                <path fill="currentColor"
                    d="m8.93 6.588l-2.29.287l-.082.38l.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319c.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246c-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
            </svg>
        </span>
        <h5 class="ms-2 mb-0" style="font-size: 20px;"><b>Daftar Pelanggaran</b></h5>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 mt-4">
        <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="text" name="search" value="{{ old('search', request('search')) }}" class="form-control" placeholder="Cari..." value="">
            </div>

            <div class="mb-3 mb-md-0 me-md-3">
                <select name="point_student" class="form-select">
                    <option value="highest">Point Tertinggi</option>
                    <option value="lowest">Point Terendah</option>
                </select>
            </div>

            <div class="mb-3 mb-md-0 me-md-3">
                <select name="order" class="form-select">
                    <option value="latest" {{ old('order') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ old('order') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th>No</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Tanggal</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($studentViolations as $studentViolation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $studentViolation->regulation->violation }}</td>
                        <td>{{ Carbon\Carbon::parse($studentViolation->created_at)->format('d M Y') }}</td>
                        <td>
                            <span class="badge bg-light-danger text-danger">+ {{ $studentViolation->regulation->point }} Point</span>
                        </td>
                        <td>
                            <button class="btn btn-primary py-1 px-4 btn-detail"
                                data-name="{{ $studentViolation->classroomStudent->student->user->name }}"
                                data-classroom="{{ $studentViolation->classroomStudent->classroom->name }}"
                                data-violation="{{ $studentViolation->regulation->violation }}"
                                data-date="{{ Carbon\Carbon::parse($studentViolation->created_at)->format('d M Y') }}"
                            >Detail</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Kamu belum pernah melanggar peraturan sekolah
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('student.pages.violations.widgets.modal-detail')
@endsection
@section('script')
    @include('student.pages.violations.scripts.detail')
@endsection
