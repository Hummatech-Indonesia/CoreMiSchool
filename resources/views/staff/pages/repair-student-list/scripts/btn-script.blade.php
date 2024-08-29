<script>
    $('.btn-detail').click(function() {
        var id = $(this).data('id');
        var student = $(this).data('student');
        var classroom = $(this).data('classroom');
        var gender = $(this).data('gender');
        var employee = $(this).data('employee');
        var repair = $(this).data('repair');
        var proof = $(this).data('proof');
        var is_approved = $(this).data('is_approved');
        var date = $(this).data('date');

        $('#student-detail').text(student);
        $('#classroom-detail').text(classroom);
        $('#gender-detail').text(gender);
        $('#employee-detail').text(employee);
        $('#repair-detail').text(repair);
        $('#proof-detail').attr('src', proof);
        $('#is_approved-detail').text(is_approved);
        $('#date-detail').attr('src', date);

        $('#modal-detail-remidial').modal('show');
    });
</script>