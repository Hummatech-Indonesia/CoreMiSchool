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
    <div>
        <div class="btn-group" role="group" aria-label="Button Navigation">
            <button type="button" class="btn btn-primary toggle-btn" data-toggle="button" aria-pressed="false">
                Ganjil
            </button>
            <button type="button" class="btn btn-primary toggle-btn" data-toggle="button" aria-pressed="false">
                Genap
            </button>
        </div>
        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="ganjil" role="tabpanel">
                <div class="container mt-4">
                    <div class="position-relative mb-4">
                        <img src="{{ asset('admin_assets/dist/images/backgrounds/background-semesters.png') }}"
                            alt="Profile Background" class="img-fluid rounded">
                        <div style="position: absolute; top: 25px; left: 30px;">
                            <h6 style="color: white;">Semester Saat Ini :</h6>
                        </div>
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <h1 style="color: white;">GANJIL</h1>
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
                        <tbody>
                            @foreach (range(1, 5) as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <p>Ganjil</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-3" width="20"
                                                height="20" viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m221.66 133.66l-72 72a8 8 0 0 1-11.32-11.32L196.69 136H40a8 8 0 0 1 0-16h156.69l-58.35-58.34a8 8 0 0 1 11.32-11.32l72 72a8 8 0 0 1 0 11.32" />
                                            </svg>
                                            <p> Genap</p>
                                        </div>
                                    </td>
                                    <td>
                                        9 Juli 2024
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-btn').click(function() {
                $(this).toggleClass('active');

                $('.toggle-btn').not(this).removeClass('active');

                $(this).attr('aria-pressed', $(this).hasClass('active'));
                $('.toggle-btn').not(this).attr('aria-pressed', false);
            });
        });
    </script>
@endsection
