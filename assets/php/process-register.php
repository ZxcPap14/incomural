<?php
session_start();
include_once("../php/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $password = $_POST["password"];
  $email = $_POST["email"]; 

  // Проверяем, существует ли уже пользователь с таким email
  $queryCheck = "SELECT * FROM Users WHERE mail = '$email'";
  $result = mysqli_query($connect, $queryCheck);
  
  if (mysqli_num_rows($result) > 0) {
    header("Location:" . $_SERVER['REQUEST_URI']); 
    exit;
  } else {
    // Если почты нет, добавляем нового пользователя
    $queryInsert = "INSERT INTO Users (login, password, mail, role) VALUES (?, ?, ?, 'user')";
    if ($stmt = mysqli_prepare($connect, $queryInsert)) {
      mysqli_stmt_bind_param($stmt, "sss", $login, $password, $email);
      if (mysqli_stmt_execute($stmt)) {
        echo "mamy ebal";
      } else {
        echo "Ошибка при добавлении пользователя: " . mysqli_error($connect);
      }
      mysqli_stmt_close($stmt);
    } else {
      echo "Ошибка подготовки запроса";
    }
  }
}
mysqli_close($connect);
?>
