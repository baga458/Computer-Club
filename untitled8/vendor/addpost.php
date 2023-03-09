<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '', 'club');

if (!$connect) {
    die('Error connect to DataBase');
}

$title = $_POST['title'];
$text = $_POST['text'];

$path = '../uploads/' .time() .$_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], $path);
mysqli_query($connect, "INSERT INTO `posts` (`id`, `title`, `img`,`text`) VALUES (NULL, '$title','$path', '$text')");
header('Location: ../postsadmin.php');

?>

