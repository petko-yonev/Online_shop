<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_staff/staff_order.css">

    <title>Document</title>
</head>
<body>

<header>
    <?php
        include_once "staff_header.php";
    ?>
</header>

<?php

$page_num = $_GET["page"];
$stock_on_page = 1;
$result_on_page = ($page_num - 1) * $stock_on_page;
    
$status = $_GET["status"];
if($status == "waiting"){
    echo'<div class = "label_status_page">Неодобрени Поръчки</div>';
} else {
    echo'<div class = "label_status_page">Одобрени Поръчки</div>';
}
echo "<table>
        <tr class = 'first_tr'>
            <td></td>
            <td>ID</td>
            <td>Име</td>
            <td>Фамилия</td>
            <td>Телефон</td>
            <td>Град</td>
            <td>Адрес на доставчик</td>
            <td>Дата</td>
        </tr>";

$sql_orders = "SELECT `order_id`, `first_name`,`last_name`, `tel`, `town`, `deliver`, `date` FROM `orders` WHERE `status` = '$status' ORDER BY `date` ASC LIMIT ". $result_on_page . ',' . $stock_on_page;
if(!mysqli_stmt_prepare($stmt, $sql_orders)){
    echo "problem sql_orders in staff_order.php";
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            $order_id = $row["order_id"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $tel = $row["tel"];
            $town = $row["town"];
            $deliver = $row["deliver"];
            $date = $row["date"];
            echo'
                <tr>      
                    <td><a href="staff_view_order.php?order_id='.$order_id.'&status='.$status.'" ><img  class="staff_view_order" src="/Images/eye.png" alt="SEE"></a></td>                       
                    <td>'.$order_id.'</td>
                    <td>'.$first_name.'</td> 
                    <td>'.$last_name.'</td>
                    <td>'.$tel.'</td>
                    <td>'.$town.'</td>
                    <td>'.$deliver.'</td>
                    <td>'.$date.'</td>
                </tr>'; 
        }
    echo "</table>";
}

//pagination
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$label_id = "order_id";
$stock = "orders";
$filter = "`status` = '$status'";

include_once "../PHP_shop/pagination.php";
?>
</body>
</html>