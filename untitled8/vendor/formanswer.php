<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'club');

if (!$connect) {
    die('Error connect to DataBase');
}


$user = $_POST['user_id'];
$otziv = $_POST['otziv_id'];
$text = $_POST['text'];
$email = $_POST['email'];
var_dump($user, $otziv,$email,$text);
mysqli_query($connect, "INSERT INTO `answer` (`id`, `email`, `text`, `form_id`,`user_id`) VALUES (NULL, '$email', '$text', '$otziv', '$user')");

header('Location: ../personalinfoadmin.php');
