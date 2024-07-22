@section('style')
    <style>
        .bg-semester {
            /* background-image: url('{{ asset('assets/images/bg-ekstra.png') }}');
        background-size: cover;
        background-clip: padding-box;
        width: 100%; */
        }
    </style>
@endsection

<div class="row">
    @forelse ($schoolYears as $schoolYear)
        <div class="col-lg-4 col-md-12">
            <div class="card position-relative">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5>Tahun Ajaran</h5>
                        <div class="btn-group">
                            <a class="nav-link label-group p-0" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="true">
                                <div>
                                    <span class="more-options text-dark">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" data-popper-placement="bottom-end">
                                <button type="button" data-id="{{ $schoolYear->id }}" data-name="{{ $schoolYear->school_year }}" data-status="{{ $schoolYear->active }}" class="btn-update-year note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                    <i class="fs-4 ti ti-edit"></i>
                                    Edit
                                </button>

                                <button data-id="{{ $schoolYear->id }}"
                                    class="btn-delete-year note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                    data-id="">
                                    <i class="fs-4 ti ti-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span
                            class="badge bg-light-primary fs-5 fw-semibold text-primary">{{ $schoolYear->school_year }}</span>
                    </div>
                </div>
                <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
                    <img src="{{ asset('assets/images/background/buble.png') }}" alt="Description" class="img-fluid"
                        style="max-width: 100px; height: auto;">
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
