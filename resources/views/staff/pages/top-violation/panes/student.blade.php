<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-3">Daftar Pelanggaran</h5>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <form class="d-flex flex-column flex-md-row align-items-center" method="GET">
                <div class="mb-3 mb-md-0 me-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Cari..."
                        value="{{ old('name', request('name')) }}">
                </div>

                <div class="mb-3 mb-md-0 me-md-3">
                    <select name="filter" class="form-select">
                        <option value="highest" {{ old('filter', request('filter')) == 'highest' ? 'selected' : '' }}>Terbanyak</option>
                        <option value="lowest" {{ old('filter', request('filter')) == 'lowest' ? 'selected' : '' }}>Tersedikit</option>
                        <option value="latest" {{ old('filter', request('filter')) == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ old('filter', request('filter')) == 'oldest' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <div class="table-responsive rounded-2">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4 text-center">
                    <tr>
                        <th>No</th>
                        <th class="text-start nama-col">Nama Pelanggaran</th>
                        <th>Point</th>
                        <th>Banyak Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($violations as $violation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $violation->violation }}</td>
                            <td>{{ $violation->point }}</td>
                            <td>
                                <span class="mb-1 badge font-medium bg-light-danger text-danger">{{ $violation->studentViolations->count() }}
                                    Siswa</span>
                            </td>
                            <td>
                                {{-- href="{{ route('employee.student-violation.detail', ['student' => $student->id]) }}" --}}
                                <a href="#" type="button" class="btn mb-1 waves-effect waves-light btn-primary">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                    <p class="fs-5 text-dark text-center mt-2">
                                        Tidak ada pelanggaran
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <x-paginate-component :paginator="$students" /> --}}
        </div>

    </div>
</div>
