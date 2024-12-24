<?php
session_start();
include_once("connect.php");

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $password = $_POST["password"];
  
  $query = "SELECT * FROM Users WHERE login = '$login' AND password = '$password'";
  $query2 = "SELECT * FROM Users WHERE login = '$login' AND password = '$password' AND role = 'root'";
  $result = mysqli_query($connect, $query);
  $result2 = mysqli_query($connect, $query2);
  
  if (mysqli_num_rows($result) > 0) {
    $_SESSION["login"] = $login;
     http_response_code(202);
    if(mysqli_num_rows($result2) > 0){
      http_response_code(228);
     
      echo json_encode(array('status' => 'success', 'message' => 'admin'));
    }
    else{
         http_response_code(228);
    }
  } else {
    header("Location:" . $_SERVER['REQUEST_URI']); 
    http_response_code(401);
    exit;
  }
}

mysqli_close($connect);
?>
