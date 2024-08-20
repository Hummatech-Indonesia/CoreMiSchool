@extends('staff.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card bg-primary shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <b class="text-white fs-2">Daftar Point Siswa</b>
                        <h4 class="fw-semibold text-white fs-5 mt-1">100 Siswa Melanggar</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white fs-2" href="javascript:void(0)">Daftar daftar siswa yang melanggar akan mendapatkan point sesuai apa yang dilanggar</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('admin_assets/dist/images/breadcrumb/pagar.png') }}" width="130px" alt=""
                                class="img-fluid mb-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-none position-relative overflow-hidden" style="background: linear-gradient(to bottom, #FFE252, #ffc107);">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="fw-semibold text-white mb-8">Statistik Absensi</h5>
                            <span class="mb-1 badge bg-white p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-warning" width="15" height="15" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                                </svg>
                            </span>
                        </div>
                        <nav aria-label="breadcrumb">
                            <span class="badge fw-semibold fs-6 text-warning bg-white p-2">200 Point</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="mb-3">
        <form class="d-flex gap-2" action="/school/students">
            <div class="position-relative">
                <input type="text" name="name" class="form-control product-search ps-5" id="input-search" placeholder="Cari..." value="{{ old('name', request('name')) }}">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </div>
            <div class="d-flex gap-2">
                <select name="gender" class="form-select">
                    <option value="">Tampilkan semua</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
                <select name="class" class="form-select">
                    <option value="">Point Tertinggi</option>
                    <option value="">Point Terendah</option>
                </select>
                <div>
                    <button type="submit" class="btn btn-primary btn-md">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>NISN</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse (range(1,10) as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/profile/user-10.jpg') }}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="40" height="40" alt="" />
                                <div class="ms-3">
                                    <h6 class="fs-4 fw-semibold mb-0 text-start">Ahmad Lukman Hakim</h6>
                                    <span class="fw-normal"></span>
                                </div>
                            </div>
                        </td>
                        <td>X RPL 1</td>
                        <td>123456789</td>
                        <td>
                            <span class="badge bg-light-danger text-danger">80 Point</span>
                        </td>
                        <td>
                            <button class="btn btn-primary py-1 px-4">Detail</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Siswa belum ditambahkan
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection