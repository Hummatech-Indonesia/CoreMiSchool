<script>
    $(document).ready(function() {
        $('.btn-detail').on('click', function() {
            var id = $(this).data('id');
            var clock = $(this).data('clock');
            var teacher_name = $(this).data('teacher_name');
            var teacher_email = $(this).data('teacher_email');
            var is_teacher_present = $(this).data('is_teacher_present');
            var summary = $(this).data('summary');
            $('#clock-detail').text(clock);
            $('#teacher_name-detail').text(teacher_name);
            $('#teacher_email-detail').text(teacher_email);
            $('#is_teacher_present-detail').val(is_teacher_present).trigger('change');
            $('#summary-detail').text(summary);

            if (summary == null) {
                $('#form-create').attr('action', `{{ route('student.feedback.store', '') }}/${id}`);
            } else {
                $('#form-create').attr('action', `{{ route('student.feedback.update', '') }}/${id}`);
            }
            $('#modal-detail').modal('show');
        });
    });
</script>
