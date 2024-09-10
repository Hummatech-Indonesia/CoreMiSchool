<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4><b>Profil guru</b></h4>
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <img src="{{ asset('assets/images/default-user.jpeg') }}" width="120px" alt=""
                        class="img-fluid">
                </div>
                <div class="col-lg-8 ms-1">
                    <h3><b>{{ auth()->user()->name }}</b></h3>
                    <h5>Tahun Ajaran {{ $schoolYear->school_year }}</h5>
                    <div class="pt-2">
                        @forelse ($teacherSubjects as $teacherSubject)
                            <div class="m-1 badge bg-light-primary text-primary">
                                {{ $teacherSubject->subject->name }}</div>
                        @empty
                            <div class="badge bg-light-warning text-warning">Anda tidak megajar pelajaran apapun
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                @if ($classroom)
                    <div class="col-lg-8">
                        <h5><b>Wali Kelas Dari</b></h5>
                        <h3 class="my-4"><b>{{ $classroom->name }}</b></h3>
                        <div class="badge bg-light-primary text-primary fs-5">
                            {{ $classroom->classroomStudents->count() }} Total Siswa</div>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ asset('assets/images/Topi.png') }}">
                    </div>
                @else
                    <div class="col-lg-12 text-center">
                        <img src="{{ asset('assets/images/Topi.png') }}" width="140">
                        <h4>Anda tidak menjadi wali kelas manapun</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
