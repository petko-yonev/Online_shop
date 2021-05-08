<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_staff/staff_order.css">
    <link rel="stylesheet" type="text/css" href="/CSS_staff/staff_view_order.css">
    <title>Document</title>
</head>
<body>

<header>
    <?php
        include_once "staff_header.php";
    ?>
</header>

<?php
 $order_id = $_GET["order_id"];
 $sum_price = 0;
echo "<div class = 'lable'>Клиент:</div>";
    echo "<table>
            <tr class = 'first_tr'>
                <td>ID</td>
                <td>Име</td>
                <td>Фамилия</td>
                <td>Телефон</td>
                <td>Град</td>
                <td>Адрес на доставчик</td>
                <td>Дата</td>
            </tr>";

    $sql_orders = "SELECT `order_id`, `first_name`,`last_name`, `tel`, `town`, `deliver`, `date` FROM `orders` WHERE `order_id` = '$order_id'";
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

$sql_ordered_stock = "SELECT * FROM `ordered_stock` WHERE `order_id` = '$order_id'";
echo "<div class = 'lable'>Поръчка:</div>";
echo "<table>
        <tr class = 'first_tr'>
            <td>Детайли</td>
            <td>Име</td>
            <td>Марка</td>
            <td>Наличност на склад</td>
            <td>Брой поръчани</td>
            <td>Ед. Цена</td>
            <td>Обща Цена</td>
            <td>Промоция</td>
            <td>Крайна Цена</td>
            <td>Премахване</td>
            <td>Добавяне</td>
        </tr>";
if(!mysqli_stmt_prepare($stmt, $sql_ordered_stock)){
    echo "problem sql_ordered_stock in staff_view_order.php";
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){

            $stock = $row["stock"];
            $label_id = $stock . "_id";
            $stock_id = $row["stock_id"];
            $quantity_ordered = $row["quantity"];

            $sql_get_stock = "SELECT `$label_id`, `name`, `brand`, `quantity`, `price`, `promo`, `pic` FROM $stock WHERE `$label_id` = '$stock_id'";
            
            if(!mysqli_stmt_prepare($stmt, $sql_get_stock)){
                echo "problem sql_get_stock in staff_view_order.php";
                exit();
            } else {
                mysqli_stmt_execute($stmt);
                $result_stock = mysqli_stmt_get_result($stmt);
                while($row_stock = mysqli_fetch_assoc($result_stock)){ 
                    $name = $row_stock["name"];
                    $brand = $row_stock["brand"];
                    $quantity = $row_stock["quantity"];
                    $price = $row_stock["price"];
                    $promo = $row_stock["promo"] / 100;
                    $promo_price =  ($price * $quantity_ordered) - (($price * $quantity_ordered) * $promo);
                    $sum_price = $sum_price + $promo_price;
                    echo'<tr> 
                            <td><a href="staff_view_stock_detail.php?stock_id='.$stock_id.'&stock='.$stock.'" ><img  class="staff_view_order" src="/Images/eye.png" alt="SEE"></a></td> 
                            <td>'.$name.'</td>
                            <td>'.$brand.'</td> 
                            <td>'.$quantity.'</td>
                            <td>'.$quantity_ordered.'</td>
                            <td>'.$price.' лв.</td>
                            <td>'.number_format((float)($price * $quantity_ordered), 2, '.', '').' лв.</td>
                            <td>'.$row_stock["promo"].'%</td>
                            <td>'.number_format((float)($promo_price), 2, '.', '').' лв</td>
                            <td>
                                <form action = "staff_remove_stock_from_order.php" method = "POST">
                                    <input type = "hidden" name = "order_id" value = "'.$order_id.'">
                                    <input type = "hidden" name = "ordered_stock" value = "'.$stock.'">
                                    <input type = "hidden" name = "ordered_stock_id" value = "'.$stock_id.'">
                                    <input type = "hidden" name = "quantity_ordered" value = "'.$quantity_ordered.'">
                                    <input class = "quantity_to_remove_selector" type = "number" name = "quantity_to_remove" value = "1" min = "1" max = "'.$quantity_ordered.'">
                                    <input class = "remove_quantity_btn" type = "submit" name = "remove_quantity" value = "X">
                                </form>
                            </td>
                            <td>
                                <form action = "staff_remove_stock_from_order.php" method = "POST">
                                    <input type = "hidden" name = "order_id" value = "'.$order_id.'">
                                    <input type = "hidden" name = "ordered_stock" value = "'.$stock.'">
                                    <input type = "hidden" name = "ordered_stock_id" value = "'.$stock_id.'">
                                    <input type = "hidden" name = "quantity_ordered" value = "'.$quantity_ordered.'">
                                    <input class = "quantity_to_remove_selector" type = "number" name = "quantity_to_remove" value = "0" min = "0" max = "'.$quantity.'">
                                    <input class = "remove_quantity_btn" type = "submit" name = "add_quantity" value = "+">
                                </form>
                            </td>
                        </tr>'; 
                }
            
            }
        }
}
echo "</table>";

echo'<div class = "sum_price">Обща сума: '.number_format((float)($sum_price), 2, '.', '').' лв.</div>';

echo'<div class = "change_order_container">';

if($_GET["status"] == "waiting"){
    echo'<form class = "change_order" action = "staff_change_order_status.php" method = "POST">
            <input type = "hidden" name = "order_id" value = "'.$order_id.'">
            <input class = "change_order_btn" type = "submit" name = "approved" value = "Одобри поръчка">
        </form>

        <form class = "change_order" action = "staff_change_order_status.php" method = "POST">
            <input type = "hidden" name = "order_id" value = "'.$order_id.'">
            <input class = "change_order_btn" type = "submit" name = "denied" value = "Отхвърли поръчка">
        </form>

        <form class = "change_order" action = "staff_add_stock_to_order.php" method = "POST">
            <input type = "hidden" name = "order_id" value = "'.$order_id.'">
            <input class = "change_order_btn" type = "submit" name = "add_stock_to_order" value = "Добави продукт към поръчка">
        </form>';
}
if($_GET["status"] == "approved"){
    echo'<form class = "change_order" action = "staff_change_order_status.php" method = "POST">
        <input type = "hidden" name = "order_id" value = "'.$order_id.'">
        <input type = "hidden" name = "ordered_stock" value = "'.$stock.'">
        <input type = "hidden" name = "ordered_stock_id" value = "'.$stock_id.'">
        <input type = "hidden" name = "quantity_ordered" value = "'.$quantity_ordered.'">
        <input class = "change_order_btn" type = "submit" name = "send" value = "Изпрати поръчка">
    </form>';
}
echo'</div>';

?>
</body>
</html>
