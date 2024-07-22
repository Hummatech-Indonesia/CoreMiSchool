@php
    use App\Enums\SemesterEnum;
    use Carbon\Carbon;

    $firstSemester = $semesters->sortBy('created_at')->first();
    $latestSemester = $semesters->sortByDesc('created_at')->first();
@endphp
<div class="card card-body">

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
        <li class="nav-item">
            <button class="nav-link toggle-btn {{ $latestSemester->type == SemesterEnum::GANJIL->value ? 'active' : 'btn-ganjil' }}" id="pills-ganjil-tab" data-bs-toggle="pill" href="#pills-ganjil" role="tab" aria-controls="pills-ganjil" aria-selected="true">
                Ganjil
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link toggle-btn {{ $latestSemester->type == SemesterEnum::GENAP->value ? 'active' : 'btn-genap' }}" id="pills-genap-tab" data-bs-toggle="pill" href="#pills-genap" role="tab" aria-controls="pills-genap" aria-selected="false">
                Genap
            </button>
        </li>
    </ul>
    <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="pills-ganjil" role="tabpanel">
            <div class="container mt-4">
                <div class="position-relative mb-4">
                    <img src="{{ asset('assets/images/background/background-semester.png') }}" alt="Profile Background" class="img-fluid rounded">
                    <div style="position: absolute; top: 25px; left: 30px;">
                        <h6 style="color: white;">Semester Saat Ini :</h6>
                    </div>
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h1 style="color: white;">{{ Str::upper($latestSemester->type) }}</h1>
                    </div>
                </div>
            </div>

            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead class="text-dark fs-4">
                        <tr class="">
                            <th class="fs-4 fw-semibold mb-0">Semester</th>
                            <th class="fs-4 fw-semibold mb-0">Tanggal diubah</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @forelse ($semesters as $semester)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <p>{{ $semester->type == SemesterEnum::GANJIL->value ? 'Genap' : 'Ganjil' }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-3" width="20" height="20" viewBox="0 0 256 256">
                                            <path fill="currentColor" d="m221.66 133.66l-72 72a8 8 0 0 1-11.32-11.32L196.69 136H40a8 8 0 0 1 0-16h156.69l-58.35-58.34a8 8 0 0 1 11.32-11.32l72 72a8 8 0 0 1 0 11.32" />
                                        </svg>
                                        <p>{{ ucfirst($semester->type) }}</p>
                                    </div>
                                </td>
                                <td> {{ Carbon::parse($semester->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-genap" role="tabpanel">
            <div class="container mt-4">
                <div class="position-relative mb-4">
                    <img src="{{ asset('assets/images/background/background-semester.png') }}" alt="Profile Background" class="img-fluid rounded">
                    <div style="position: absolute; top: 25px; left: 30px;">
                        <h6 style="color: white;">Semester Saat Ini :</h6>
                    </div>
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h1 style="color: white;">Ganjil</h1>
                    </div>
                </div>
            </div>

            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead class="text-dark fs-4">
                        <tr class="">
                            <th class="fs-4 fw-semibold mb-0">Semester</th>
                            <th class="fs-4 fw-semibold mb-0">Tanggal diubah</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <p>Genap</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-3" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="currentColor" d="m221.66 133.66l-72 72a8 8 0 0 1-11.32-11.32L196.69 136H40a8 8 0 0 1 0-16h156.69l-58.35-58.34a8 8 0 0 1 11.32-11.32l72 72a8 8 0 0 1 0 11.32" />
                                    </svg>
                                    <p>Ganjil</p>
                                </div>
                            </td>
                            <td>20 Juli 2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
