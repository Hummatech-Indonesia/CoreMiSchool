<script>
    $('.btn-rfid').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var rfid = $(this).data('rfid');
        var oldRfid = $(this).data('old-rfid');
        var role = $(this).data('role');

        $('#name').text(name);
        $('#rfid').text(rfid);
        $('#old_rfid_input').val(oldRfid);
        $('#form-rfid').attr('action', '/school/add-to-rfid/' + role + '/' + id);

        $('#modal-create-rfid').modal('show');
    });

    $('#modal-create-rfid').on('shown.bs.modal', function() {
        $('#rfid-input').focus();
    });

    $('.btn-update').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var nisn = $(this).data('nisn');
        var religion_id = $(this).data('religion_id');
        var gender = $(this).data('gender');
        var birth_place = $(this).data('birth_place');
        var birth_date = $(this).data('birth_date');
        var nik = $(this).data('nik');
        var number_kk = $(this).data('number_kk');
        var number_akta = $(this).data('number_akta');
        var order_child = $(this).data('order_child');
        var count_siblings = $(this).data('count_siblings');
        var address = $(this).data('address');
        $('#name-edit').val(name);
        $('#email-edit').val(email);
        $('#nisn-edit').val(nisn);
        $('#birth_place-edit').val(birth_place);
        $('#birth_date-edit').val(birth_date);
        $('#nik-edit').val(nik);
        $('#number_kk-edit').val(number_kk);
        $('#number_akta-edit').val(number_akta);
        $('#order_child-edit').val(order_child);
        $('#count_siblings-edit').val(count_siblings);
        $('#address-edit').val(address);
        $('#religion-edit').val(religion_id).trigger('change');
        $('#gender-edit').val(gender).trigger('change');
        $('#form-update').attr('action', '/school/student/' + id);
        $('#modal-update-student').modal('show');
    });

    $('.btn-detail').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var nisn = $(this).data('nisn');
        var religion_id = $(this).data('religion_id');
        var gender = $(this).data('gender');
        var birth_place = $(this).data('birth_place');
        var birth_date = $(this).data('birth_date');
        var nik = $(this).data('nik');
        var number_kk = $(this).data('number_kk');
        var number_akta = $(this).data('number_akta');
        var order_child = $(this).data('order_child');
        var address = $(this).data('address');
        var rfid = $(this).data('rfid');
        var image = $(this).data('image');
        $('#name-detail').text(name);
        $('#email-detail').text(email);
        $('#nisn-detail').text(nisn);
        $('#birth_place-detail').text(birth_place);
        $('#birth_date-detail').text(birth_date);
        $('#nik-detail').text(nik);
        $('#number_kk-detail').text(number_kk);
        $('#number_akta-detail').text(number_akta);
        $('#order_child-detail').text(order_child);
        $('#address-detail').text(address);
        $('#gender-detail').text(gender);
        $('#rfid-detail').text(rfid);
        $('#image-detail').attr('src', image);
        $('#modal-detail-student').modal('show');
    });

    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/school/student/' + id);
        $('#modal-delete').modal('show');
    });
</script>

<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML =
                    `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 100%;">`;
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('imagePreview').innerHTML = '';
        }
    }

    function previewStudentImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('studentImagePreview');
                imagePreview.innerHTML =
                    `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 100%; height: auto;">`;
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('studentImagePreview').innerHTML = '';
        }
    }
</script>
