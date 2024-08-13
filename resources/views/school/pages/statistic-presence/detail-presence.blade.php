@extends('school.layouts.app')

@section('content')
<div class="card bg-light-primary shadow-none position-relative overflow-hidden text-light">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-12">
                <h4 class="fw-semibold mb-8 text-primary">Detail Absensi</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-primary" aria-current="page">Siswa - X RPL 1</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="d-flex align-items-center">
    <span class="mb-1 badge bg-primary p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
        </svg>
    </span>
    <h5 class="ms-2 mb-1 fw-semibold">Statistik Absensi Pegawai</h5>
</div>
@endsection
