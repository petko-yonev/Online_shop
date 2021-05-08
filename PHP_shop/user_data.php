<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_shop/user_data.css">

    <title>Document</title>
</head>
<body>

<header>
<?php
    include_once "shop_header.php";
?>
</header>

<?php
$data = array("first_name", "last_name", "tel", "town", "deliver", "email", "password");
$data_bg = array("Име", "Фамилия", "Телефон", "Град", "Адрес на доставчик", "Имеил", "Парола");

echo'<form class = "form_select_data" action="/PHP_shop/user_data.php" method = "POST">';
for($d = 0; $d < count($data); $d++){
    echo'<input class = "select_data" type = "submit" name = "'.$data[$d].'" value = "'.$data_bg[$d].'">';
}
echo'</form>';

if(isset($_GET["pass"]) == "wrong"){
    echo'<div class = "wrong_pass"> Грешна парола!</div>';
}
if(isset($_GET["data"])){
    for($c = 0; $c < count($data); $c++){
        if($data[$c] == $_GET["data"]){
            echo'<div class = "change_successful"> Успешна промяна на: '.$data_bg[$c].'</div>';
        }
    }
}
foreach ($_POST as $key => $value) {

    $user_id = $_SESSION["userId"];
    $sql_take_user_data= ("SELECT `$key` FROM `users` WHERE `user_id` = $user_id");

    if(!mysqli_stmt_prepare($stmt, $sql_take_user_data)){
        echo "Problem with sql_take_user_data in user_data.php";
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            if($key !== "password"){
                echo'<div class = "currend_data">Промяна на: '.$value.'<br>Настоящи данни: '.$row[$key].'</div>';
            } else {
                echo'<div class = "currend_data">Промяна на: '.$value.'</div>';
            }
            echo'<form class = "form_new_data" action = "change_user_data.php" method = "POST">';
                if($key == "tel"){
                    echo'<input class = "new_data" type = "number" name = "new_data" placeholder = "Нов телефон" required>';
                } else if($key == "password"){
                    echo'<div> Мин. 8 символа и поне 1 малка, 1 главна буква и 1 цифра</div>
                    <input class = "new_data" type = "password" name = "new_data" placeholder = "Нова парола" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>';
                } else if($key == "email"){
                    echo'<input class = "new_data" type = "email" name = "new_data" placeholder = "Нов имеил | Формат: test@test.test" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>';
                } else {
                    echo'<input class = "new_data" type = "text" name = "new_data" placeholder = "Нови данни" pattern="^\S+$" required>';
                }
            echo' 
                <input type = "hidden" name = "data_to_change" value = "'.$key.'">
                <input type = "hidden" name = "data_to_change_bg" value = "'.$value.'">
                <input class = "new_data" type = "password" name = "current_password" placeholder = "Въведете настояща парола" required>
                <input class = "new_data_btn" type = "submit" name = "change_user_data" value = "Промени данните">
            </form>';
        }
        }
 }
?>
<footer>
<?php
    include_once "footer.php";
?> 
</footer>
</body>
</html>

