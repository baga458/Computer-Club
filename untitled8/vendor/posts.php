<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}

$id = $_POST['id'];
mysqli_query($connect,"DELETE FROM `posts` WHERE `posts`.`id` = '$id'");
header('Location: ../postsadmin.php');









