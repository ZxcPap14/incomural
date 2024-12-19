<?php
session_start();
unset($_SESSION['login']); // или $_SESSION = array() для очистки всех данных сессии
session_destroy();
header("Refresh: 1");
?>