<!-- Style and sticky nav in header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/CSS_shop/shop_header.css">
<script src="../JavaScript/shop_header.js" defer></script>

<!-- Header Infomration -->

    <!-- Logo -->
<div class="logo_pic_cantainer">
    <a  href="staff_index.php" ><img  class="logo_pic" src="/Images/logo_admin.png" alt="LOGO"></a>
</div>

    <!-- Login/ Cart/ Account data -->
<div class = "header_data_container">

    <!-- Log in/out  -->
    <?php
        // start session if there is none
        if (session_status() === PHP_SESSION_NONE) {
            session_start();

            if( !isset( $_SESSION['lifetime'] ) || time() - $_SESSION['lifetime'] > 1800){
                session_unset();
                session_destroy();
                session_write_close();
            } else {
               $_SESSION['lifetime'] = time();
            }
        }
           
        if(!isset($_SESSION["adminUser"])){
            session_unset();
            session_destroy();
            session_write_close();
            header("Location: ../index.php?");
            exit;
        } 

        //swich between logIn picture and logOut
        if(isset($_SESSION["adminUser"])){
            echo'<form action = "/PHP_shop/log_out.php" method = "POST">
            <div class = "log_in_out_container"><input class = "log_in_out_img" type="image" src="/Images/log_out.png" alt="LogOut" /></div>
            </form>';
        } else {
            echo'<a class = "log_in_out_container" href="/PHP_shop/log_or_register_front_end.php?log_in=true" ><img class = "log_in_out_img" src="/Images/log_in.png" alt="Log In"></a>';
        }
?>
    
</div>

    <!-- Nav -->
<nav class = "wrap" id="wrap">
    <ul class = "main" onclick = "scroll_to(peripheries)">Периферия
        <li class = "dropped top"><a href="/Staff/staff_stock.php?stock=keyboards&page=1">Клавиатури</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=mouses&page=1">Мишки</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=headphones&page=1">Слушалки</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=microphones&page=1">Микрофони</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=webcam&page=1">Камери</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(hardwares)">Хардуер
        <li class = "dropped top"><a href="/Staff/staff_stock.php?stock=motherboards&page=1">Дънни Платки</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=cpus&page=1">Процесори</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=gpus&page=1">Видео Карти</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=ram&page=1">Памети</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=hdd&page=1">Вътрешни Дискове</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=power_supply&page=1">Захранване</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=pc_box&page=1">Кутии</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(computers)">Компютри
        <li class = "dropped top"><a href="/Staff/staff_stock.php?stock=pc&page=1">Компютри</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=laptop&page=1">Лаптопи</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(monitors)">Монитори
        <li class = "dropped top"><a href="/Staff/staff_stock.php?stock=monitor&page=1">Монитори</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(stools_and_desks)">Столове
        <li class = "dropped top"><a href="/Staff/staff_stock.php?stock=stools&page=1">Столове</a></li>
        <li class = "dropped"><a href="/Staff/staff_stock.php?stock=desks&page=1">Бюра</a></li>
    </ul>
</nav>

<?php
include_once "../PHP_shop/sql_connection.php";

if(isset($_SESSION["add_to_order"])){
    echo'<div>Добавяне към поръчка № '.$_SESSION["add_to_order"].'</div>';
    echo'<form action = "" method = "POST">
        <input type = "submit" name = "remove_add_to_order" value = "X">
    </form>';
}

if(isset($_POST["remove_add_to_order"])){
    unset($_SESSION["add_to_order"]);
}
if(isset($_SESSION)){
    print_r($_SESSION);
}

//clear session

// session_unset();
// session_destroy();
// session_write_close();
// exit;
?>

