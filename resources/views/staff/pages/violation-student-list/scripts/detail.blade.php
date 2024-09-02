<script>
    $('.btn-detail').click(function() {
        let name = $(this).data('name');
        let classroom = $(this).data('classroom');
        let violation = $(this).data('violation');
        let date = $(this).data('date');

        console.log(name);
        

        $('#detail-student-name').text(name);
        $('#detail-student-classroom').text(classroom);
        $('#detail-student-violation').text(violation);
        $('#detail-violation-date').text(date);
        $('#detail-violation-student').modal('show');
    });
</script>
