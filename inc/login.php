<?php

include "db.php";
session_start();


if(isset($_POST['login'])) {
    $userEmail = $_POST['email'];
    $password = $_POST['password'];

    $userEmailSecured = mysqli_real_escape_string($connection, $userEmail);
    $passwordSecured = mysqli_real_escape_string($connection, $password);

    $sql = "SELECT * FROM `users` WHERE `user_email` = '{$userEmailSecured}'";
    $login_query = mysqli_query($connection , $sql);

    if (!$login_query) {
        echo "error";
    } else {

        while($row = mysqli_fetch_assoc($login_query)){
            $db_user_id = $row['user_id'];
            $db_user_name = $row['user_name'];
            $db_user_password = $row['user_password'];
            $db_user_FName = $row['user_FName'];
            $db_user_LName = $row['user_LName'];
            $db_user_email = $row['user_email'];
            $db_user_img = $row['user_img'];
            $db_user_role = $row['user_role'];

        }//while


        if ($db_user_email == $userEmailSecured && $db_user_password == $passwordSecured) {

            $_SESSION['user_name'] = $db_user_name;
            $_SESSION['user_email'] = $db_user_email;
            $_SESSION['user_FName'] = $db_user_FName;
            $_SESSION['user_LName'] = $db_user_LName;
            $_SESSION['user_img'] = $db_user_img;
            $_SESSION['user_role'] = $db_user_role;

                header ("location:../admin/");
        } else {
            header ("location:../regester.php");
        }

        
    }

}//isset)login

?>
