<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_shop/index.css">
    <script src="../JavaScript/index.js" defer></script>

    <title>Document</title>
</head>
<body>
    <header>
        <?php
            include_once "PHP_shop/shop_header.php";
        ?>
    </header>
<!-- container div with all periphery products and links -->
<div class = "container" id = "peripheries">
        <!--link to keyboards -->
    <a href="/PHP_shop/stock.php?stock=keyboards&page=1" class = "links left_border" id = "peripheries1">
        <img class = "image" src="/Images/keyboard.png" alt="IMG">
        <p class = "description"></p>
    </a>
        <!--link to mouse -->
    <a href="/PHP_shop/stock.php?stock=mouses&page=1" class = "links right_border" id = "peripheries2">
        <img class = "image" src="/Images/mouse.png" alt="IMG">
        <p class = "description"></p>
    </a>
        <!--link to headphones -->
    <a href="/PHP_shop/stock.php?stock=headphones&page=1" class = "links right_border" id = "peripheries3">
        <img class = "image" src="/Images/headphones.png" alt="IMG">
        <p class = "description"></p>
    </a>
        <!--link to microphones -->
    <a href="/PHP_shop/stock.php?stock=microphones&page=1" class = "links right_border" id = "peripheries4">
        <img class = "image" src="/Images/microphone.png" alt="IMG">
        <p class = "description"></p>
    </a>
        <!--link to cameras -->
    <a href="/PHP_shop/stock.php?stock=webcam&page=1" class = "links right_border" id = "peripheries5">
        <img class = "image" src="/Images/webcam.png" alt="IMG">
        <p class = "description"></p>
    </a>
</div>

<!-- container div with all hardware products and links -->
<div class = "container" id = "hardwares">
    <!--link to boards -->
    <a href="/PHP_shop/stock.php?stock=motherboards&page=1" class = "links left_border" id = "hardwares1">
        <img class = "image" src="/Images/motherboard.png" alt="IMG">
        <p class = "description"></p>
    </a> 
    <!--link to CPU -->
    <a href="/PHP_shop/stock.php?stock=cpus&page=1" class = "links right_border" id = "hardwares2">
        <img class = "image" src="/Images/cpu.png" alt="IMG">
        <p class = "description"></p>
    </a> 
    <!--link to GPU -->
    <a href="/PHP_shop/stock.php?stock=gpus&page=1" class = "links right_border" id = "hardwares3">
        <img class = "image" src="/Images/gpu.png" alt="IMG">
        <p class = "description"></p>
    </a> 
    <!--link to RAM -->
    <a href="/PHP_shop/stock.php?stock=ram&page=1" class = "links right_border" id = "hardwares4">
        <img class = "image" src="/Images/ram.png" alt="IMG">
        <p class = "description"></p>
    </a> 
    <!--link to HDD -->
    <a href="/PHP_shop/stock.php?stock=hdd&page=1" class = "links right_border" id = "hardwares5">
        <img class = "image" src="/Images/hdd.png" alt="IMG">
        <p class = "description"></p>
    </a> 
    <!--link to Power Supply -->
    <a href="/PHP_shop/stock.php?stock=power_supply&page=1" class = "links right_border" id = "hardwares6">
        <img class = "image" src="/Images/power_supply.png" alt="IMG">
        <p class = "description"></p>
    </a>
    <!--link to Pc boxes -->
    <a href="/PHP_shop/stock.php?stock=pc_box&page=1" class = "links right_border" id = "hardwares7">
        <img class = "image" src="/Images/pc_box.png" alt="IMG">
        <p class = "description"></p>
    </a>
</div>

<!-- container div with all pc products and links -->
<div class = "container" id = "computers">
        <!--link to PC -->
    <a href="/PHP_shop/stock.php?stock=pc&page=1" class = "links left_border" id = "computers1">
        <img class = "image" src="/Images/pc.png" alt="IMG">
        <p class = "description"></p>
    </a> 
        <!--link to Laptop -->
    <a href="/PHP_shop/stock.php?stock=laptop&page=1" class = "links right_border" id = "computers2">
        <img class = "image" src="/Images/laptop.png" alt="IMG">
        <p class = "description"></p>
    </a> 
</div>

<!-- container div with all monitor products and links -->
<div class = "container" id = "monitors">
        <!--link to monitors -->
    <a href="/PHP_shop/stock.php?stock=monitor&page=1" class = "links left_border" id = "monitors1">
        <img class = "image" src="/Images/monitor.png" alt="IMG">
        <p class = "description"></p>
    </a>  
</div>

<!-- container div with all stools and descks products and links -->
<div class = "container" id = "stools_and_desks">
        <!--link to stools -->
    <a href="/PHP_shop/stock.php?stock=stools&page=1" class = "links left_border" id = "stools_and_desks1">
        <img class = "image" src="/Images/game_chair.png" alt="IMG">
        <p class = "description"></p>
    </a>
        <!--link to descks -->
    <a href="/PHP_shop/stock.php?stock=desks&page=1" class = "links right_border" id = "stools_and_desks2">
        <img class = "image" src="/Images/desk.png" alt="IMG">
        <p class = "description"></p>
    </a>
</div>
<footer>
<?php
    include_once "PHP_shop/footer.php";
?> 
</footer>
</body>
</html>