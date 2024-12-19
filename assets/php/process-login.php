<?php
session_start();

include_once("../php/connect.php");


if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $password = $_POST["password"];
  
  $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
  $query2 = "SELECT * FROM users WHERE login = '$login' AND password = '$password' AND role = 'root'";

  $result = mysqli_query($connect, $query);
  $result2 = mysqli_query($connect, $query2);

  
  if (mysqli_num_rows($result) > 0) {
    $_SESSION["login"] = $login;
    if(mysqli_num_rows($result2) > 0){
      http_response_code(228);
      header("Content-Type: application/json");
      echo json_encode(array('status' => 'success', 'message' => 'Авторизация успешна'));
    }
  } else {
    header("Location:" . $_SERVER['REQUEST_URI']); 
    exit;
  }
}

mysqli_close($connect);
?>
