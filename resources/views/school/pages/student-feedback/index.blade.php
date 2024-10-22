@extends('school.layouts.app')
@section('style')
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

        <div class="col-md-3 d-flex justify-content-end">
            <div class="form-check form-switch d-flex align-items-center">
                <label class="form-check-label me-5" for="toggleSwitch">Nonaktif</label>
                <input class="form-check-input" type="checkbox" id="toggleSwitch">
                <label class="form-check-label ms-2" for="toggleSwitch">Aktif</label>
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

@section('style')

@endsection
