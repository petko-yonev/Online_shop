<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/CSS_shop/log_or_register.css">

    <title>Document</title>
</head>
<body>
    
<header>
<?php
    include_once "shop_header.php";
?>
</header>

<?php
if(isset($_GET["log_in"]) == true){
    echo'<div class = "container">
        <form action = "log_or_register_back_end.php" method = "POST">';
        if(isset($_GET["show_data"]) == "logInToSee"){
            echo'<div class = "log_to_see_data">Влезте в акаунта си за да променяте данните!</div>';
        }
        if(isset($_GET["data"]) == "repeat"){
            echo'
            <input class = "data_input_wrong" type = "email" name = "email" placeholder = "Грешен Имеил" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>
            <input class = "data_input_wrong" type = "password" name = "password" placeholder = "Грешна Парола" required>';
        } else {
            echo'
            <input class = "data_input" type = "email" name = "email" placeholder = "Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>
            <input class = "data_input" type = "password" name = "password" placeholder = "Парола" required>';
        }
            
            echo'<input class = "data_btn" type = "submit" name = "log_in" value = "Вход">
        </form>
        
        <div class = "swich_log_reg">Нямате акаунт
        <a href="log_or_register_front_end.php?register=true">Направете регистрация</a>
        </div>
    </div>';
}
if(isset($_GET["register"]) == true){
    echo'<div class = "container">
        <form action = "log_or_register_back_end.php" method = "POST">
            <input class = "data_input" type = "text" name = "first_name" placeholder = "Име" required pattern="^\S+$">
            <input class = "data_input" type = "text" name = "last_name" placeholder = "Фамилия" required pattern="^\S+$">
            <input class = "data_input" type = "number" name = "tel" placeholder = "Телефон" required>
            <input class = "data_input" type = "text" name = "town" placeholder = "Град" required">
            <input class = "data_input" type = "text" name = "deliver" placeholder = "Адрес на доставчик" required">';
            if(isset($_GET["taken"]) == true){
                echo'<input class = "data_input_wrong" type = "email" name = "email" placeholder = "Email - вече е зает" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>';
            } else {
                echo'<input class = "data_input" type = "email" name = "email" placeholder = "Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>';
            }
            echo'
            <input class = "data_input" type = "password" name = "password" placeholder = "Парола" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>';
            if(isset($_GET["pass"]) == "noMach"){
                echo'<input class = "data_input_wrong" type = "password" name = "repeat_password" placeholder = "Повторената парола не съвпада" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>';
            } else {
                echo'<input class = "data_input" type = "password" name = "repeat_password" placeholder = "Повтори паролата" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>';
            }
            echo'
            <input class = "data_btn" type = "submit" name = "register" value = "Регистрация">
        </form>
        <div class = "swich_log_reg">Имате вече регистрация
            <a href="log_or_register_front_end.php?log_in=true">Влизане в акаунт</a>
        </div>
    </div>';
}
?>
<footer>
<?php
    include_once "footer.php";
?> 
</footer>
</body>
</html>