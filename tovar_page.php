<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../assets\css\style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.svg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .radio_prikol div {
            display: flex;
        }
    </style>
    <style>
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
    <style>
        /* Стиль для алерта */
        .alert {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            font-size: 16px;
            border-radius: 5px;
            display: none;
            z-index: 9999;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            text-align: center;
        }

        /* Анимация появления и исчезновения */
        @keyframes slideDown {
            from {
                top: -100px;
                opacity: 0;
            }

            to {
                top: 0;
                opacity: 1;
            }
        }

        .alert.show {
            display: block;
            animation: slideDown 0.5s ease-out;
        }
    </style>
</head>

<body>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(99296430, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/99296430" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <?php include_once("assets/page/header/head.php"); ?>
    <?php
    include_once("assets/php/connect.php");
    $id = $_GET['id'];
    $table = $_GET['table_name'];
    $sql = "SELECT * FROM $table WHERE id = $id";
    $result = $connect->query($sql);
    $qqw;
    if ($result->num_rows > 0) {
        $fountain = $result->fetch_assoc();
    } else {
        echo "No data found";
    }
    $sqll = "SELECT * FROM dop_for_fountains WHERE id = 12";
    $resultt = $connect->query($sqll);
    $row = $resultt->fetch_assoc();
    ?>


    <div id="alert" class="alert">
        Товар успешно добавлен
    </div>
    <div class="container">
        <div class="image-section">
            <img src="<?php echo $fountain['img']; ?>" alt="Product Image">
        </div>
        <div class="details-section">
            <h1 class="product-title"><?php echo $fountain['Name']; ?></h1>
            <p id="pricesssss" style="display:none"><?php echo $fountain['Price']; ?></p>
            <p class="product-price"><span id="prices"></span>₽</p>
            <div class="addons">

                <?php if ($fountain['Сooling'] == 0) { ?>
                    <p>Дополнительные опции:</p>
                    <form id="registerForms2" method="POST">
                        <div class="radio_prikol">
                            <div>
                                <input name="dop[]" value="Уф стерилизатор" type="checkbox" id="UV_sterilizer"
                                    data-price="<?php echo $row['UV_sterilizer'] ?>">
                                <label for="UV_sterilizer">Уф стерилизатор (<?php echo $row['UV_sterilizer'] ?>
                                    руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Ограничительное кольцо" type="checkbox" id="Restriction_ring"
                                    data-price="<?php echo $row['Restriction_ring'] ?>">
                                <label for="Restriction_ring">Ограничительное кольцо
                                    (<?php echo $row['Restriction_ring'] ?> руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Педальный пуск" type="checkbox" id="Pedal_start"
                                    data-price="<?php echo $row['Pedal_start'] ?>">
                                <label for="Pedal_start">Педальный пуск (<?php echo $row['Pedal_start'] ?> руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Сенсорное управление" type="checkbox" id="Touch_control"
                                    data-price="<?php echo $row['Touch_control'] ?>">
                                <label for="Touch_control">Сенсорное управление (<?php echo $row['Touch_control'] ?>
                                    руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="Кран Гусак" type="checkbox" id="Crane_Gusak"
                                    data-price="<?php echo $row['Crane_Gusak'] ?>">
                                <label for="Crane_Gusak">Кран Гусак (<?php echo $row['Crane_Gusak'] ?> руб.)</label>
                            </div>
                            <div>
                                <input name="dop[]" value="3-х ступенчетая фильтраци" type="checkbox" id="filtration_system"
                                    data-price="<?php echo $row['filtration_system'] ?>">
                                <label for="Crane_Gusak">Трёхступенчатая система фильтрации
                                    (<?php echo $row['filtration_system'] ?> руб.)</label>
                            </div>
                            <?php if ($row['id'] == $fountain['id']) { ?>
                                <div>
                                    <input name="dop[]" value="Обратный осмос" type="checkbox" id="Reverse_Osmosis"
                                        data-price="<?php echo $row['Reverse_Osmosis'] ?>">
                                    <label for="Reverse_Osmosis">Обратный осмос (<?php echo $row['Reverse_Osmosis'] ?>
                                        руб.)</label>
                                </div>
                            <?php } ?>
                        </div>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="name" id="name" value="">
                        <input type="hidden" name="price" id="price" value="0">
                        <button class="buy-button" type="submit" onclick="showAlert()">Добавить в корзину</button>
                    </form>
                <?php } else { ?>
                    <form id="registerForms2" method="POST">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="name" id="name" value="">
                        <input type="hidden" name="price" id="price" value="0">
                        <input type="hidden" name="dop['<?php echo $row['filtration_system'] ?>']"
                            value="3-х ступенчетая фильтраци" id="filtration_system"
                            data-price="<?php echo $row['filtration_system'] ?>">
                        <button class="buy-button" onclick="showAlert()" type="submit">Добавить в корзину</button>
                    </form>
                <?php } ?>
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
    <div class="container" style="margin-top:15px">
        <?php if (isset($fountain) && !empty($fountain)): ?>
            <table>
                <td>Длина</td>
                <td><?php echo $fountain['gabarit_Length']; ?> мм</td>
                </tr>
                <tr>
                    <td>Ширина</td>
                    <td><?php echo $fountain['gabarit_Width']; ?> мм</td>
                </tr>
                <tr>
                    <td>Высота</td>
                    <td><?php echo $fountain['gabarit_Height']; ?> мм</td>
                </tr>
                <tr>
                    <td>Вес</td>
                    <td><?php echo $fountain['Weight']; ?> кг</td>
                </tr>
                <tr>
                    <td>Производительность</td>
                    <td><?php echo $fountain['Performance']; ?></td>
                </tr>
                <tr>
                    <td>Материал</td>
                    <td id="mater"><?php echo $fountain['material'] ?></td>
                </tr>


                <?php
                if ($fountain['Сooling'] == 1) {
                    $id = $_GET['id'];
                    $sqls = "SELECT * FROM `Fountains_coling_gaz` WHERE id = $id";
                    $results = $connect->query($sqls);
                    if ($results->num_rows > 0) {
                        while ($row = $results->fetch_assoc()) {
                            $fountains_coll[] = $row;
                        }
                    } else {
                        echo "No data found";
                    }

                    foreach ($fountains_coll as $zxc): ?>
                        <tr>
                            <td>Охлаждающая способность</td>
                            <td><?php echo $zxc['Cooling_capacity']; ?></td>
                        </tr>
                        <tr>
                            <td>Хладагент</td>
                            <td><?php echo $zxc['refrigerant']; ?></td>
                        </tr>
                        <tr>
                            <td>Содержание углекислого газа</td>
                            <td><?php echo $zxc['Carbon_dioxide_content']; ?></td>
                        </tr>
                        <tr>
                            <td>Источник питания</td>
                            <td><?php echo $zxc['Power_supply']; ?></td>
                        </tr>
                        <tr>
                            <td>Потребление энергии</td>
                            <td><?php echo $zxc['Power_consumption']; ?></td>
                        </tr>
                        <tr>
                            <td>Рабочая температура</td>
                            <td><?php echo $zxc['Operating_temperature']; ?></td>
                        </tr>
                        <tr>
                            <td>Температура охлажденной воды</td>
                            <td><?php echo $zxc['Chilled_water_temperature']; ?></td>
                        </tr>
                    <?php endforeach;
                }
                ?>
            </table>
        <?php endif; ?>
    </div>
    </tr>
    </table>






</body>

</html>