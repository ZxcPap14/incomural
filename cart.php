<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../assets\css\style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.svg">
    <title>Корзина</title>
    <style>
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            border-bottom: 1px solid #ccc;
            padding: 10px;
        }

        .cart-item img {
            width: 70px;
        }

        .cart-item h5 {
            margin: 0;
        }

        .cart-total {
            font-weight: bold;
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Корзина</h1>

        <?php
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<p>Ваша корзина пуста.</p>";
        } else {
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $item) {
                $total++;
                ?>
                <div class="cart-item" data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>">
                    <div>
                        <h5><?php echo $item['name']; ?></h5>
                        <p>Цена: <span class="item-price"><?php echo $item['price']; ?> руб.</span></p>
                        <input type="number" class="quantity" name="quantity" value="<?php echo $item['quantity']; ?>" min="1"
                            data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>">
                        <?php 
                        foreach ($item['dop'] as $id => $itemm) {
                            ?>  
                            <p><?php echo $itemm; ?></p>
                        <?php }
                        ?>    
                    </div>
                    <button id="remove" class="remove-item btn btn-danger">Удалить</button>
                </div>
                <?php
            }
            ?>
            <p class="cart-total" >Итого: <p id="total"></p> руб.</p>
            <a href="assets\php\checkout.php" class="btn btn-success">Оформить заказ</a>
            <?php
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets\js\update_cart.js"></script>
    <script>
        window.addEventListener('load', () => {
            updateTotal();
        });
        function updateTotal() {
            let total = 0;

            // Перебираем все товары в корзине и считаем общую стоимость
            $(".cart-item").each(function () {
                const quantity = $(this).find(".quantity").val();
                const price = $(this).data("price");
                total += quantity * price;
            });
            console.log(total);
            // Обновляем итоговую стоимость
            document.getElementById('total').innerHTML = total;
            $(".cart-total #total").text(total.toFixed(2));
        }
        $(document).ready(function () {
            // Обработчик изменения значения количества товара
            $(".quantity").on("change", function () {
                const quantity = $(this).val(); // Получаем новое значение
                const id = $(this).data("id"); // Получаем ID товара

                // AJAX-запрос для обновления количества
                $.ajax({
                    url: "../assets/php/update_cart.php", // Путь к обработчику на сервере
                    method: "POST",
                    data: { id: id, quantity: quantity },
                    success: function (response) {
                        updateTotal();
                        console.log("zxc");
                        document.getElementById
                    },
                    error: function () {
                        alert("Ошибка обновления корзины. Попробуйте снова.");
                    }
                });
            });
        });
    </script>
</script>
</body>

</html>