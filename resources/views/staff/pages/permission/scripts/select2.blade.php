<script>
    $(document).ready(function() {

        $('#list-classroom').change(function () {
            const selectedValue = $(this).val();
            listStudent(selectedValue);
        });

        function listStudent(id)
        {

            const hostname = window.location.hostname;

            $.ajax({
                type: "GET",
                url: "https://${hostname}/api/student/classroom/" + id,
                dataType: "json",
                success: function (response) {
                    $('#list-student').append(`<option value="${response.data.student_id}">${response.data.student}</option>`);
                }
            });
        }


        $('.select2-create').select2({
            dropdownParent: $('#modal-create')
        });
    });
</script>
