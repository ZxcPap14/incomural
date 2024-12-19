document.getElementById('registerForms').addEventListener('submit', function (e) {

    e.preventDefault(); // Предотвращаем стандартную отправку формы

    // Создаем объект FormData из формы
    var formData = new FormData(this);

    // Отправляем запрос на сервер
    fetch('../php/add_to_karzina.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message); // Успешное сообщение
        } else {
            alert(data.message); // Ошибка
        }
        console.log(data); // Для отладки
    })
    .catch(error => console.error('Ошибка:', error));
});
