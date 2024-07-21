@extends('school.layouts.app')
@section('content')
<div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-auto">
                <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 84px; height: 84px;">
            </div>
            <div class="col">
                <h4 class="fw-semibold mb-2 text-light">Suyadi Oke</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 m-0">
                        <li class="breadcrumb-item" aria-current="page">suyadi@gmail.com</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection
