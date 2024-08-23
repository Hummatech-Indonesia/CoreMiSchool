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

    let counter = 0;

    // Fungsi untuk menginisialisasi select2 pada elemen yang baru dibuat
    function initializeSelect2() {
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
    }

    // Inisialisasi ulang select2 setelah elemen baru ditambahkan
    $(document).on('click', '[data-repeater-create]', function() {
        counter++;
        setTimeout(() => {
            const newItem = $('[data-repeater-item]').last();
            newItem.find('.select2-jenis').attr('id', 'select2-jenis-' + counter);
            newItem.find('.select2-siswa').attr('id', 'select2-siswa-' + counter);
            initializeSelect2();
        }, 0);
    });

    // Inisialisasi ulang select2 saat halaman pertama kali dimuat
    initializeSelect2();
});
</script>
