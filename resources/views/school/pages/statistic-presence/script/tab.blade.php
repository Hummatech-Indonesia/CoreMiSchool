<script>
    $(document).ready(function() {
    function resetActiveTab() {
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('active show');
    }

    function changeTab() {
        var activeTab = localStorage.getItem('activeTab');

        if (!activeTab) {
            // Set the default tab if no tab is stored in localStorage
            activeTab = '#pills-keseluruhan';
        }

        resetActiveTab();
        var tab = $('a[href="' + activeTab + '"]');
        tab.addClass('active');
        $(activeTab).addClass('active show');
    }

    function storeActiveTab() {
        var activeTab = $('.nav-link.active').attr('href');
        localStorage.setItem('activeTab', activeTab);
    }

    // Event listener for tab changes
    $('.nav-link').on('shown.bs.tab', function() {
        storeActiveTab();
    });

    // Activate the stored tab on page load
    changeTab();
});

</script>