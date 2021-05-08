<?php
//if its not submited redirection
if(!isset($_POST["send_order"])){
    header ("Location: ../index.php");
    exit(); 
}

include_once "sql_connection.php";
session_start();
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$tel =  $_POST["tel"];
$town = $_POST["town"];
$deliver =  $_POST["deliver"];
$status = "waiting";
$date =  date('Y.m.d H:i:s', strtotime('1 hour'));

//update order to denied index

//$sql_check_denied_orders = "SELECT `status` FROM `orders` WHERE EXISTS (SELECT `status` FROM `orders` WHERE `status` = 'denied')";
$sql_check_denied_orders = "SELECT `status` FROM `orders` WHERE EXISTS (SELECT `status` FROM `orders` WHERE `status` = 'denied')";
if(!mysqli_stmt_prepare($stmt, $sql_check_denied_orders)){
        echo "Problem with sql_check_denied_orders in send_order.php";
        exit;
} else {
    mysqli_stmt_execute($stmt);

    //Chack if there is a row to update
    if(mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))){
        $sql_sql_update_denied_orders = "UPDATE `orders` SET `first_name` = '$first_name', `last_name` = '$last_name', `tel` = '$tel', `town` = '$town', `deliver` = '$deliver', `status` = '$status', `date` = '$date' WHERE `status` = 'denied' LIMIT 1";
        echo $sql_sql_update_denied_orders;
        if(!mysqli_stmt_prepare($stmt, $sql_sql_update_denied_orders)){
            echo "Problem with sql_update_denied_orders in send_order.php";
            exit;
        } else {
            mysqli_stmt_execute($stmt);
            add_items_from_order($stmt, $tel, $date);
        }
    } else {
        //SQL insert order into database
        $sql_send_order = "INSERT INTO `orders` (`first_name`, `last_name`, `tel`, `town`, `deliver`, `status`, `date`) VALUES ('$first_name', '$last_name', '$tel', '$town', '$deliver', '$status', '$date')";
        if(!mysqli_stmt_prepare($stmt, $sql_send_order)){
            echo "Problem with sql_send_order";
            exit;
        } else {
            mysqli_stmt_execute($stmt);
            add_items_from_order($stmt, $tel, $date);
        }
    }
}

function add_items_from_order($stmt, $tel, $date){
//Тake data and select id on that order
$sql_ordered_items = "SELECT `order_id` FROM `orders` WHERE `tel` = '$tel' AND `date` = '$date'";

if(!mysqli_stmt_prepare($stmt, $sql_ordered_items)){
    echo "Problem with sql_ordered_items";
    exit;
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row_order_data = mysqli_fetch_assoc($result)){
        $order_id = $row_order_data["order_id"];

        foreach($_SESSION as $key => $value){
            if (strpos($key, '_No_') !== false) {
                //stock type
                $stock = strstr($key, '_No_', true);

                //id on stock
                $stock_id = strstr($key, '_No_', false);
                $stock_id = substr($stock_id, 4);

                //quantity ordered
                $quantity = $value;

                // Inserting ordered stock for that order
                $sql_order_items = "INSERT INTO `ordered_stock` (`order_id`, `stock`, `stock_id`, `quantity`) VALUES ('$order_id', '$stock', '$stock_id', '$quantity')";
                if(!mysqli_stmt_prepare($stmt, $sql_order_items)){
                    echo "Problem with sql_order_items in send_order.php";
                    exit;
                } else {
                   //mysqli_stmt_bind_param($stmt, "isii", $order_id, $stock, $stock_id, $quantity);
                    mysqli_stmt_execute($stmt);

                    $label_id = $stock . "_id";
                    $sql_remove_quantity = "UPDATE `$stock` SET `quantity` = `quantity` - '$quantity' WHERE `$label_id` = '$stock_id'";
                    if(!mysqli_stmt_prepare($stmt, $sql_remove_quantity)){
                        echo "Problem with sql_remove_quantity";
                    } else {
                        mysqli_stmt_execute($stmt);
                    }

                }
            }
        }
    }
}
//clear all stock from cart after order
foreach($_SESSION as $key => $value){
    if (strpos($key, '_No_') !== false) {
        unset($_SESSION[$key]);
    }
}
header ("Location: ../index.php");
exit();
}