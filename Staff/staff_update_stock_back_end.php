<?php
if(isset($_POST["update_stock_in_shop_btn"])){  
    $stock = $_POST["stock"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $pic = $_POST["pic"];
    $info = $_POST["info"];
    $quantity = $_POST["quantity"];
    $promo = $_POST["promo"];

    $set_columns = "`name`, `price`, `pic`, `info`, `quantity`, `promo`";
    $values = "'$name', '$price', '$pic', '$info', '$quantity', '$promo'";

    include_once "../PHP_shop/sql_connection.php";
    $sql_stock_chars = ("SELECT * FROM `stock_chars` WHERE `stock` = '$stock'");
    if(!mysqli_stmt_prepare($stmt, $sql_stock_chars)){
            echo "Problem with sql_stock_chars in stock.php";
            exit;
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num_fields =  mysqli_num_fields($result);
            while($row = mysqli_fetch_assoc($result)){
                
                for($c = 1; $c < ($num_fields - 1)/3; $c++){
                    $char = "char_" . $c;
                    $char_bg = "char_bg_" . $c;
                    if(strlen($row[$char]) != 0){
                
                    $row_columns = $row[$char];
                    $posted_values = $_POST[$row[$char]];

                    $set_columns .= ",`$row_columns`";
                    $values .= ",'$posted_values'";
                }
            }  
        }
    }

    $sql_update = "INSERT INTO `$stock` ($set_columns) VALUES ($values)";
    if(!mysqli_stmt_prepare($stmt, $sql_update)){
        echo "Problem with sql_update in staff_update_stock_back_end.php";
        exit;
    } else {
        mysqli_stmt_execute($stmt);
        header ("Location: /Staff/staff_update_stock.php");
        exit();
    }
}