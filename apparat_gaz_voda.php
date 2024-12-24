<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Газ</title>
</head>
<style>
    .radio_prikol div {
            display: flex;
        }
        table {
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            font-weight: bold;
        }

        td {
            text-align: right;
        }

        td:first-child {
            text-align: left;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #212529;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .image-section {
            flex: 1;
            max-width: 40%;
            text-align: center;
        }

        .image-section img {
            width: 100%;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .image-section img:hover {
            transform: scale(1.05);
        }

        .details-section {
            flex: 1;
            max-width: 55%;
        }

        .product-title {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #343a40;
        }

        .product-meta {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 1.8rem;
            color: #28a745;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .addons {
            margin-bottom: 25px;
        }

        .addons p {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .addons label {
            display: block;
            margin-bottom: 10px;
            font-size: 1rem;
            cursor: pointer;
            color: #495057;
        }

        .addons input {
            margin-right: 10px;
        }

        .buy-button {
            padding: 15px 25px;
            font-size: 1.2rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.2s;
        }

        .buy-button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }
    </style>
<body>

    <?php
    include_once("assets/php/connect.php"); ?>
    <div class="container">
        <div class="image-section">
            <img src="assets\img\gaz_voda\gaz_voda1.jpg" alt="Product Image">
        </div>
        <div class="details-section">
            <h1 class="product-title">Аппарат газ - воды</h1>
            <p id="pricesssss" style="display:none">200000</p>
            <p class="product-price"><span id="prices"></span>₽</p>
            <div class="addons">

               
                    <p>Дополнительные опции:</p>
                    <form id="registerForms2" method="POST">
                        <div class="radio_prikol">
                            <div>
                                <input name="dop[]" value="Горячяа вода" type="checkbox" id="UV_sterilizer"
                                    data-price="10000">
                                <label for="UV_sterilizer">Горячяа вода ( руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Холодная вода" type="checkbox" id="Restriction_ring"
                                    data-price="10000">
                                <label for="Restriction_ring">Холодная вода ( руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Сироп" type="checkbox" id="Pedal_start"
                                    data-price="15000">
                                <label for="Pedal_start">Сироп ( руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Подсоления вода" type="checkbox" id="Touch_control"
                                    data-price="150000">
                                <label for="Touch_control">Подсоления вода ( руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Газирования вода" type="checkbox" id="Crane_Gusak"
                                    data-price="20000">
                                <label for="Crane_Gusak">Газирования вода ( руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Стаканомойка" type="checkbox" id="filtration_system"
                                    data-price="10000">
                                <label for="Crane_Gusak">Стаканомойка (руб.)</label>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="name" id="name" value="">
                        <input type="hidden" name="price" id="price" value="0">
                        <button class="buy-button" type="submit" onclick="showAlert()">Добавить в корзину</button>
                    </form>
            </div>
        </div>
        <script src="assets\js\karzina2.js"></script>
        <script>
            // Функция для отображения алерта
            function showAlert() {
                const alertBox = document.getElementById('alert');
                alertBox.classList.add('show');

                // Автоматическое скрытие алерта через 3 секунды
                setTimeout(function () {
                    alertBox.classList.remove('show');
                }, 3000);
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const checkboxes = document.querySelectorAll('.radio_prikol input[type="checkbox"]');
                const priceOutput = document.getElementById('prices');
                const tablePriceOutput = document.getElementById('pricesssss');
                const hiddenPriceInput = document.getElementById('price');
                if (!priceOutput || !tablePriceOutput) {
                    console.error("Элементы для обновления цены не найдены в DOM.");
                    return;
                }
                function updatePrice() {
                    let totalPrice = 0;
                    checkboxes.forEach((checkbox) => {
                        if (checkbox.checked) {
                            totalPrice += parseInt(checkbox.dataset.price, 10);
                        }
                    });
                    hiddenPriceInput.value = totalPrice + parseInt(tablePriceOutput.textContent);
                    priceOutput.textContent = totalPrice + parseInt(tablePriceOutput.textContent);
                }
                window.addEventListener("load", (event) => {
                    updatePrice();
                    document.getElementById("id").value = document.getElementById("idd").textContent;
                    document.getElementById("name").value = document.getElementById("namee").textContent + " ( " + document.getElementById("mater").textContent + " ) ";
                });
                checkboxes.forEach((checkbox) => {
                    checkbox.addEventListener('change', updatePrice);
                });
            });
        </script>
    </div>



    
</body>

</html>