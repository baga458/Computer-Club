<?php

session_start();
?>
<!doctype html>
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
<?php
session_start();
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
<body class="bck">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-bottom: 2rem">
    <div class="container-xxl">
        <a class="navbar-brand" href="#">Gaming Emotions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="registeredindex.php">Главная страница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="posts.php">Новостная Лента</a>
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
                        <a class="nav-link active" aria-current="page" href="formregistered.php">Обращение администратору</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="personalinfo.php">Личные данные</a>
                    </li>

                </ul>
            </form>
        </div>
    </div>
</nav>
<form action="vendor/otzivi.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="">
    <div class="container-xxl">
        <h3>Добавление отзыва</h3>
        <div class="form-fields">
            <div class="form-field">
                <input type="email" name="login" placeholder="Введите свою почту" required>
            </div>
            <div class="form-field">
                <input type="text" name="text" placeholder="Отзыв" required minlength="8" >
            </div>
        </div><br> <br>
        <button type="submit" class="btn btn-primary ">Сохранить отзыв</button>
    </div>


</form>
</body>
</html>