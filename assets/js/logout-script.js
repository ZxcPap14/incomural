document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('log_out2').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        fetch('../assets/php/login_out.php', {
            method: 'POST',
            body: formData
        });
        document.location.reload();
    });
});
