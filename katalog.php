<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../assets\css\style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.svg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<style>
    .img_cartochka {
        width: 70px;
    }
</style>
<style>
        /* Стиль для выпадающего списка */
        #search-results {
            border: 1px solid #ccc;
            max-height: 300px;
            overflow-y: auto;
            position: absolute;
            width: 100%;
            background-color: white;
            display: none;
            z-index: 1000;
        }

        #search-results li {
            padding: 10px;
            cursor: pointer;
        }

        #search-results li:hover {
            background-color: #f0f0f0;
        }
    </style>

<body>
    <?php
    include_once("assets/php/connect.php");
    include_once("assets/page/header/head.php");
    ?>
    <div id="osnova">
        <?php
        $table = $_GET['table_name'];
        if ($table == "Fountains") {
            $chillGuy = $_GET['coling'];
            if ($chillGuy==1 ||  (isset($_GET['colling'])&& $_GET['colling']=="on")) {
                $query = "SELECT * FROM  $table WHERE Сooling = 1";
            }

            else{
                $query = "SELECT * FROM  $table WHERE Сooling = 0";
            }
            
            $result = $connect->query($query);
            $filters = array('filter' => '', 'min_price' => 0, 'max_price' => 99999999, 'min_performance' => 0, 'max_performance' => 99999999);
            $filet_q;
            $min_price_q;
            $max_price_q;
            $min_performance_q;
            $max_performance_q;
            if (isset($_GET['filter']) && $_GET['filter'] !== '') {
                $filters['filter'] = $_GET['filter'];
                $filet_q = $_GET['filter'];
            }

            if (isset($_GET['min_price']) && $_GET['min_price'] !== '') {
                $filters['min_price'] = $_GET['min_price'];
                $max_price_q = $_GET['min_price'];
            }

            if (isset($_GET['max_price']) && $_GET['max_price'] !== '') {
                $filters['max_price'] = $_GET['max_price'];
                $max_price_q = $_GET['max_price'];
            }

            if (isset($_GET['min_performance']) && $_GET['min_performance'] !== '') {
                $filters['min_performance'] = $_GET['min_performance'];
                $min_performance_q = $_GET['min_performance'];
            }

            if (isset($_GET['max_performance']) && $_GET['max_performance'] !== '') {
                $filters['max_performance'] = $_GET['max_performance'];
                $max_performance_q = $_GET['max_performance'];
            }
            $filtered_result = array();
            $min_price = 99999999;
            $max_price = 0;
            $min_performance = 99999999;
            $max_performance = 0;
            if ($result === false) {
                die('Ошибка запроса: ' . $connect->error);
            }
            while ($row = $result->fetch_assoc()) {
                if (
                    $row['Price'] >= $filters['min_price'] &&
                    $row['Price'] <= $filters['max_price'] &&
                    $row['Performance'] >= $filters['min_performance'] &&
                    $row['Performance'] <= $filters['max_performance'] && ($filters['filter'] == '' || strpos($row['Name'], $filters['filter']) !== false)
                ) {
                    $filtered_result[] = $row;
                } else {
                    echo $filters['filter']
                    ;
                }
                if ($row['Price'] < $min_price) {
                    $min_price = $row['Price'];
                }
                if ($row['Price'] < $min_price) {
                    $min_price = $row['Price'];
                }

                if ($row['Price'] > $max_price) {
                    $max_price = $row['Price'];
                }
                if ($row['Performance'] < $min_price) {
                    $min_performance = $row['Performance'];
                }

                if ($row['Performance'] > $max_performance) {
                    $max_performance = $row['Performance'];
                }
            }
        }
        else{
            $query = "SELECT * FROM  $table WHERE";
        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>Фильтры</h2>
                    <form>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $table ?>" id="table_name" name="table_name" >
                            <input type="hidden" value="<?php echo $chillGuy ?>" id="coling" name="coling" >
                            <label for="filter">Название:</label>
                            <input type="text" class="form-control" id="filter" name="filter"
                                value="<?php echo $filters['filter']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="filter">Охлаждание:</label>
                            <input type="checkbox" class="" id="colling" name="colling"></div>
                        <div class="form-group">
                            
                            <label for="min_price">Минимальная цена:</label>
                            <input type="number" class="form-control" id="min_price" name="min_price"
                                value="<?php echo $min_price_q; ?>" placeholder="<?php echo $min_price; ?>">
                        </div>
                        <div class="form-group">
                            <label for="max_price">Максимальная цена:</label>
                            <input type="number" class="form-control" id="max_price" name="max_price"
                                value="<?php echo $max_price_q; ?>" placeholder="<?php echo $max_price; ?>">
                        </div>
                        <div class="form-group">
                            <label for="min_performance">Минимальная производительность:</label>
                            <input type="number" class="form-control" id="min_performance" name="min_performance"
                                value="<?php echo $min_performance_q; ?>" placeholder="<?php echo $min_performance; ?>">
                        </div>
                        <div class="form-group">
                            <label for="max_performance">Максимальная производительность:</label>
                            <input type="number" class="form-control" id="max_performance" name="max_performance"
                                value="<?php echo $max_performance_q; ?>" placeholder="<?php echo $max_performance; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Применить</button>
                    </form>
                </div>
                <div class="col-md-9">
                    <h2>Товары</h2>
                    <?php if ($table == "Fountains") {
                        foreach ($filtered_result as $row) { ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8"
                                            onclick="location.href='../tovar_page.php?id=<?php echo $row['id']; ?>&table_name=<?php echo urlencode($table); ?>';">
                                            <h5 class="card-title"><?php echo $row['Name']; ?></h5>

                                            <p class="card-text">Цена: <?php echo $row['Price']; ?> руб.</p>
                                            <p class="card-text">Производительность: <?php echo $row['Performance']; ?> л/мин
                                            </p>
                                            <img class="img_cartochka" src="<?php echo "../" . $row['img']; ?>">
                                            <form method="post" id="add_to_karzina">


                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="name" value="<?php echo $row['Name']; ?>">
                                                <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
                                                <button type="submit" class="btn btn-success">Добавить в корзину</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else {
                        foreach ($filtered_result as $row) {
                            ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8"
                                            onclick="location.href='../tovar_page.php?id=<?php echo $row['id']; ?>&table_name=<?php echo urlencode($table); ?>';">
                                            <h5 class="card-title"><?php echo $row['Name']; ?></h5>

                                            <p class="card-text">Цена: <?php echo $row['Price']; ?> руб.</p>
                                            <p class="card-text">Производительность: <?php echo $row['Performance']; ?> л/мин
                                            </p>
                                            <img class="img_cartochka" src="<?php echo "../" . $row['img']; ?>">
                                            <form method="post" id="add_to_karzina">


                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="name" value="<?php echo $row['Name']; ?>">
                                                <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
                                                <button type="submit" class="btn btn-success">Добавить в корзину</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    } ?>
                    <?php
                    session_start();

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];

                        // Инициализация корзины, если она ещё не создана
                        if (!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        }

                        // Проверяем, есть ли товар в корзине
                        if (isset($_SESSION['cart'][$id])) {
                            // Увеличиваем количество товара
                            $_SESSION['cart'][$id]['quantity'] += 1;
                        } else {
                            // Добавляем новый товар
                            $_SESSION['cart'][$id] = [
                                'id' => $id,
                                'name' => $name,
                                'price' => $price,
                                'quantity' => 1
                            ];
                        }
                        exit();
                    }
                    ?>
                </div>
                <script src="../assets/js/karzina.js"></script>
            </div>
        </div>
    </div>
</body>

</html>