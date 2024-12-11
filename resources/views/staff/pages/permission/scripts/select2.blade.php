<script>
    $(document).ready(function() {

        $('#list-classroom').change(function () {
            const selectedValue = $(this).val();
            listStudent(selectedValue);
        });

        function fetchStudent(index, value)
        {
            return `
                <option value="${value.student_id}">${value.student}</option>
            `
        }

        function listStudent(id)
        {
            $.ajax({
                type: "GET",
                url: "/api/student/classroom/" + id,
                dataType: "json",
                success: function (response) {
                    $.each(collection, function (indexInArray, valueOfElement) {
                        $('#list-student').append(fetchStudent(indexInArray, valueOfElement));
                    });
                }
            });
        }


        $('.select2-create').select2({
            dropdownParent: $('#modal-create')
        });
    });
</script>
