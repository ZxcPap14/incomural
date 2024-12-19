document.getElementById('remove').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    fetch('../assets/php/remove_from_cart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => console.log('Ответ сервера:', data))
    .catch(error => console.error('Ошибка:', error));
});
