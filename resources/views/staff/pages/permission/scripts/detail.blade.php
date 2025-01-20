<script>
    $(document).ready(function() {
        $('.btn-detail').on('click', function() {
            var name = $(this).data('name');
            var clasroom = $(this).data('clasroom');
            var status = $(this).data('status');
            var startdate = $(this).data('startdate');
            var proof = $(this).data('proof');
            $('#name-detail').text(name);
            $('#classroom-detail').text(clasroom);
            $('#status-detail').text(status);
            $('#date-detail').text(startdate);
            $('#proof-detail').attr('src',proof);
            $('#modal-detail').modal('show');
        });
    });
</script>
