<?php
// Подключаем файл подключения
include_once("assets/php/connect.php");

// Проверяем, если есть запрос
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $searchQuery = mysqli_real_escape_string($connect, $searchQuery);  // Экранирование для безопасности

    // SQL запрос для поиска в таблице Fountains
    $sqlFountains = "SELECT * FROM Fountains WHERE Name LIKE '%$searchQuery%' OR Filter LIKE '%$searchQuery%' LIMIT 5";
    $resultFountains = mysqli_query($connect, $sqlFountains);

    // SQL запрос для поиска в таблице Purifayer_all
    $sqlPurifayer = "SELECT * FROM Purifayer_all WHERE Name LIKE '%$searchQuery%' OR article LIKE '%$searchQuery%' LIMIT 5";
    $resultPurifayer = mysqli_query($connect, $sqlPurifayer);

    // Выводим результаты для Fountains
    if (mysqli_num_rows($resultFountains) > 0) {
        while ($product = mysqli_fetch_assoc($resultFountains)) {
            echo "<li onclick='selectItem(this)'>" . htmlspecialchars($product['Name']) . " - " . htmlspecialchars($product['Price']) . " руб.</li>";
        }
    }

    // Выводим результаты для Purifayer_all
    if (mysqli_num_rows($resultPurifayer) > 0) {
        while ($product = mysqli_fetch_assoc($resultPurifayer)) {
            echo "<li onclick='selectItem(this)'>" . htmlspecialchars($product['Name']) . " - " . htmlspecialchars($product['price']) . " руб.</li>";
        }
    }

    // Если ничего не найдено
    if (mysqli_num_rows($resultFountains) == 0 && mysqli_num_rows($resultPurifayer) == 0) {
        echo "<li>Ничего не найдено</li>";
    }
} else {
    echo "<li>Введите запрос для поиска</li>";
}
?>