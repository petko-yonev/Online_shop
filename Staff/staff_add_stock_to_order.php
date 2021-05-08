<?php
session_start();
if(isset($_POST["add_stock_to_order"])){
    $order_id = $_POST["order_id"];
    $_SESSION["add_to_order"] = $order_id;
    header("Location: /Staff/staff_index.php");
    exit;
}

if(isset($_POST["add_to_order_selected_stock"])){
    $stock_id = $_POST["stock_id"];
    $stock_type = $_POST["stock_type"];
    $quantity_order = $_POST["quantity_order"];
    $order_id = $_SESSION["add_to_order"];
    include_once "../PHP_shop/sql_connection.php";

    $sql_add_stock_to_order = "INSERT INTO `ordered_stock` (`order_id`, `stock`, `stock_id`, `quantity`)
    VALUES ('$order_id', '$stock_type', '$stock_id', '$quantity_order')";

    if(!mysqli_stmt_prepare($stmt, $sql_add_stock_to_order)){
        echo "Problem with sql_add_stock_to_order in staff_add_stock_to_order.php";
        exit;
    } else {
        mysqli_stmt_execute($stmt);

        $label_id = $stock_type . "_id";
        $sql_remove_quantity = "UPDATE `$stock_type` SET `quantity` = `quantity` - '$quantity_order' WHERE `$label_id` = '$stock_id'";
        echo $sql_remove_quantity;
        if(!mysqli_stmt_prepare($stmt, $sql_remove_quantity)){
            echo "Problem with sql_remove_quantity in staff_add_stock_to_order.php";
        } else {
            mysqli_stmt_execute($stmt);
        }
    }

    unset($_SESSION["add_to_order"]);
    header("Location: /Staff/staff_view_order.php?order_id=".$order_id."&status=waiting");
    exit;
}