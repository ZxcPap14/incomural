<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incom_ural_bd";
$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die('Ошибка соединения: ' . mysqli_connect_error());
}
  // Получаем данные из формы
  $article = $_POST['article'];
  $floor_type = $_POST['floor_type'];
  $compressor_type = $_POST['compressor_type'];
  $large_performance = $_POST['large_performance'];
  $high_performance = $_POST['high_performance'];
  $cups_hot_water = $_POST['cups_hot_water'];
  $cups_cold_water = $_POST['cups_cold_water'];
  $separate_hot_water_tank = $_POST['separate_hot_water_tank'];
  $cold_water_separate_tank = $_POST['cold_water_separate_tank'];
  $hot_water_tank = $_POST['hot_water_tank'];
  $hot_water_bucket = $_POST['hot_water_bucket'];
  $performance_hot_water = $_POST['performance_hot_water'];
  $performance_cold_water = $_POST['performance_cold_water'];
  $heating_cooling_power = $_POST['heating_cooling_power'];
  $cooling_power = $_POST['cooling_power'];
  $filtration_system = $_POST['filtration_system'];
  $filter_type = $_POST['filter_type'];
  $filter_size = $_POST['filter_size'];
  $body_color = $_POST['body_color'];
  $insert_color = $_POST['insert_color'];
  $tap_type = $_POST['tap_type'];
  $hot_water_protection = $_POST['hot_water_protection'];
  $voltage = $_POST['voltage'];
  $warranty_period = $_POST['warranty_period'];
  $country_of_origin = $_POST['country_of_origin'];
  $dimensions_without_package = $_POST['dimensions_without_package'];
  $dimensions_in_package = $_POST['dimensions_in_package'];
  $volume = $_POST['volume'];
  $created_at = $_POST['created_at'];

  // Обработка изображения
    $img = $_FILES['img']['name'];
    $img_full_path = "assets/img/img_tovar/" . $img;
    // Проверяем, если чекбокс "Охлаждение" выбраZн
    $uploaddir = '../img/img_tovar/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);

    echo '<pre>';
    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
        echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
    } else {
        echo "Возможная атака на сервер через загрузку файла!\n";
    }
  // Вставляем данные в таблицу Purifiers
  $sql1 = "INSERT INTO Purifayer_all (
      article, 
      floor_type, 
      compressor_type, 
      large_performance, 
      high_performance, 
      cups_hot_water, 
      cups_cold_water, 
      separate_hot_water_tank, 
      cold_water_separate_tank, 
      hot_water_tank, 
      hot_water_bucket, 
      performance_hot_water, 
      performance_cold_water, 
      heating_cooling_power, 
      cooling_power, 
      filtration_system, 
      filter_type, 
      filter_size, 
      body_color, 
      insert_color, 
      tap_type, 
      hot_water_protection, 
      voltage, 
      warranty_period, 
      country_of_origin, 
      dimensions_without_package, 
      dimensions_in_package, 
      volume, 
      created_at, 
      img
  ) VALUES (
      '$article', 
      '$floor_type', 
      '$compressor_type', 
      '$large_performance', 
      '$high_performance', 
      '$cups_hot_water', 
      '$cups_cold_water', 
      '$separate_hot_water_tank', 
      '$cold_water_separate_tank', 
      '$hot_water_tank', 
      '$hot_water_bucket', 
      '$performance_hot_water', 
      '$performance_cold_water', 
      '$heating_cooling_power', 
      '$cooling_power', 
      '$filtration_system', 
      '$filter_type', 
      '$filter_size', 
      '$body_color', 
      '$insert_color', 
      '$tap_type', 
      '$hot_water_protection', 
      '$voltage', 
      '$warranty_period', 
      '$country_of_origin', 
      '$dimensions_without_package', 
      '$dimensions_in_package', 
      '$volume', 
      '$created_at', 
      '$img_full_path'
  )";

  if ($connect->query($sql1) === TRUE) {
      echo "Пурифайер успешно добавлен!";
  } else {
      echo "Ошибка при добавлении пурифайера: " . $connect->error;
  }
  $connect->close();

?>