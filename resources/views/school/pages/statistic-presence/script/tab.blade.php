<script>
    $(document).ready(function() {
    function resetActiveTab() {
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('active show');
    }

    function changeTab() {
        var activeTab = localStorage.getItem('activeTab');

        if (!activeTab) {
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

    $('.nav-link').on('shown.bs.tab', function() {
        storeActiveTab();
    });

    changeTab();
});

</script>