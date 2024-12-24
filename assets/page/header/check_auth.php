<?php

session_start();
// Функция для вывода формы авторизации/регистрации
function showAuthForm($isRegister = false)
{
    echo '
    <script src="assets\js\script_log-reg.js"></script>

  <div class="modal" id="authModal">
    <div class="modal-content">
    <form action="" method="post" id="loginForm">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="submit" name="login" value="Войти">
    <a href="#" onclick="showRegisterForm()">Регистрация</a>
    </form>

    <form id="registerForm" style="display: none;">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="email" name="email" placeholder="Почта">
    <input type="submit" name="register" value="Зарегистрироваться">
    <a href="#" onclick="hideRegisterForm()">Назад</a>
    </form>
    <span class="close">Назад;</span>
    </div>
  </div>
  <div id ="registerMessage"> </div>
  ';
}

// Вывод формы авторизации/регистрации
if (isset($_SESSION["login"])) {
  
    echo "Привет, " . $_SESSION["login"];
    echo '
  <div id="log_out">
    <form  method="post" id="log_out2">
          <input type="submit" value="Выйти">
    </form>
  </div>
  
  <script src="assets/js/logout-script.js"></script>
  ';
} else {
  
    showAuthForm();
}

?>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>


<button id="authButton" style="display: none;">Войти</button>