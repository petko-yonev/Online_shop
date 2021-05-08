<?php
include_once "../PHP_shop/sql_connection.php";
$order_id = $_POST["order_id"];
$ordered_stock = $_POST["ordered_stock"];
$ordered_stock_id = $_POST["ordered_stock_id"];
$quantity_ordered = $_POST["quantity_ordered"];
$quantity_to_remove = $_POST["quantity_to_remove"];

if(isset($_POST["remove_quantity"])){
    $result_quantity = $quantity_ordered - $quantity_to_remove;

    if($quantity_to_remove == $quantity_ordered){
        $sql_change_stock_from_order = "DELETE FROM `ordered_stock` 
        WHERE `order_id` = '$order_id' AND `stock` = '$ordered_stock' AND `stock_id` = '$ordered_stock_id' AND `quantity` = '$quantity_ordered'";
    } else {
        $sql_change_stock_from_order = "UPDATE `ordered_stock` SET `quantity` = '$result_quantity'
        WHERE `order_id` = '$order_id' AND `stock` = '$ordered_stock' AND `stock_id` = '$ordered_stock_id' AND `quantity` = '$quantity_ordered'";
    }
    if(!mysqli_stmt_prepare($stmt, $sql_change_stock_from_order)){
        echo "problem sql_change_stock_from_order in staff_removo_stock_from_order.php";
        exit();
    } else {
        mysqli_stmt_execute($stmt);
    }
    $label_id = $ordered_stock . "_id";
    $sql_remove_quantity = "UPDATE `$ordered_stock` SET `quantity` = `quantity` + '$quantity_to_remove' WHERE `$label_id` = '$ordered_stock_id'";
    if(!mysqli_stmt_prepare($stmt, $sql_remove_quantity)){
        echo "Problem with sql_remove_quantity";
    } else {
        mysqli_stmt_execute($stmt);
    }
    
}

if(isset($_POST["add_quantity"])){
    $result_quantity = $quantity_ordered + $quantity_to_remove;

    $sql_change_stock_from_order = "UPDATE `ordered_stock` SET `quantity` = '$result_quantity'
        WHERE `order_id` = '$order_id' AND `stock` = '$ordered_stock' AND `stock_id` = '$ordered_stock_id' AND `quantity` = '$quantity_ordered'";
    if(!mysqli_stmt_prepare($stmt, $sql_change_stock_from_order)){
        echo "problem sql_change_stock_from_order in staff_removo_stock_from_order.php";
        exit();
    } else {
        mysqli_stmt_execute($stmt);  
    }
    $label_id = $ordered_stock . "_id";
    $sql_remove_quantity = "UPDATE `$ordered_stock` SET `quantity` = `quantity` - '$quantity_to_remove' WHERE `$label_id` = '$ordered_stock_id'";
    if(!mysqli_stmt_prepare($stmt, $sql_remove_quantity)){
        echo "Problem with sql_remove_quantity";
    } else {
        mysqli_stmt_execute($stmt);
    }
}
header("Location: /Staff/staff_view_order.php?order_id=$order_id&status=waiting");
exit();