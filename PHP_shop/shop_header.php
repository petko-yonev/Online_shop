<!-- Style and sticky nav in header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/CSS_shop/shop_header.css">
<link rel="stylesheet" type="text/css" href="/CSS_shop/footer.css">
<script src="../JavaScript/shop_header.js" defer></script>

<!-- Header Infomration -->

    <!-- Logo -->
<div class="logo_pic_cantainer">
    <a  href="/index.php" ><img  class="logo_pic" src="/Images/Logo.png" alt="LOGO"></a>
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

        //swich between logIn picture and logOut
        if(isset($_SESSION["userId"])){
            echo'<form action = "/PHP_shop/log_out.php" method = "POST">
            <div class = "log_in_out_container"><input class = "log_in_out_img" type="image" src="/Images/log_out.png" alt="LogOut" /></div>
            </form>';
        } else {
            echo'<a class = "log_in_out_container" href="/PHP_shop/log_or_register_front_end.php?log_in=true" ><img class = "log_in_out_img" src="/Images/log_in.png" alt="Log In"></a>';
        }
 
        // count the number of stock items bought
        $stock_count = 0;
        if(isset($_SESSION)){
            foreach($_SESSION as $key => $value){
                if (strpos($key, '_No_') !== false) {
                $stock_count++;
                }
            }
        }

        // display the number of stock items and the picture of cart full with that number of items
        echo'<div class = "stock_counter">'.$stock_count.'</div>';
        if($stock_count < 4){
            echo'<a class = "cart_img_border" href="/PHP_shop/cart.php" ><img class = "cart_image" src="/Images/cart_'.$stock_count.'.png" alt="CART"></a>';
        } else {
            echo'<a class = "cart_img_border" href="/PHP_shop/cart.php" ><img class = "cart_image" src="/Images/cart_4.png" alt="CART"></a>';
        }
    
        if(isset($_SESSION["userId"])){
            echo'<a class = "user_data_container" href="/PHP_shop/user_data.php" ><img class = "user_data_img" src="/Images/user_data.png" alt="User Data"></a>';
        } else {
            echo'<a class = "user_data_container" href="/PHP_shop/log_or_register_front_end.php?log_in=true&show_data=logInToSee" ><img class = "user_data_img" src="/Images/user_data.png" alt="User Data"></a>';
        }
    ?>
    <!-- user data -->
    
</div>

    <!-- Nav -->
<nav class = "wrap" id="wrap">
    <ul class = "main" onclick = "scroll_to(peripheries)">Периферия
        <li class = "dropped top"><a href="/PHP_shop/stock.php?stock=keyboards&page=1">Клавиатури</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=mouses&page=1">Мишки</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=headphones&page=1">Слушалки</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=microphones&page=1">Микрофони</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=webcam&page=1">Камери</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(hardwares)">Хардуер
        <li class = "dropped top"><a href="/PHP_shop/stock.php?stock=motherboards&page=1">Дънни Платки</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=cpus&page=1">Процесори</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=gpus&page=1">Видео Карти</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=ram&page=1">Памети</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=hdd&page=1">Вътрешни Дискове</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=power_supply&page=1">Захранване</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=pc_box&page=1">Кутии</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(computers)">Компютри
        <li class = "dropped top"><a href="/PHP_shop/stock.php?stock=pc&page=1">Компютри</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=laptop&page=1">Лаптопи</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(monitors)">Монитори
        <li class = "dropped top"><a href="/PHP_shop/stock.php?stock=monitor&page=1">Монитори</a></li>
    </ul>
    <ul class = "main" onclick = "scroll_to(stools_and_desks)">Столове
        <li class = "dropped top"><a href="/PHP_shop/stock.php?stock=stools&page=1">Столове</a></li>
        <li class = "dropped"><a href="/PHP_shop/stock.php?stock=desks&page=1">Бюра</a></li>
    </ul>
</nav>

<?php
include_once "sql_connection.php";

if(isset($_SESSION)){
    print_r($_SESSION);
}

//clear session

// session_unset();
// session_destroy();
// session_write_close();
// exit;
?>

