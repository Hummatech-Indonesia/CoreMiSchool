<script>
    $('.btn-detail').click(function() {
        var employee = $(this).data('employee');
        var student = $(this).data('student');
        var repair = $(this).data('repair');
        var point = $(this).data('point');
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        var proof = $(this).data('proof');

        $('#employee-detail').val(employee);
        $('#student-detail').val(student);
        $('#repair-detail').val(repair);
        $('#point-detail').val(point);
        $('#start_date-detail').val(start_date);
        $('#end_date-detail').val(end_date);
        $('#proof-detail').attr('src', proof);

        $('#repair-list-detail').modal('show');
    });

    $('.btn-upload').click(function() {
        var employee = $(this).data('employee');
        var student = $(this).data('student');
        var repair = $(this).data('repair');
        var point = $(this).data('point');
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        var proof = $(this).data('proof');

        $('#employee-detail').val(employee);
        $('#student-detail').val(student);
        $('#repair-detail').val(repair);
        $('#point-detail').val(point);
        $('#start_date-detail').val(start_date);
        $('#end_date-detail').val(end_date);
        $('#proof-detail').attr('src', proof);

        $('#repair-upload-detail').modal('show');
    });
</script>
