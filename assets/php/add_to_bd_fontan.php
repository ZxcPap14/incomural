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
        $name = $_POST['Name'];
        $price = $_POST['Price'];
        $length = $_POST['Length'];
        $width = $_POST['Width'];
        $height = $_POST['Height'];
        $weight = $_POST['Weight'];
        $filter = $_POST['Filter'];
        $performance = $_POST['Performance'];
        $img = $_FILES['img_path']['name'];
        $img_full_path = "assets/img/img_tovar/" . $img;
        // Проверяем, если чекбокс "Охлаждение" выбраZн
        $uploaddir = '../img/img_tovar/';
        $uploadfile = $uploaddir . basename($_FILES['img_path']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['img_path']['tmp_name'], $uploadfile)) {
            echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
        } else {
            echo "Возможная атака на сервер через загрузку файла!\n";
        }

        echo 'Дополнительная отладочная информация:';
        print_r($_FILES);

        print "</pre>";
        $cooling = isset($_POST['CoolingCheck']) ? '1' : '0';

        // Если охлаждение выбрано, получаем дополнительные данные
        if ($cooling === '1') {
            $cooling_capacity = $_POST['Cooling_capacity'];
            $refrigerant = $_POST['Refrigerant'];
            $carbon_dioxide_content = $_POST['Carbon_dioxide_content'];
            $power_supply = $_POST['Power_supply'];
            $power_consumption = $_POST['Power_consumption'];
            $operating_temperature = $_POST['Operating_temperature'];
            $chilled_water_temperature = $_POST['Chilled_water_temperature'];
        } else {
            $cooling_capacity = $refrigerant = $carbon_dioxide_content = $power_supply = $power_consumption = $operating_temperature = $chilled_water_temperature = '';
        }

        // Вставляем данные в таблицу Fountains
        $sql1 = "INSERT INTO Fountains (Name, Price, gabarit_Length, gabarit_Width, gabarit_Height, Weight, Filter, Performance, Сooling, img)
VALUES ('$name', '$price', '$length', '$width', '$height', '$weight', '$filter', '$performance', '$cooling', '$img_full_path')";

        if ($connect->query($sql1) === TRUE) {
            $fountain_id = $connect->insert_id; // Получаем ID только что добавленной записи

            // Вставляем данные в таблицу Fountains_coling_gaz, если охлаждение выбрано
            if ($cooling === '1') {
                $sql2 = "INSERT INTO Fountains_coling_gaz (id, Cooling_capacity, refrigerant, Carbon_dioxide_content, Power_supply, Power_consumption, Operating_temperature, Chilled_water_temperature)
        VALUES ('$fountain_id', '$cooling_capacity', '$refrigerant', '$carbon_dioxide_content', '$power_supply', '$power_consumption', '$operating_temperature', '$chilled_water_temperature')";

                if ($connect->query($sql2) === TRUE) {
                    echo "Данные успешно добавлены!";
                } else {
                    echo "Ошибка при добавлении данных в Fountains_coling_gaz: " . $connect->error;
                }
            } else {
                echo "Данные успешно добавлены!";
            }
        } else {
            echo "Ошибка при добавлении данных в Fountains: " . $connect->error;
        }

        $connect->close();


?>