<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets\css\style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.svg">
    <title>Инженергная компания</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    </style>
    <style>
        
    </style>
</head>

<body>
    <?php include_once("assets/page/header/head.php"); ?>
    <div class="center_admin">
        <div class="left_admin">
            <p>Добавть</p>
            <button id="toggleButton">Пурифаер</button>
            <button id="toggleButton2">Фонтанчик</button>
        </div>
        <div class="right_admin">
            <div id="fontain">
                <form id="add_fontain" method="POST">
                    <input type="text" name="Name" placeholder="Название" required>
                    <input type="text" id="Price" name="Price" placeholder="Цена" required>
                    <input type="text" name="Length" placeholder="Длинна (мм)" required>
                    <input type="text" name="Width" placeholder="Ширина (мм)" required>
                    <input type="text" name="Height" placeholder="Высота (мм)" required>
                    <input type="text" name="Weight" placeholder="Вес (кг)" required>
                    <input type="text" name="Filter" placeholder="Фильтрация" required>
                    <input type="text" name="Performance" placeholder="Производительность" required>
                    <input type="file" name="img_path" placeholder="фото" required>

                    <div>
                        <input type="checkbox" id="toggleCheckbox" name="CoolingCheck">
                        <p>Охлаждение</p>
                    </div>

                    <div id="inputsContainer" class="hidden">
                        <input type="text" name="Cooling_capacity" placeholder="Хладопроизводительность">
                        <input type="text" name="Refrigerant" placeholder="Хладогент">
                        <input type="text" name="Carbon_dioxide_content" placeholder="Содержание двуокиси углерода">
                        <input type="text" name="Power_supply" placeholder="Питание">
                        <input type="text" name="Power_consumption" placeholder="Потребляемая мощность">
                        <input type="text" name="Operating_temperature" placeholder="Рабочая температура">
                        <input type="text" name="Chilled_water_temperature" placeholder="Температура охлажденной воды">
                    </div>

                    <input type="submit" name="submit_form" value="Добавить фонтан">
                </form>

            </div>
            <div id="Purifayer">
                <form id="add_porifire" method="POST">
                    <input type="text" name="article" placeholder="Артикул" required>
                    <input type="number" name="floor_type" placeholder="Тип установки" required>
                    <input type="number" name="compressor_type" placeholder="Тип компрессора" required>
                    <input type="number" name="large_performance" placeholder="Высокая производительность" required>
                    <input type="number" name="high_performance" placeholder="Повышенная производительность" required>
                    <input type="number" name="cups_hot_water" placeholder="Кружки горячей воды" required>
                    <input type="number" name="cups_cold_water" placeholder="Кружки холодной воды" required>
                    <input type="number" step="0.01" name="separate_hot_water_tank"
                        placeholder="Отдельный бак для горячей воды" required>
                    <input type="number" name="cold_water_separate_tank" placeholder="Отдельный бак для холодной воды"
                        required>
                    <input type="number" step="0.01" name="hot_water_tank" placeholder="Бак горячей воды" required>
                    <input type="number" step="0.01" name="hot_water_bucket" placeholder="Ведро горячей воды" required>
                    <input type="number" step="0.01" name="performance_hot_water"
                        placeholder="Производительность горячей воды" required>
                    <input type="number" step="0.01" name="performance_cold_water"
                        placeholder="Производительность холодной воды" required>
                    <input type="number" name="heating_cooling_power" placeholder="Мощность нагрева/охлаждения"
                        required>
                    <input type="number" name="cooling_power" placeholder="Мощность охлаждения" required>
                    <input type="number" name="filtration_system" placeholder="Система фильтрации" required>
                    <select name="filter_type">
                        <option value="">Тип фильтра</option>
                        <option value="12&quot;">12"</option>
                        <option value="14&quot;">14"</option>
                        <option value="I">I</option>
                        <option value="U">U</option>
                    </select>
                    <select name="filter_size">
                        <option value="">Размер фильтра</option>
                        <option value="12">12</option>
                        <option value="14">14</option>
                    </select>
                    <input type="text" name="body_color" placeholder="Цвет корпуса">
                    <input type="text" name="insert_color" placeholder="Цвет вставки">
                    <input type="text" name="tap_type" placeholder="Тип крана">
                    <input type="number" name="hot_water_protection" placeholder="Защита от горячей воды" required>
                    <input type="text" name="voltage" placeholder="Напряжение">
                    <input type="number" name="warranty_period" placeholder="Срок гарантии">
                    <input type="text" name="country_of_origin" placeholder="Страна происхождения">
                    <input type="text" name="dimensions_without_package" placeholder="Габариты без упаковки">
                    <input type="text" name="dimensions_in_package" placeholder="Габариты в упаковке">
                    <input type="number" step="0.0001" name="volume" placeholder="Объем" required>
                    <input type="datetime-local" name="created_at" placeholder="Дата создания">
                    <input type="file" name="img" placeholder="Фото" required>

                    <input type="submit" name="submit_form" value="Добавить Пурифаер">
                </form>
            </div>
        </div>
    </div>
    <script src="assets\js\add_zxc.js"></script>
    <script>
        const checkbox = document.getElementById('toggleCheckbox');
        const inputsContainer = document.getElementById('inputsContainer');

        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
                inputsContainer.classList.remove('hidden');
            } else {
                inputsContainer.classList.add('hidden');
            }
        });
        document.getElementById("toggleButton2").addEventListener("click", function () {
            const div = document.getElementById("fontain");
            const div2 = document.getElementById("Purifayer");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
            if (div2.style.display === "block") {
                div2.style.display = "none";
            }
        });
        document.getElementById("toggleButton").addEventListener("click", function () {
            const div = document.getElementById("Purifayer");
            const div2 = document.getElementById("fontain");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
            if (div2.style.display === "block") {
                div2.style.display = "none";
            }
        });

    </script>
</body>

</html>