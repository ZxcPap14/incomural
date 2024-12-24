<link rel="stylesheet" type="text/css" href="../assets\css\style.css">
<style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    </style>
<header id="up_header1" >
            <div class="logo_and_text"
            onclick="location.href='../';">
            
            </div>
            <div id="header_center" style="position: relative;">
                <input type="search" placeholder="Поиск ..." id="search">
                Данный сайт сделан как курсовой проект и не является рабочим сайтом
            </div>
            <div id="karzina_zxc">
            <a href="../cart.php">
                <img src="assets/img/shopping-cart.svg" alt="" style=" height: 5vh;">
            </a>    
            <?php
             if(include_once("assets/page/header/check_auth.php")){

            }
            else{
                echo"222";
            }
            ?>
            </div>
        </div>
    </header>
