<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_staff/staff_view_stock_details.css">
    <title>Document</title>
</head>
<body>
<header>
    <?php
        include_once "staff_header.php";
    ?>
</header>

<?php


$stock_id = $_GET["stock_id"];
$stock = $_GET["stock"];

$sql_stock_chars = ("SELECT * FROM `stock_chars` WHERE `stock` = '$stock'");

$chars = array();
$chars_bg = array();
$units = array();

include_once "../PHP_shop/translate_rows.php";

//include_once "sql_connection.php";
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
            $unit = "units_" . $c;
                array_push($chars, $row[$char]);
                array_push($chars_bg, $row[$char_bg]);
                array_push($units, $row[$unit]);
        }

        
    }
}
//  View Mode

echo"<div class = 'view_stock_container'>";
       //$stock_id = $_POST["stock_id"];
        $stock_id_column = $stock . "_id";
        $sql_view_stock = "SELECT * FROM `$stock` WHERE `$stock_id_column` = '$stock_id'";

        if(!mysqli_stmt_prepare($stmt, $sql_view_stock)){
            echo "Problem with sql_view_stock in stock.php";
            exit();
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while($row = mysqli_fetch_assoc($result)){
                $stock_id = $row[$stock."_id"];
                $name = $row["name"];
                $price = $row["price"];
                $pic = $row["pic"];
                $info = $row["info"];
                $quantity = $row["quantity"];
                $promo = $row["promo"] / 100;
    
                echo '<h2>' .$name. '</h2>';
                echo '<img class="view_mode_stock_pic alt="PIC" src=../stock_images/'.$stock.'_images/' .$pic . '>';
                echo'<div class = "stock_info">';
                for($i = 0; $i < count($chars); $i++){
                    if(strlen($chars[$i]) != 0 && $chars[$i] !== "brand"){
                        if($i%2 == 0){
                            $info_line = "info_line_a";
                        } else {
                            $info_line = "info_line_b";
                        }
                        foreach ($translate_row as $k => $v) {
                            if($k == $row[$chars[$i]]){ 
                                $row[$chars[$i]] = $v;
                            }
                        }
                        echo'<div class = "'.$info_line.'" ><div class = "lables" >'.$chars_bg[$i].': </div>'.$row[$chars[$i]]. " " . $units[$i] .'</div>';
                    }
                }
                echo '<div class = "info_line_c" >'.$info.'</div>';
                if($promo == 0){
                    echo'<div class = "info_line_b" ><div class = "lables" >Цена: </div>'.$price.' лв.</div>';
                } else {
                    $promo_price =  $price - ($price * $promo);
                    echo'<div class = "info_line_b" ><div class = "lables" >Цена: </div>'.round($promo_price, 2).' лв.</div>';
                }
                if($quantity == 0){
                    echo'<div class = "info_line_a" >Не е в наличност!</div>';
                }
            echo'</div>';
            }
        }
echo "</div>";

?>
</body>
</html>