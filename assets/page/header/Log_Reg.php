<div>


<div id="zxctest_auth">
    <button id="openAuthModal" class="btn btn-primary">Войти</button>
    <div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Авторизация</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="text" placeholder="Логин" Name ="Login_form">
                        <input type="text" placeholder="Пароль" Name="Password_form">
                        <div>
                        <button type="submit" name="login_submit" data-bs-dismiss="modal">Войти</button>
                            <input type="button" value="Регистрация" id="Reg_form" data-bs-dismiss="modal">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="authModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Регистрация</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="text" placeholder="Логин" Name="Login_form">
                        <input type="text" placeholder="Пароль" Name="Password_form">
                        <input type="text" placeholder="Почта" Name="Mail_form">
                        <div>
                            <button type="submit" name="auth_submit" data-bs-dismiss="modal">Регистрация</button>
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <P>
    <?php
session_start();

// Функция для генерации хеш-токена
function generateToken($userId) {
    $token = bin2hex(random_bytes(32));
    return hash('sha256', $token . $userId);
}

// Функция для проверки и установки аутентификации
function checkAndSetAuthentication($llog, $parol) {
    global $connect;
    
    // Проверка учетных данных
    $sql = "SELECT * FROM Users WHERE login = ? AND password = ?";
    $stmt = mysqli_prepare($connect, $sql);
    
    if (!$stmt) {
        echo "Ошибка подготовки запроса: " . mysqli_error($connect);
        return false;
    }
    
    if (!mysqli_stmt_bind_param($stmt, "ss", $llog, $parol)) {
        echo "Ошибка биндинга параметров: " . mysqli_error($connect);
        return false;
    }
    
    if (!mysqli_stmt_execute($stmt)) {
        echo "Ошибка выполнения запроса: " . mysqli_error($connect);
        return false;
    }
    
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Получаем ID пользователя
        $userId = mysqli_fetch_assoc($result)['id'];
        
        // Генерируем токен
        $token = generateToken($userId);
        
        // Сохраняем токен в базу данных
        $sql = "INSERT INTO remember_tokens (user_id, token) VALUES (?, ?)";
        $stmt2 = mysqli_prepare($connect, $sql);
        
        if (!$stmt2) {
            echo "Ошибка подготовки запроса для сохранения токена: " . mysqli_error($connect);
            return false;
        }
        
        if (!mysqli_stmt_bind_param($stmt2, "is", $userId, $token)) {
            echo "Ошибка биндинга параметров для сохранения токена: " . mysqli_error($connect);
            return false;
        }
        
        if (!mysqli_stmt_execute($stmt2)) {
            echo "Ошибка выполнения запроса для сохранения токена: " . mysqli_error($connect);
            return false;
        }
        
        // Устанавливаем сессию
        $_SESSION['user_id'] = $llog;
        $_SESSION['last_login'] = time();
        
        // Устанавливаем куки для "помнить меня"
        setcookie('remember_me', $token, time() + 604800, '/', '', true, true);
        
    } else {
        // Отображение сообщения об ошибке
        echo "<script>alert('Неверный логин или пароль');</script>";
    }
    
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
}

// Обработка формы авторизации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login_submit'])) {
        $llog = $_POST["Login_form"];
        $parol = $_POST["Password_form"];
        
        checkAndSetAuthentication($llog, $parol);
    }

    // Обработка регистрации
    elseif (isset($_POST['auth_submit'])) {
        $llog = $_POST["Login_form"];
        $parol = $_POST["Password_form"];
        $mail = $_POST["Mail_form"];

        $sql = mysqli_query($connect, "INSERT INTO `Users` (`login`, `password`, `mail`, `role`) VALUES ('$llog', '$parol','$mail','user')");
        
        $_SESSION['form_data'] = $_POST;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
                 
    </P>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById('openAuthModal').addEventListener('click', function () {
                const modal = new bootstrap.Modal(document.getElementById('authModal'));
                modal.show();
            });
            document.getElementById('Reg_form').addEventListener('click', function () {
                const modal = new bootstrap.Modal(document.getElementById('authModal2'));
                modal.show();
            });
        </script>