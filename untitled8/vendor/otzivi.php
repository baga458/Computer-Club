<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '', 'club');

if (!$connect) {
    die('Error connect to DataBase');
}

$login = $_POST['login'];
$text = $_POST['text'];

$path = '../uploads/' .time() .$_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], $path);
mysqli_query($connect, "INSERT INTO `otziv` (`id`, `login`, `text`) VALUES (NULL, '$login', '$text')");
header('Location: ../otziv.php');

?>