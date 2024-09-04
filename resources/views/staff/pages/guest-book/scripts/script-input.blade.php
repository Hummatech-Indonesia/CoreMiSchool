<script>
    document.getElementById('status').addEventListener('change', function() {
        var instansiContainer = document.getElementById('instansi-container');
        if (this.value === 'negeri' || this.value === 'swasta') {
            instansiContainer.style.display = 'block';
        } else {
            instansiContainer.style.display = 'none';
        }
    });
</script>
