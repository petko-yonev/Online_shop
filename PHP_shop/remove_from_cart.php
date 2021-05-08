<?php
session_start();
    if(isset($_POST["remove_quantity"])){
        $stock_to_remove =  $_POST["stock_to_remove"];
        $quantity_to_remove = $_POST["quantity_to_remove"];
        $new_quantity = $_SESSION[$stock_to_remove] - $quantity_to_remove;
        $_SESSION[$stock_to_remove] = $new_quantity;
        if($_SESSION[$stock_to_remove] <= 0){
            unset($_SESSION[$stock_to_remove]);
        }
    }

    if(isset($_POST["clear_cart"])){
        foreach($_SESSION as $key => $value){
            if (strpos($key, '_No_') !== false) {
                unset($_SESSION[$key]);
            }
        }
    }
    header("Location: cart.php");
    exit;
?>