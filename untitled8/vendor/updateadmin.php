<?php
session_start();


$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}
$id = $_POST['id'];
$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($connect,"UPDATE `users` SET `login` = '$login', `email` = '$email', `password` = '$password', `name` = '$name' WHERE `users`.`id` = '$id'");
header('Location: ../personalinfoadmin.php');