<?php

if(isset($_POST["change_user_data"])){
    include_once "sql_connection.php";
    session_start();

    $user_id = $_SESSION["userId"];
    $new_data = mysqli_real_escape_string($conn, $_POST['new_data']);
    $current_password = $_POST["current_password"];
    $label_data = $_POST["data_to_change"];
    $data_to_change = '`'.$_POST["data_to_change"] . '`' . " = '$new_data'";
    $data_to_change_bg = $_POST["data_to_change_bg"];
    if($label_data == "password"){
        $data_to_change = "`password` = AES_ENCRYPT('".$new_data."','encPass')";
    }

    $sql_check_password = ("SELECT AES_DECRYPT(`password`,'encPass') FROM `users` WHERE `user_id` = '$user_id'");
    if(!mysqli_stmt_prepare($stmt, $sql_check_password)){
        echo "Problem selecting sql_check_password in change_user_data.php";
        exit;
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
           if($row["AES_DECRYPT(`password`,'encPass')"] !== $current_password){
                echo $row["AES_DECRYPT(`password`,'encPass')"];
                echo $current_password;
                header ("Location: /PHP_shop/user_data.php?pass=wrong");
                exit;
           }
        }
    }

    $sql_change_data = ("UPDATE `users` SET $data_to_change WHERE `user_id` = $user_id");
    echo $sql_change_data;
    if(!mysqli_stmt_prepare($stmt, $sql_change_data)){
        echo "Problem selecting sql_change_data in change_user_data.php";
        exit;
    } else {
        mysqli_stmt_execute($stmt);
        header ("Location: /PHP_shop/user_data.php?data=$label_data");
        exit;
    }
}
