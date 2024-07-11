@extends('school.layouts.app')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div class="d-flex flex-wrap">
        <select id="tahun-ajaran" class="form-select">
            <option value="">Tahun Ajaran</option>
            <option value="">2023/2024</option>
        </select>
    </div>
</div>

<div class="card card-body">
    <div class="d-flex justify-content-between">
        <div>
            <h4>XII RPL 2</h4>
            <div>
                <p>Pilih siswa di sebelah kiri untuk memasukkan siswa ke dalam Kelas</p>
            </div>
        </div>
        <div>
            <button class="btn btn-primary px-4">Simpan</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex flex-wrap mb-3">
                <form action="" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>

            <div class="table-responsive rounded-2">
                <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>NISN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (range(1,3) as $item)
                        <tr>
                            <td>Olivia Rhye</td>
                            <td>1234567890</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-end mt-3 mb-3">
                    <button class="btn btn-success">
                        Masukan
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap mb-3">
                <form action="" class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari...">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>

            <div class="table-responsive rounded-2">
                <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>NISN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (range(1,3) as $item)
                        <tr>
                            <td>Olivia Rhye</td>
                            <td>1234567890</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-end mt-3 mb-3">
                    <button class="btn btn-danger">
                        Keluarkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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
            @foreach (range(1,7) as $item)
            <tr>
                <td>
                    <img src="{{asset('admin_assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30" height="30" alt="" />
                    Olivia Rhye
                </td>
                <td>XI RPL 2</td>
                <td>1234567890</td>
                <td>
                    Laki-laki
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-3 d-flex justify-content-end">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</div>
@endsection
