<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style for the cart -->
    <link rel="stylesheet" type="text/css" href="/CSS_shop/cart.css">
    <title>Document</title>
</head>
<body>

<header>
<?php
    include_once "shop_header.php";
?>
</header>

<?php
echo'<div class = "view_cart_container">
        <div class = "your_cart"><lable class = "your_cart_lable">Вашата количка</lable></div>
            <div class = "scroll_top_table">
                <table class = "cart_top_table">
                    <tr class = "cart_tr">
                        <td class = "cart_td_pic"></td>
                            <td class = "cart_td_name">Име на продукта</td>
                            <td class = "cart_td_quantity">Брой</td>
                            <td class = "cart_td_price">Ед. Цена</td>
                            <td class = "cart_td_price">Цена</td>
                            <td class = "cart_td_price"></td>
                    </tr>
                </table>
    </div>

<div class = "scroll_table">
    <table class = "cart_table">';

        // empty string to hold the number of stock in the cart
        $stock_count = 0;
        $all_price = 0;
        if(isset($_SESSION)){
            foreach($_SESSION as $key => $value){
                if (strpos($key, '_No_') !== false) {

                    // add 1 value for every item in the cart
                    $stock_count++;

                    //stock type / table in db
                    $stock = strstr($key, '_No_', true);

                    //id on stock
                    $id = strstr($key, '_No_', false);
                    $id = substr($id, 4);

                    //id column in db
                    $id_column = $stock . "_id";

                    //quantity ordered
                    $quantity = $value;

                    $sql_cart = ("SELECT `name`, `pic`, `price`, `promo` FROM `$stock` WHERE `$id_column` = '$id'");
                    if(!mysqli_stmt_prepare($stmt, $sql_cart)){
                        echo "Problem with sql_cart in cart.php";
                        exit();
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
        
                        while($row = mysqli_fetch_assoc($result)){
                            $name = $row["name"];
                            $pic = $row["pic"];
                            $price = $row["price"];
                            $promo = $row["promo"] / 100;
                            $whole_stock_price = $price * $quantity;
                            echo'<tr class = "cart_tr">
                                    <td class = "cart_td_pic"><img class="cart_stock_pic alt="PIC" src=../stock_images/'.$stock.'_images/' .$pic . '></td>
                                    <td class = "cart_td_name">'.$name.'</td>
                                    <td class = "cart_td_quantity">'.$quantity.' бр.</td>';
                                    if($promo != 0){
                                        $promo_price =  $price - ($price * $promo);
                                        $whole_stock_price = $promo_price * $quantity;
                                        $all_price += $whole_stock_price;
                                        echo '<td class = "cart_td_price">'.round($promo_price, 2).' лв.</td>';
                                    } else {
                                        $all_price += $whole_stock_price;
                                        echo '<td class = "cart_td_price">'.$price.' лв.</td>';
                                    }
                               echo'<td class = "cart_td_price">'.number_format($whole_stock_price, 2).' лв.</td>
                                    <td class = "cart_td_price">
                                        <form action = "remove_from_cart.php" method = "POST">
                                            <input type = "hidden" name = "stock_to_remove" value = "'.$key.'">
                                            <input class = "quantity_to_remove_selector" type = "number" name = "quantity_to_remove" value = "1" min = "1" max = "'.$quantity.'">
                                            <input class = "remove_quantity_btn" type = "submit" name = "remove_quantity" value = "X">
                                        </form>
                                    </td>
                                </tr>';
                        }
                    }
                }    
            }
        }
echo'</table>
</div>';

if($stock_count == 0){
    echo '<div class = "empty_cart">Количката е празна!</div>';
} else {
echo'
    <div class = "send_clear_container">
        <div class = "all_price">Обща сума: '.number_format($all_price, 2).' лв.</div>

        
        <form class = "send_order" action = "order.php" method = "POST">
            <input class = "send_order_btn" type = "submit" name = "order" value = "Поръчай">
        </form>

        <form class = "clear_cart" action = "remove_from_cart.php" method = "POST">
            <input class = "claer_cart_btn" type = "submit" name = "clear_cart" value = "Изчисти количката">
        </form>
    </div>';
}

?>  
</div>
<div class = "cart_bottom_space"></div>
<footer>
<?php
    include_once "footer.php";
?> 
</footer>
</body>
</html>