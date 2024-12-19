
    var formData = new FormData(this);
    fetch('../assets/php/process-login.php', {
        method: 'POST',
        body: formData
    })
