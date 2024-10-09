<script>
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '');
        $('#modal-delete').modal('show');
    });
</script>
