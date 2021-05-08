<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_shop/order.css">

    <title>Document</title>
</head>
<body>

<header>
<?php
    include_once "shop_header.php";
?>
</header>

<?php
$first_name = "";
$last_name = "";
$tel = "";
$town = "";
$deliver = "";
if(isset($_POST["order"])){
    if(isset($_SESSION["userId"])){

        $user_id = $_SESSION["userId"];
        $sql_insert_user_data = ("SELECT * FROM `users` WHERE `user_id` = '$user_id'");
        if(!mysqli_stmt_prepare($stmt, $sql_insert_user_data)){
            echo "Problem sql_insert_user_data in order.php";
            exit;
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)){
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $tel = $row["tel"];
                $town = $row["town"];
                $deliver = $row["deliver"];
            }
        }
    }
    echo'<form class = "order" action="send_order.php" method = "POST">
    <input class = "order_info" type="text" name = "first_name" placeholder = "Първо Име" maxlength="30" value = "'.$first_name.'" required>
    <input class = "order_info" type="text" name = "last_name" placeholder = "Последно Име" maxlength="30" value = "'.$last_name.'" required>
    <input class = "order_info" type="tel" name = "tel" placeholder = "Телефон - формат: 0123456789" pattern="[0-9]{10}" value = "'.$tel.'" required>
    <input class = "order_info" type="text" name = "town" placeholder = "Град" maxlength="30" value = "'.$town.'" required>
    <input class = "order_info" type="text" name = "deliver" placeholder = "Адрес на доставчик" maxlength="50" value = "'.$deliver.'" required>
    <input class = "order_info_btn" type="submit" name = "send_order" value = "Поръчай">
</form>';
} else {
    echo "Няма продукти";
}

?>
<footer>
<?php
    include_once "footer.php";
?> 
</footer>
</body>
</html>