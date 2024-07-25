<script>
    $('.btn-update-year').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');
        $('#name-update').val(name);
        $('#status-update').val(status).trigger('change');
        $('#form-update').attr('action', '{{ route('school.school-years.update', '') }}/' + id);
        $('#modal-update-school-year').modal('show');
    });
</script>
