<!DOCTYPE html>
<html lang="en">

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
</head>
<body>
    <body>
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
        if ($fountain['Сooling'] == 0) {
            ?>
            <form id="registerForms2" method="POST">
                <div class="radio_prikol">
                    <div>
                        <input name="dop[]" value="Уф стерилизатор" type="checkbox" id="UV_sterilizer"
                            data-price="<?php echo $row['UV_sterilizer'] ?>">
                        <label for="UV_sterilizer">Уф стерилизатор (<?php echo $row['UV_sterilizer'] ?> руб.)</label>
                    </div>
                    <div>
                        <input name="dop[]" value="Ограничительное кольцо" type="checkbox" id="Restriction_ring"
                            data-price="<?php echo $row['Restriction_ring'] ?>">
                        <label for="Restriction_ring">Ограничительное кольцо (<?php echo $row['Restriction_ring'] ?>
                            руб.)</label>
                    </div>
                    <div>
                        <input name="dop[]" value="Педальный пуск" type="checkbox" id="Pedal_start"
                            data-price="<?php echo $row['Pedal_start'] ?>">
                        <label for="Pedal_start">Педальный пуск (<?php echo $row['Pedal_start'] ?> руб.)</label>
                    </div>
                    <div>
                        <input name="dop[]" value="Сенсорное управление" type="checkbox" id="Touch_control"
                            data-price="<?php echo $row['Touch_control'] ?>">
                        <label for="Touch_control">Сенсорное управление (<?php echo $row['Touch_control'] ?> руб.)</label>
                    </div>
                    <div>
                        <input name="dop[]" value="Кран Гусак" type="checkbox" id="Crane_Gusak"
                            data-price="<?php echo $row['Crane_Gusak'] ?>">
                        <label for="Crane_Gusak">Кран Гусак (<?php echo $row['Crane_Gusak'] ?> руб.)</label>
                    </div>
                    <div>
                        <input name="dop[]" value="3-х ступенчетая фильтраци" type="checkbox" id="filtration_system"
                            data-price="<?php echo $row['filtration_system'] ?>">
                        <label for="Crane_Gusak">Трёхступенчатая система фильтрации (<?php echo $row['filtration_system'] ?>
                            руб.)</label>
                    </div>
                    <?php
                    if ($row['id'] == $fountain['id']) {
                        ?>
                        <div>
                            <input name="dop[]" value="Обратный осмос" type="checkbox" id="filtration_system"
                                data-price="<?php echo $row['Reverse_Osmosis'] ?>">
                            <label for="Crane_Gusak">Обратный осмос (<?php echo $row['Reverse_Osmosis'] ?> руб.)</label>
                        </div>
                    <?php } ?>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="name" id="name" value="">
                <input type="hidden" name="price" id="price" value="0">
                <button type="submit">Добавить в корзину</button>
            </form>
        <?php } else { ?>
            <form id="registerForms2" method="POST">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="name" id="name" value="">
                <input type="hidden" name="price" id="price" value="0">
                <input type="hidden" name="dop['<?php echo $row['filtration_system'] ?>']"
                    value="3-х ступенчетая фильтраци" id="filtration_system"
                    data-price="<?php echo $row['filtration_system'] ?>">
                <button type="submit">Добавить в корзину</button>
            </form>
        <?php } ?>
        <div class="total-price">Итоговая цена: <span id="prices">0</span> руб.</div>
        <script src="assets\js\karzina2.js"></script>
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
        <?php if (isset($fountain) && !empty($fountain)): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Длина</th>
                    <th>Ширина</th>
                    <th>Высота</th>
                    <th>Вес</th>
                    <th>Фильтр</th>
                    <th>Производительность</th>
                    <th>Материал</th>
                    <th>Изображение</th>
                    <?php
                    if ($fountain['Сooling'] == 1) { ?>
                        <th>Изображение</th>
                        <th>Изображение</th>
                        <th>Изображение</th>
                        <th>Изображение</th>
                        <th>Изображение</th>
                        <th>Изображение</th>
                        <th>Изображение</th>
                        <?php
                    }
                    ?>
                </tr>
                <td id="idd"><?php echo $fountain['id']; ?></td>
                <td id="namee"><?php echo $fountain['Name']; ?></td>
                <td id="pricesssss"><?php echo isset($fountain['Price']) ? $fountain['Price'] : 0; ?> руб.</td>
                <td><?php echo $fountain['gabarit_Length']; ?> м</td>
                <td><?php echo $fountain['gabarit_Width']; ?> м</td>
                <td><?php echo $fountain['gabarit_Height']; ?> м</td>
                <td><?php echo $fountain['Weight']; ?> кг</td>
                <td><?php echo $fountain['Filter']; ?></td>
                <td><?php echo $fountain['Performance']; ?></td>
                <td id="mater"><?php echo $fountain['material'] ?></td>
                <td><img src="<?php echo $fountain['img']; ?>" alt="Изображение фонтана"></td>
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
                    foreach ($fountains_coll as $zxc):
                        ?>
                        <td><?php echo $zxc['Cooling_capacity']; ?></td>
                        <td><?php echo $zxc['refrigerant']; ?></td>
                        <td><?php echo $zxc['Carbon_dioxide_content']; ?></td>
                        <td><?php echo $zxc['Power_supply']; ?></td>
                        <td><?php echo $zxc['Power_consumption']; ?></td>
                        <td><?php echo $zxc['Operating_temperature']; ?></td>
                        <td><?php echo $zxc['Chilled_water_temperature']; ?></td>
                        <?php
                    endforeach;
                }
                ?>
                </tr>
                <?php ?>
            </table>
        <?php else: ?>
            <p>Нет данных о фонтанах.</p>
        <?php endif; ?>
    </body>
</body>

</html>