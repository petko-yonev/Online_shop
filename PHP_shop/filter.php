<?php
if(isset($_POST["add_to_cart"])){
    $add_to_cart_stock =  $_POST["stock_type"] . "_No_" . $_POST["stock_id"];
    $add_to_cart_quantity = $_POST["quantity_order"];

    if(!isset($_SESSION)){
        session_start();
    }
    $_SESSION["lifetime"] = time();
    $_SESSION[$add_to_cart_stock] = $add_to_cart_quantity;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- style for the ledr filter of the stock -->
<link rel="stylesheet" type="text/css" href="/CSS_shop/stock_filter.css">

<!-- style for table to display stock -->
<link rel="stylesheet" type="text/css" href="/CSS_shop/stock.css">

<!-- JS for changing prices -->
<script src="../JavaScript/shop_stock.js" defer></script>

<title>Document</title>
</head>
<body>

<header>
<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION["adminUser"])){
    include_once "../Staff/staff_header.php";
} else {
   include_once "shop_header.php";
}

?>
</header>
<?php

echo "<nav class = 'shop_left_nav'>";

// //Search filter

if(isset($_POST["search_stock"])){
    $search_bar_placeholder = $_POST["search_stock"];
} else {
    $search_bar_placeholder = "Търсене";
} 
echo "<ul class = 'shop_left_nav_ul'><p class = 'ul_title'>Търсене</p>";  
    echo'<li>
    <!--Search bar  -->
    <form class="search_bar" action = "" method = "POST">
        <input type="submit" class="input_field_btn"  value="`">
        <input type="text" class="input_field" name = "search_stock" placeholder="'.$search_bar_placeholder.'">
        <input type="submit" class="clear_field_btn"  value="X">
    </form>
    </li>
</ul>';

//Quantity filter
    echo "<ul class = 'shop_left_nav_ul'><p class = 'ul_title'>Наличност</p>";  
        if(strpos($url,"&available=true")){
            $url_remove =  str_replace("&available=true", "", $url);
            $url_remove = str_replace("&page=$page_num", "&page=1", $url_remove);
            echo"<li class = 'shop_left_nav_li_selected'>
                    <form method = 'POST' action = '".$url_remove."'>
                        <input class = 'input_btn_pressed' type = 'submit' value = 'Налични'>
                    </form>
                </li>";
        } else {
            $url = str_replace("&page=$page_num", "&page=1", $url);
            echo"<li class = 'shop_left_nav_li' >
                    <form method = 'POST' action = '".$url."&available=true'>
                        <input class = 'input_btn' type = 'submit' value = 'Налични'>
                    </form>
                </li>";
        }
    echo "</ul>";

//Price filter
echo"<ul class = 'shop_left_nav_ul'><p class = 'ul_title'>Цена</p>";  
        //Promo price only
    if(strpos($url,"&promo=true")){
        $url_remove =  str_replace("&promo=true", "", $url);
        $url_remove = str_replace("&page=$page_num", "&page=1", $url_remove);
        echo"<li class = 'shop_left_nav_li_selected'>
                <form method = 'POST' action = '".$url_remove."'>
                    <input class = 'input_btn_pressed' type = 'submit' value = 'На Промоция'>
                </form>
            </li>";
    } else {
        $url = str_replace("&page=$page_num", "&page=1", $url);
        echo"<li class = 'shop_left_nav_li' >
                <form method = 'POST' action = '".$url."&promo=true'>
                    <input class = 'input_btn' type = 'submit' value = 'На Промоция'>
                </form>
            </li>";
    }
    // Set min max price
    $sql_min_price = "SELECT MIN(price) as `min_price`, MAX(price) as `max_price` FROM `$stock`";
    if(!mysqli_stmt_prepare($stmt, $sql_min_price)){
        echo "Problem with sql_min_price in periphery_filter.php";
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            $min_price = $row["min_price"];
            $max_price = $row["max_price"];

            if(isset($_POST["min_price"])){
                $min_price = $_POST["min_price"];
            }
            if(isset($_POST["max_price"])){
                $max_price = $_POST["max_price"];
    }
            echo '
            <form action="" method="POST" id="price_range">
            <lable>От: <lable><lable id="min_price">'.$min_price.'</lable> лв.<br>
            <input class = "range" type="range" min="'.$row["min_price"].'" max="'.$row["max_price"].'" value="'.$min_price.'" name = "min_price" id="min_price_range" oninput="updateMin(this.value)" onmouseup="change_price()"><br>
            <lable>До: <lable><lable id="max_price">'.$max_price.'</lable> лв.<br>
            <input class = "range"  type="range" min="'.$row["min_price"].'" max="'.$row["max_price"].'" value="'.$max_price.'" name = "max_price" id="max_price_range" oninput="updateMax(this.value)" onmouseup="change_price()"><br>
            </form>';
        }
    }
echo"</ul>";

// All other filter
for($i = 0; $i < count($chars); $i++){
    if(strlen($chars[$i]) != 0){
        $sql_distinct_chars = "SELECT DISTINCT `$chars[$i]` FROM `$stock` ORDER BY `$chars[$i]` ASC;";
        if(!mysqli_stmt_prepare($stmt, $sql_distinct_chars)){
                echo "Problem with sql_distinct_chars in stock_filter.php";
                exit();
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            echo "<ul class = 'shop_left_nav_ul'><p class = 'ul_title'>".$chars_bg[$i]."</p>";
            while($row = mysqli_fetch_assoc($result)){
                $distinct_row =  $row[$chars[$i]];
                $url_parameter = "&".$chars[$i]."=";

                foreach ($translate_row as $k => $v) {
                    if($k == $distinct_row){ 
                        $distinct_row = $v;
                    }
                }
                if(strpos($url, $url_parameter.$row[$chars[$i]])){
                    $url_remove =  str_replace($url_parameter.$row[$chars[$i]], "", $url);
                    $url_remove = str_replace("&page=$page_num", "&page=1", $url_remove);
                    echo"<li class = 'shop_left_nav_li_selected'>
                            <form method = 'POST' action = '".$url_remove."'>
                                <input class = 'input_btn_pressed' type = 'submit' value = '".$distinct_row. " " .$units[$i]."'>
                            </form>
                        </li>";
                } else {
                    $url = str_replace("&page=$page_num", "&page=1", $url);
                    echo"<li class = 'shop_left_nav_li' >
                            <form method = 'POST' action = '".$url.$url_parameter.$row[$chars[$i]]."'>
                                <input class = 'input_btn' type = 'submit' value = '".$distinct_row. " " .$units[$i]."'>
                            </form>
                        </li>";
                }
            }
        echo "</ul>";
        }
    }
}
echo "</nav>";
//Make an empty array that will hold the number of differant types of filters - brand, color (2 types) etc.
$counter = array();

//strings for sql WHERE clause
$filter_holder = "";
$quantity_holder = "`quantity` >= '0'";
$promo_filter = "`promo` >= '0'";

//If there is a avaliable set quantity over 10, push the `quantity` type of filter in counter array and remove the url parameter
if(isset($_GET["available"])){
    $quantity_holder = "`quantity` > '0'";
    array_push($counter, "quantity");
    $url_filter_param = str_replace("&available=true" ,"",$url_filter_param) ;
}

//If there is a promo set , push the `promo` type of filter in counter array and remove the url parameter
if(isset($_GET["promo"])){
    $promo_filter = "`promo` > '0'";
    array_push($counter, "promo");
    $url_filter_param = str_replace("&promo=true" ,"",$url_filter_param) ;
}

//Take the current url and make an array with differant index based on the number of & symbols
$url_filter_param = array_filter( explode("&", $url_filter_param ));

//Take the number of differant types of filters and make an empty string fo every one
for($i = 0; $i < count($chars); $i++){
    ${$chars[$i]."_filter"} = "";
}

//Make a loop that will make of every parameter in url 2 pices A 'key' and a 'value' (color = red) and will push only the key (color) 
for($i = 1; $i <= count($url_filter_param); $i++){
    $filter_key = strstr($url_filter_param[$i], "=", true);
    $filter_value = strstr($url_filter_param[$i], "=", false);
    $filter_value = substr($filter_value, 1);

    array_push($counter, $filter_key);
}

//Loop that basen ot the number of unique 'keys' in url will make a filter
for($i = 1; $i <= count($url_filter_param); $i++){

$filter_key = strstr($url_filter_param[$i], "=", true);
$filter_value = strstr($url_filter_param[$i], "=", false);
$filter_value = substr($filter_value, 1);

    // if there is only ont type of filter will create a simple filter wile WHERE clor = red AND color = black
    if(count(array_count_values($counter)) == 1){
        if(empty($filter_holder)){
            $filter_holder .= str_replace("=", "='", $url_filter_param[$i]) . "'";
        } else {
            $filter_holder .= " OR " .str_replace("=", "='", $url_filter_param[$i]) . "'";
        }
    // If there are more than one unique key parameters (brand, color) etc will fill the already created empty strings the value of every parameter
    } else {
        for($a = 0; $a < count($chars); $a++){
            if($chars[$a] === $filter_key){
                ${$chars[$a]."_filter"} .= "'" .$filter_value . "',";
            }
        }
    }
}
//Loop that will make a final filter string based on the NONE epmty strings with differant values and make a WHERE color IN (red, black..) clause
for($i = 0; $i < count($chars); $i++){
    if(!empty(${$chars[$i]."_filter"})){
        $removed_last_comma = substr_replace(${$chars[$i]."_filter"} ,"",-1) ;
        $filter_holder .= "`" .$chars[$i]. "` IN ( " .$removed_last_comma. " ) AND";
    }
}
//Check if there are more than one unique values and remove the last AND
if(count(array_count_values($counter)) !== 1){
    $filter_holder = substr_replace($filter_holder ,"",-3) ;
}
//Set min default min and max price and redefine them if there are user inputs and calculate promo if there is 
$min_stock_price ="`price` - (`price` * (`promo`/'100')) >=". 0;
$max_stock_price ="`price` - (`price` * (`promo`/'100')) <=". 100000;
if(isset($_POST["min_price"])){
    $min_stock_price = "`price` - (`price` * (`promo`/'100')) >=". $_POST["min_price"];  
}
if(isset($_POST["max_price"])){
    $max_stock_price = "`price` - (`price` * (`promo`/'100')) <=".$_POST["max_price"];
}

//Search bar input change the valuw of search_name
$search_name = "`name` LIKE '%%'";
if(isset( $_POST["search_stock"])){
    $search_name = "`name` LIKE '%".$_POST["search_stock"]."%'";
}

//Make an order var to be added seperatly from the filter because the filter is used in pagination and there must not have a LIMIT
$order_by = "ORDER BY `$stock_id` LIMIT ". $result_on_page . ',' . $stock_on_page;

//check if there is a special filter
if(!$url_filter_param ){
    $filter =" $quantity_holder AND $min_stock_price AND $max_stock_price AND $search_name AND $promo_filter " ;
} else {
    $filter =" $quantity_holder AND $filter_holder AND $min_stock_price AND $max_stock_price AND $search_name AND $promo_filter " ;
}

//create a sql query for showing the filtered stock
$show_stock_sql = "SELECT * FROM `$stock` WHERE $filter" .$order_by;

//echo $show_stock_sql;
