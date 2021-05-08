<?php

if(isset($_POST["register"])){
    include_once "sql_connection.php";

    $first_name =  $_POST['first_name'];
    $last_name =  $_POST['last_name'];
    $tel =  $_POST['tel'];
    $town =  $_POST['town'];
    $deliver =  $_POST['deliver'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $repeat_password =  $_POST['repeat_password'];

    //chech if the email is staff (staff acc cannot be made with reg form)
    if(strpos($email, "@5tech.com") !== false){
        header ("Location: ../index.php");
        exit();
    }

    //  Check Email if it`s already taken
    $sql_check_user_email = "SELECT `email` FROM `users` WHERE `email` = '$email'";

    if(!mysqli_stmt_prepare($stmt, $sql_check_user_email)){
        echo "Problem check User Email";
    } else {
        mysqli_stmt_execute($stmt);
        $result_CheckUsernameEmail = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result_CheckUsernameEmail)){
            if ($email === $row['email']){
                header("Location: log_or_register_front_end.php?register=true&taken=true");
                exit();
            } 
        } 
    }

    //  Check if repeat password mach
    if( $password !== $repeat_password){
        header("Location: log_or_register_front_end.php?register=true&pass=noMach");
        exit();
    }


    // SQL query for inserting user data
    $sql_user = "INSERT INTO `users` (`first_name`, `last_name`, `tel`, `town`, `deliver`, `email`, `password`) VALUES ('$first_name', '$last_name', '$tel', '$town', '$deliver', '$email', AES_ENCRYPT('$password', 'encPass'))";
    echo $sql_user;
    if(!mysqli_stmt_prepare($stmt, $sql_user)){
        echo "Problem sql_user in log_or_reg_back_end";
        exit;
    } else {
            mysqli_stmt_execute($stmt);
    }

    //Session start
    $sql_user_id = "SELECT `user_id` FROM `users` WHERE `email` =  '$email'";
    if(!mysqli_stmt_prepare($stmt, $sql_user_id)){
        echo "Problem sql_user_id in log_or_register_front_end.php";
    } else {
        mysqli_stmt_execute($stmt);
        $result_CheckUsernameId = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result_CheckUsernameId)){
            
            //Session start and setting userId and session lifetime
            session_start();
            $_SESSION["userId"] = $row['user_id'];
            $_SESSION["lifetime"] = time();
            header ("Location: ../index.php");
            exit();
        } 
    }
}

//log in
if(isset($_POST["log_in"])){
    include_once "sql_connection.php";
    $password =  $_POST["password"];
    $email =  $_POST["email"];

    if(strpos($email, "@5tech.com") !== false){
        $sql_login = ("SELECT `user_id`,`email`, AES_DECRYPT(`password`,'encPass') FROM `admins` WHERE email = '$email' AND AES_DECRYPT(`password`,'encPass') = '$password'");
    } else {
        $sql_login = ("SELECT `user_id`,`email`, AES_DECRYPT(`password`,'encPass') FROM `users`  WHERE email = '$email' AND AES_DECRYPT(`password`,'encPass') = '$password'");
    }

    if(!mysqli_stmt_prepare($stmt, $sql_login)){
        echo "Problem selecting sql_login in log_or_register_back_end.php";
        exit;
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result)){

            //Session start and setting userId and session lifetime
            session_start();
            $_SESSION["lifetime"] = time();
            if(strpos($email, "@5tech.com") !== false){
                $_SESSION["adminUser"] = $row['user_id'];
                header ("Location: ../Staff/staff_index.php");
                exit();
            } 
            $_SESSION["userId"] = $row['user_id'];
            header ("Location: ../index.php");
            exit();
        } 
    } 
}
header("location: log_or_register_front_end.php?log_in=true&data=repeat");
