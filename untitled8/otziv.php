<?php
session_start();


$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}

$otzivs = mysqli_query($connect,"SELECT * FROM `otziv`");

$otzivs = mysqli_fetch_all($otzivs);
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
                        <a class="nav-link active" aria-current="page" href="formregistered.php">Оставить отзыв</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="personalinfo.php">Личные данные</a>
                    </li>

                </ul>
            </form>
        </div>
    </div>
</nav>
<div class="container-xxl">
    <h1 class="h1">Отзывы о сайте</h1>


    <?php
    foreach ($otzivs as $otziv){
        ?>
        <form action="" class="pad">
            <div class="container-xxl bck">
                <form class="flex" action="" method="post">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $otziv[1]?></h5>
                            <p class="card-text" ><?= $otziv[2]?></p>
                        </div>
<!--                        <a type="button" href="vendor/deleteform.php?id=--><?//= $otziv[0]?><!--" class="btn btn-primary">Удалить</a>-->
                    </div>

                </form>
            </div>

        </form>
        <?php
    }
    ?>
    <div class="container-xxl">
        <form action="vendor/addotziv.php">
            <a type="button" href="addotziv.php" class="btn btn-primary">Оставить отзыв о сайте</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</div>
