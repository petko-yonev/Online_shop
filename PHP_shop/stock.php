<?php
$page_num = $_GET["page"];
$stock_on_page = 20;
$stock = $_GET["stock"];
$stock_id = $stock . "_id";
$result_on_page = ($page_num - 1) * $stock_on_page;
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$url_filter_param = str_replace("http://localhost/PHP_shop/stock.php?stock=$stock&page=$page_num", "", $url);

$chars = array();
$chars_bg = array();
$units = array();

include_once "translate_rows.php";

$sql_stock_chars = ("SELECT * FROM `stock_chars` WHERE `stock` = '$stock'");

include_once "sql_connection.php";
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
//Create filter
include_once "filter.php";

// Display filtered stock
if(!mysqli_stmt_prepare($stmt, $show_stock_sql)){
    echo "Problem with show_stock_sql in stock.php";
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 0) { 
        echo "<div class = 'no_results'>Няма намерени резултати.</div>";
        } 
    echo '<table class = "stock_table">';
    while($row = mysqli_fetch_assoc($result)){
        
        $stock_id = $row[$stock."_id"];
        $name = $row["name"];
        $price = $row["price"];
        $pic = $row["pic"];
        $quantity = $row["quantity"];
        $promo = $row["promo"] / 100;

        echo'<tr class = "stock_tr" id = "'.$stock_id.'">';
        if ($quantity == 0 ){;
            echo'   <td class = "stock_td"><div class = "quantity_none">X</div>Не е в наличност</td>';
        } else if ($quantity <= 10){
            echo'   <td class = "stock_td"><div class = "quantity_few">!</div>Налични: '.$quantity.' бр.</td>';
        } else {
            echo'   <td class = "stock_td"><div class = "quantity_enough"></div>В наличност</td>';
        }
        echo'<td class = "stock_td"><h4>' .$name. '</h4></td>';
        echo'<td class = "stock_td"><img class="stock_pic alt="PIC" src=../stock_images/'.$stock.'_images/' .$pic . '></td>';

        for($i = 0; $i < count($chars); $i++){
            if(strlen($chars[$i]) != 0 && $chars[$i] !== "brand"){
                foreach ($translate_row as $k => $v) {
                    $row[$chars[$i]] = str_replace(' ', '', $row[$chars[$i]]);
                    if($k == $row[$chars[$i]]){ 
                        $row[$chars[$i]] = $v;
                    }
                }
                echo'<td class = "stock_td"><p class = "name_td">'.$chars_bg[$i].': </p>'.$row[$chars[$i]]. " " . $units[$i] .'</td>';
            }
        }
        if($promo != 0){
            $promo_price =  $price - ($price * $promo);
            echo'<td class = "last_td">
                    <span class = "line-through"><span class = "last_td_before_promo">'.$price.'лв.</span></span>
                    <div class = "last_td_after_promo">'.round($promo_price, 2).'<span class="lable_lv">лв.</span></div>

                    <form action = "" method = "POST" class = "add_to_cart">
                        <input type = "hidden" name = "stock_id" value = "'.$stock_id.'">
                        <input type = "hidden" name = "view_mode_btn">
                        <input class = "view_mode_btn" name = "view_mode_btn" type="image" src="../Images/eye.png" alt="SEE" />
                    </form>
                </td></tr>';
        } else {
        echo'<td class = "last_td">
                <div class = "last_td_no_promo">'.$price.'<span class="lable_lv">лв.</span></div>

                <form action = "" method = "POST" class = "add_to_cart">
                    <input type = "hidden" name = "stock_id" value = "'.$stock_id.'">
                    <input type = "hidden" name = "view_mode_btn">
                    <input class = "view_mode_btn" name = "view_mode_btn" type="image" src="../Images/eye.png" alt="SEE" />
                </form>
            </td></tr>';
        }
    } 
echo '</table>';
}

    //Pagination
//save the filter param as string in differant var because $url_filter_param get pushed in array so differant filters can get counted
$label_id = $stock . "_id";
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$url_filter_param_after_page =  str_replace("http://localhost/PHP_shop/$stock.php?stock=$stock&page=$page_num", "", $url);

include_once "pagination.php";

//  View Mode
if(isset($_POST["view_mode_btn"])){
    echo"<div class = 'view_mode_stock_display'>
    <div class = 'view_stock_container'>";
        $stock_id = $_POST["stock_id"];
        $stock_id_column = $stock . "_id";
        $sql_view_stock = "SELECT * FROM `$stock` WHERE `$stock_id_column` = '$stock_id'";

        echo '<form action = "" method = "POST">
            <input class = "close_view_mode_stock_btn" type = "submit" value = "X">
        </form>';
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
                if($quantity != 0){
                    echo'<form class = "info_line_a" action = "" method = "POST">
                            <input type = "hidden" name="stock_id" id = "stock_id" value="'.$stock_id.'">
                            <input type = "hidden" name="stock_type" id = "stock_type" value="'.$stock.'">
                            <input class = "quantity_order" name = "quantity_order" id = "quantity_order" type="number" value="1" min="1" max="'.$quantity.'">
                            <input class = "add_to_cart_btn_view_mode" name = "add_to_cart" type="submit" value= "Добави в Количката">
                        </form>';
                } else {
                    echo'<div class = "info_line_a" >Не е в наличност!</div>';
                }
            echo'</div>';
            }
        }
echo "</div></div>";
}
?>
<footer>
<?php
    include_once "footer.php";
?> 
</footer>
</body>
</html>