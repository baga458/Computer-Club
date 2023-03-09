<?php


$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}

$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM `form` WHERE `form`.`id` = '$id'");
header('Location: ../personalinfoadmin.php');
