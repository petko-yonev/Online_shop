<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../JavaScript/index.js" defer></script>

    <link rel="stylesheet" type="text/css" href="/CSS_staff/staff_index.css">


    <title>Document</title>
</head>
<body>
    <header>
        <?php
            include_once "staff_header.php";
        ?>
    </header>

<nav>
    <ul>
        <li class="header_nav"><a class="underline_remove" href="/Staff/staff_orders.php?status=waiting&page=1">Неодобрени Поръчки</a></li>
        <li class="header_nav"><a class="underline_remove" href="/Staff/staff_orders.php?status=approved&page=1">Одобрени Поръчки</a></li>    
        <li class="header_nav"><a class="underline_remove" href="/Staff/staff_update_stock.php">Зареждане на стока</a></li>
    </ul>
</nav>

</body>
</html>