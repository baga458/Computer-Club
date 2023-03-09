<?php
$connect = mysqli_connect('localhost', 'root', '', 'club');

if (!$connect) {
    die('Error connect to DataBase');
}

$title = $_POST['title'];
$text = $_POST['text'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];
mysqli_query($connect, "INSERT INTO `form` (`id`, `title`, `email`,`text`,`user_id`) VALUES (NULL, '$title','$email', '$text','$user_id')");
header('Location: ../formregistered.php');
