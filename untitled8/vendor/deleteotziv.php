<?php


$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}

$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM `otziv` WHERE `otziv`.`id` = '$id'");
header('Location: ../adminotziv.php');
