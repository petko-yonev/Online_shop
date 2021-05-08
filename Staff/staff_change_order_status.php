<?php

include_once "../PHP_shop/sql_connection.php";
$order_id = $_POST["order_id"];

if(isset($_POST["denied"])){
    $sql_change_order_status = "UPDATE `orders` SET `status` = 'denied' WHERE `order_id` = '$order_id'";

    $sql_return_stock = "SELECT * FROM `ordered_stock` WHERE `order_id` = '$order_id'";
    if(!mysqli_stmt_prepare($stmt, $sql_return_stock)){
        echo "Problem with sql_return_stock in staff_change_order_status.php"; 
        exit;
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            $ordered_stock = $row["stock"];
            $ordered_stock_id = $row["stock_id"];
            $ordered_quantity = $row["quantity"];
            $label_id = $ordered_stock . "_id";
            update_stock_in_shop($ordered_stock, $ordered_quantity, $label_id, $ordered_stock_id, $stmt);
            delete_stock_from_order($order_id, $stmt);
            
        }
    }
    $link = "Location: /Staff/staff_orders.php?status=waiting&page=1";
}
function update_stock_in_shop($ordered_stock, $ordered_quantity, $label_id, $ordered_stock_id, $stmt){
    $sql_add_quantity = "UPDATE `$ordered_stock` SET `quantity` = `quantity` + '$ordered_quantity' WHERE `$label_id` = $ordered_stock_id";
    if(!mysqli_stmt_prepare($stmt, $sql_add_quantity)){
        echo "Problem with sql_add_quantity in staff_change_order_status.php"; 
        exit;
    } else {
        mysqli_stmt_execute($stmt);
        echo 'UPDATED <br>';
    }
}
function delete_stock_from_order($order_id, $stmt){
    $sql_delete_stock_from_order = "DELETE FROM `ordered_stock` 
    WHERE `order_id` = '$order_id'";
    if(!mysqli_stmt_prepare($stmt, $sql_delete_stock_from_order)){
        echo "Problem with sql_delete_stock_from_order in staff_change_order_status.php"; 
        exit;
    } else {
        mysqli_stmt_execute($stmt);
        echo 'deleted <br>';
    }
}

if(isset($_POST["approved"])){
    $sql_change_order_status = "UPDATE `orders` SET `status` = 'approved' WHERE `order_id` = '$order_id'";
    $link = "Location: /Staff/staff_orders.php?status=waiting&page=1";
}

if(isset($_POST["send"])){
    $sql_change_order_status = "UPDATE `orders` SET `status` = 'send' WHERE `order_id` = '$order_id'";
    $link = "Location: /Staff/staff_orders.php?status=approved&page=1";
}

if(!mysqli_stmt_prepare($stmt, $sql_change_order_status)){
    echo "problem sql_change_order_status in sql_change_order_status.php";
    exit();
} else {
    mysqli_stmt_execute($stmt);
}
header("$link");
exit();