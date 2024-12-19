function showRegisterForm() {
    document.getElementById('registerForm').style.display = 'block';
    document.getElementById('loginForm').style.display = 'none';
}

function hideRegisterForm() {
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function () {
    const authButton = document.getElementById('authButton');
    const authModal = document.getElementById('authModal');

    authButton.addEventListener('click', function (e) {
        e.preventDefault();
        authModal.style.display = 'block';
    });

    window.addEventListener('load', function () {
        fetch('../assets/php/check-user.php')
            .then(response => response.text())
            .then(data => {
                console.log('Received data:', data); // Добавьте эту строку для отладки
                if (data === 'false') {
                    authButton.style.display = 'block';
                }
                else {
                    authButton.style.display = 'none';
                }
            });
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('log_out2').addEventListener('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            fetch('../assets/php/login_out.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(message => {
                    document.getElementById('log_out').textContent = message;
                });
                //document.location.reload();

        });
    });

    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        fetch('../assets/php/process-login.php', {
            method: 'POST',
            body: formData
        }) .then(response => {
            console.log('Ответ сервера:', response);
            
            // Проверка HTTP-статусов
            if (response.status === 200) {
                console.log('Статус OK');
            } else if (response.status === 401) {
                console.log('Неверный логин или пароль');
            }
            else if(response.status === 228){
                console.log('erwerwerwerwerwerwerwer');

            }
            
            // Обработка JSON-ответа
            response.json().then(data => {
                console.log('Данные ответа:', data);
                if (data.status === 'success') {
                    window.location.href = "admin_panel.php";
                } else {
                    document.getElementById('loginError').textContent = data.message;
                }
            });
        })
        .catch(error => {
            console.error('Произошла ошибка:', error);
        });
        
    
        document.location.reload();
    });

    document.getElementById('registerForm').addEventListener('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        fetch('../assets/php/process-register.php', {
            method: 'POST',
            body: formData
        })
        //document.location.reload();
    });

    // Закрытие модального окна
    document.querySelector('.close').addEventListener('click', function () {
        authModal.style.display = 'none';
    });

    // Закрытие модального окна при клике вне него
    window.addEventListener('click', function (event) {
        if (event.target === authModal) {
            authModal.style.display = 'none';
        }
    });
});

