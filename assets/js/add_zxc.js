document.getElementById('add_fontain').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    fetch('../assets/php/add_to_bd_fontan.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => console.log('Ответ сервера:', data))
    .catch(error => console.error('Ошибка:', error));
});
document.getElementById('add_porifire').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    fetch('../assets/php/add_to_bd_pyrifire.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => console.log('Ответ сервера:', data))
    .catch(error => console.error('Ошибка:', error));
});
