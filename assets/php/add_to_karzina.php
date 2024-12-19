<?php
session_start();
header('Content-Type: application/json');
// Получаем данные из формы

$name = $_POST['name'];
$price = $_POST['price'];
$dopi = isset($_POST['dop']) ? $_POST['dop'] : []; // Массив допов или пустой массив
// Пример данных для ответа

// Проверяем и добавляем товар в сессию
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Проверяем, есть ли уже этот товар
$existingItem = null;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] == $id && $dopi == $item['dop']) {
        $existingItem = $item;
        $item['quantity'] +=1;
        break;
    }
}

if ($existingItem === null) {
    // Добавляем новый товар с допами
    $_SESSION['cart'][] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => 1,
        'dop' => $dopi // Сохраняем допы
    ];
    echo json_encode(['success' => true, 'message' => $name]);
} else {
    echo json_encode(['success' => false, 'message' => $name]);
}

// Вывод количества товаров в корзине?>