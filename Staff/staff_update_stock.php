<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_staff/staff_update_stock.css">

    <title>Document</title>
</head>
<body>

<header>
    <?php
        include_once "staff_header.php";
    ?>
</header>

<?php
$sql_select_stock_to_update = "SELECT `stock`, `stock_bg` FROM `stock_chars` ";

echo'<form action = "" class = "load_stock_form" method="POST">
        <label for = "stock">Зареди стока:</label>
        <select id = "stock" name = "stock" class = "stock_selection">
        <option name = "stock" value = ""></option>';
if(!mysqli_stmt_prepare($stmt, $sql_select_stock_to_update)){
    echo "Problem with sql_select_stock_to_update in staff_update_stock.php"; 
    exit;
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        $send_stock_and_stock_bg = $row["stock"] . "|" . $row["stock_bg"];
       echo'<option name = "stock" value = "'.$send_stock_and_stock_bg.'">'.$row["stock_bg"].'</option>';
    }
}
echo'</select>
   
    <input type = "submit" class = "load_stock_form_btn" value = "Зареди Форма">
</form>';

if(isset($_POST["stock"]) && strlen($_POST["stock"]) != 0){
    $stock =  $_POST["stock"];
    $stock_explode = explode('|', $stock);
    $stock = $stock_explode[0];
    $stock_bg = $stock_explode[1];
    echo'<div class = "stock_lable">Зареждане на: '.$stock_bg.'</div>';
    $sql_stock_chars = ("SELECT * FROM `stock_chars` WHERE `stock` = '$stock'");

    echo'<form class = "form_stock_chars" action = "staff_update_stock_back_end.php" method = "POST">
        <input class = "input_stock_char" type = "hidden" name = "stock" value = "'.$stock.'">
        <input class = "input_stock_char" type = "text" name = "name" placeholder = "Име" required>
        <input class = "input_stock_char" type = "number" name = "price" placeholder = "Цена" required>
        <input class = "input_stock_char" type = "text" name = "pic" placeholder = "Име на снимка с разширение" required>
        <input class = "input_stock_char" type = "text" name = "info" placeholder = "Информация" required>
        <input class = "input_stock_char" type = "number" name = "quantity" placeholder = "Брой" required>
        <input class = "input_stock_char" type = "number" name = "promo" placeholder = "Промоция в %" required>
        <div class = "char_split_first"></div>';
    
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
                        echo'<input class = "input_stock_char" type = "text" name = "'.$row[$char].'" placeholder = "'.$row[$char_bg].'" required>';
                        $sql_distinct_chars = "SELECT DISTINCT `$row[$char]` FROM `$stock` ORDER BY `$row[$char]` ASC;";
                        if(!mysqli_stmt_prepare($stmt, $sql_distinct_chars)){
                                echo "Problem with sql_distinct_chars in stock_filter.php";
                                exit();
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            echo "<div class = 'existing_chars'><div class = 'char_label'>Налични характеристики:</div>";
                            while($row_columns = mysqli_fetch_assoc($result)){
                                echo '<div class = "char_container">' . $row_columns[$row[$char]] .'</div>';
                            }
                            echo "<div class = 'right_border'></div></div><div class = 'char_split'></div>";
                        }
                }
            }  
        }
    }
    echo'<input type = "submit" name = "update_stock_in_shop_btn" value = "Зареди стока" class = "update_stock_in_shop_btn">
    </form>';
}
?>
</body>
</html>