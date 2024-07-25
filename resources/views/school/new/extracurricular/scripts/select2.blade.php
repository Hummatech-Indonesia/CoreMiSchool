<script>
    $(document).ready(function() {
        $('.select2-create').select2({
            dropdownParent: $('#modal-create')
        });

        $('.select2-edit').select2({
            dropdownParent: $('#modal-edit')
        });

        $('.category-dropdown').on('show.bs.dropdown', function() {
            $(this).closest('.table-responsive').css('overflow', 'visible');
        });

        $('.category-dropdown').on('hide.bs.dropdown', function() {
            $(this).closest('.table-responsive').css('overflow', 'auto');
        });
    });
</script>
