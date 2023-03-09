<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '', 'club');

if (!$connect) {
    die('Error connect to DataBase');
}

$login = $_POST['login'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];


if ($password === $password_confirm){
    mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`, `name`) VALUES (NULL, '$login', '$email', '$password', '$full_name')");
    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../personalinfoadmin.php');
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../personalinfoadmin.php');
}
?>