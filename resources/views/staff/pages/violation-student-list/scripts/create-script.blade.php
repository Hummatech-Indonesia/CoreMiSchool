<script>
    $(document).ready(function() {
        $('.select2-jenis').select2({
            dropdownParent: $('#violation-student-create'),
            placeholder: "Pilih Jenis Pelanggaran",
            allowClear: true
        });

        $('.select2-siswa').select2({
            dropdownParent: $('#violation-student-create'),
            placeholder: "Pilih Nama Siswa",
            allowClear: true
        });
    });
</script>
