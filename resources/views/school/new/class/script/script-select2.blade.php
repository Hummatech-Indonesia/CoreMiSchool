
<script>
    $(document).ready(function() {
        $('.select2-walikelas').select2({
            dropdownParent: $('#update-class')
        });
        // Function to initialize Select2 on dynamically added elements
        function initSelect2() {
            $('.select2-wali-kelas').select2({
                dropdownParent: $('.email-repeater')
            });
        }

        initSelect2();

        $('.email-repeater').repeater({
            // Reinitialize Select2 on added items
            show: function() {
                console.log('Show function called'); // Debugging line
                $(this).slideDown();
                initSelect2();
            },
            hide: function(deleteElement) {
                console.log('Hide function called'); // Debugging line
                $(this).slideUp(deleteElement);
            }
        });

        // If you need to remove initial repeater items
        $('[data-repeater-item]').not(':first').remove();
    });
</script>
