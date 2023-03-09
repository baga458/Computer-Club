<?php
    session_start();

    $connect = mysqli_connect('localhost', 'root', '', 'club');
    if (!$connect) {
        die('Error connect to DataBase');
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect,"SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");


    if (mysqli_num_rows($check_user)>0 && $email === 'admin@gmail.com' && $password === 'adminadmin'){
        $user=mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['name'],
            "email" => $user['email'],
            "login" => $user['login'],
            "password" => $user['password']
        ];
        header('Location: ../indexadmin.php');
    }elseif(mysqli_num_rows($check_user)>0){
        $user=mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['name'],
            "email" => $user['email'],
            "login" => $user['login'],
            "password" => $user['password']
        ];
        header('Location: ../registeredindex.php');
    }else{
        $_SESSION['message'] = 'не верная почта или пароль';
        header('Location: ../login.php');
    }
?>
