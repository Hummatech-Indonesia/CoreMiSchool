<script>
    $('.classroom').change(function () {
        var id = $(this).val();
        console.log(id);
        getStudents(id);
    })

    function getStudents(id) {
        $.ajax({
            url: "/school/classroom-students",
            method: "GET",
            data: {
                classroom_id: id
            },
            dataType: "JSON",
            beforeSend: function () {
                $('.student').html('')
            },
            success: function (response) {
                $.each(response.data, function (index, data) {
                    $('.student').append('<option value="' + data.student_id + '">' + data.student.user.name + '</option>')
                });
            },
            error: function (error) {
                console.log(error);
            }
        })
    }
</script>