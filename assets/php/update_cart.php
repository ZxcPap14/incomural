<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; // ID товара
    $quantity = intval($_POST['quantity']); // Новое количество товара

    // Проверка на существование товара в корзине
    if (isset($_SESSION['cart'][$id])) {
        if ($quantity > 0) {
            // Обновляем количество
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        } else {
            // Если количество = 0, удаляем товар из корзины
            unset($_SESSION['cart'][$id]);
        }
    }

    // Генерируем обновленный HTML для корзины
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<p>Ваша корзина пуста.</p>";
    } else {
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $item) {
            $total += $item['price'] * $item['quantity'];
            ?>
            <div class="cart-item" data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>">
                <div>
                    <h5><?php echo $item['name']; ?></h5>
                    <p>Цена: <span class="item-price"><?php echo $item['price'] * $item['quantity']; ?> руб.</span></p>
                    <input type="number" class="quantity" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>">
                </div>
                <button class="remove-item btn btn-danger">Удалить</button>
            </div>
            <?php
        }
        ?>
        <p class="cart-total">Итого: <span id="total"><?php echo $total; ?></span> руб.</p>
        <?php
    }
}
?>
