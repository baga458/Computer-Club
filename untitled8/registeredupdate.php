<?php
    session_start();

    $connect = mysqli_connect('localhost', 'root', '', 'club');
    if (!$connect) {
        die('Error connect to DataBase');
    }


    $user_id = $_GET['id'];
    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$user_id'");

    $user = mysqli_fetch_assoc($user);

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
<body >
    <div class="container-xxl">
        <h3>Редактирование данных</h3>
        <form action="vendor/update.php" method="post">
            <input type="hidden" name="id" value="<?= $user['id']?>">
            <p>Имя</p>
            <input type="text" name="name" value="<?= $user['name']?>">
            <p>Логин</p>
            <input type="text" name="login" value="<?= $user['login']?>">
            <p>Почта</p>
            <input type="text" name="email" value="<?= $user['email']?>">
            <p>Пароль</p>
            <input type="text" name="password" value="<?= $user['password']?>"> <br> <br>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>

</body>
</html>
