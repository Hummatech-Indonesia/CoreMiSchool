<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Jadwal Pelajaran</h4>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-import">Import Jadwal</button>
</div>

<div class="table-responsive rounded-2">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead>
            <tr>
                <th class="text-white" style="background-color: #5D87FF;">No</th>
                <th class="text-white" style="background-color: #5D87FF;">Penempatan</th>
                <th class="text-white" style="background-color: #5D87FF;">Jam</th>
                <th class="text-white" style="background-color: #5D87FF;">Mata Pelajaran</th>
                <th class="text-white" style="background-color: #5D87FF;">Pengajar</th>
                <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Jam ke 1</td>
                <td>
                    <span class="badge bg-light-primary text-primary">
                        07:00:00 - 07:45:00
                    </span>
                </td>
                <td>Bahasa Sunda</td>
                <td>Suyadi Oke</td>
                <td>
                    <div class="gap-3">
                        <button class="btn btn-light-warning text-warning me-2 btn-edit" data-bs-toggle="modal"
                            data-bs-target="#modal-update">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                            </svg>
                        </button>
                        <button class="btn btn-light-danger text-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#modal-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jam ke 2</td>
                <td>
                    <span class="badge bg-light-warning text-warning">
                        Istirahat
                    </span>
                </td>
                <td></td>
                <td></td>
                <td>
                    <div class="gap-3">
                        <button class="btn btn-light-warning text-warning me-2 btn-edit" data-bs-toggle="modal"
                            data-bs-target="#modal-update">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                            </svg>
                        </button>
                        <button class="btn btn-light-danger text-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#modal-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <div>
                        <button type="button" class="btn-create btn btn-info btn-rounded m-t-10 mb-3"
                            data-bs-toggle="modal" data-bs-target="#modal-create">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"></path>
                            </svg>
                            Tambah Jam
                        </button>
                    </div>
                </td>
                <td colspan="1"></td>
            </tr>
        </tfoot>
    </table>
</div>

@include('components.delete-modal-component')
@include('school.new.lesson-schedule.widgets.create')
@include('school.new.lesson-schedule.widgets.update')
@include('school.new.lesson-schedule.widgets.import')
