<?php
session_start();


$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}
$id = $_GET['id'];
$user_id = $_POST['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="main.css">
    <title>главная страница</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-bottom: 2rem">
    <div class="container-xxl">
        <a class="navbar-brand" href="#">Gaming Emotions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="indexadmin.php">Главная страница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="postsadmin.php">Новостная Лента</a>
                </li>
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form method="get" action="vendor/index.php">
                            <a class="nav-link active" aria-current="page" href="#" name=""><?= $_SESSION['user']['email']?></a>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form method="get" action="vendor/logout.php">
                            <a class="nav-link  btn btn-outline-dark active" aria-current="page" href="vendor/logout.php" name="">Выход</a>
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adminotziv.php">Отзывы пользователей</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="personalinfoadmin.php">Личные данные пользователей</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
<div class="container-xxl">
    <form action="vendor/formanswer.php" method="post">
        <div class="mb-3">
            <input type="hidden"  name="admin_id" value="<?= $_SESSION['user']['id']?>">
            <label for="exampleFormControlInput1" class="form-label">Почта</label>
            <input name="email" value="<?=$_SESSION['user']['email']?>" >
            <input type="hidden" name="otziv_id" value="<?=$id?>">
            <input type="hidden" name="user_id" value="<?=$user_id?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Ответ от администратора</label>
            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

</body>
