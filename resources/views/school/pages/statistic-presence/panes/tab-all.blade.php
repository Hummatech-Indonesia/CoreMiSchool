<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h5>Statistik Absensi Siswa</h5>
        <div class="d-flex">
            <h5>{{ \Carbon\Carbon::parse($date)->format('d F Y') }}</h5>

            <div class="btn-group">
                <div class="btn-group dropstart" role="group">
                    <button type="button" class="btn border-0 dropdown-toggle-split show" data-bs-toggle="dropdown" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" style="padding-bottom: 17px;" width="30" height="30" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4" /></svg>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Download SVG</a></li>
                        <li><a class="dropdown-item" href="#">Download PNG</a></li>
                        <li><a class="dropdown-item" href="#">Download CSV</a></li>
                    </ul>
                </div>
                {{-- <button type="button" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4"/></svg>
                </button> --}}
            </div>
        </div>
    </div>
    <div class="d-flex">
        <div id="custom-legend">
            <div><span class="legend-text me-3">Petunjuk</span></div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(19, 222, 185);"></span>
                <span class="legend-text">Masuk</span>
            </div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(93, 135, 255);"></span>
                <span class="legend-text">Izin</span>
            </div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(255, 174, 31);"></span>
                <span class="legend-text">Sakit</span>
            </div>
            <div class="legend-item">
                <span class="legend-marker" style="background-color: rgb(250, 137, 107);"></span>
                <span class="legend-text">Alfa</span>
            </div>
        </div>
    </div>
    <div id="chart-student"></div>
</div>
