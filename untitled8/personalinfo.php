<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}
$id = $_SESSION['user']['id'];
$answers=mysqli_query($connect,"SELECT * FROM `answer` WHERE `user_id` = '$id'");
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary pass" style="margin-bottom: 2rem">
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
                        <a class="nav-link active" aria-current="page" href="formregistered.php">Обращение администратору </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="otziv.php">Оставить отзыв </a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
<div class="container-xxl ">
    <form action="vendor/personal.php" method="get">
        <table class="table table-dark">
            <tr>
                <th scope="row">Имя</th>
                <th scope="row">Логин</th>
                <td colspan="2" >Почта</td>
                <td>Пароль</td>
                <td></td>
                <td></td>

            </tr>
                        <tr>
                            <th class="table-active"><?= $_SESSION['user']['full_name']?></th>
                            <td colspan="2" class="table-active"><?= $_SESSION['user']['login']?></td>
                            <td class="table-active"><?= $_SESSION['user']['email']?></td>
                            <td class="table-active"><?= $_SESSION['user']['password']?></td>
                            <td class="table-active"><a type="button" href="registeredupdate.php?id=<?=$_SESSION['user']['id']?>" class="btn btn-primary">Редактировать данные</a></td>
                            <td class="table-active"><a type="button" href="vendor/delete.php?id=<?=$_SESSION['user']['id']?>" class="btn btn-primary">Удалить аккаунт</a></td>
                        </tr>
                </tbody>
        </table>
    </form>
    <?php
    if (mysqli_num_rows($answers)>0){
        foreach ($answers as $answer)
    ?>
    <form action="" class="pad">
        <div class="container-xxl bck">
            <form class="flex" action="" method="post">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?= $answer['email']?></h5>
                        <p class="card-text" ><?= $answer['text']?></p>

                    </div>
<!--                    <a type="button" href="vendor/deleteform.php?id=--><?//= $otziv[0]?><!--" class="btn btn-primary">Удалить</a>-->
                </div>
            </form>
<!--            <form action="formansweradmin.php?id=--><?//=$otziv[0]?><!--" method="post">-->
<!--                <input  name="user_id" type="hidden" value="--><?//= $otziv[4]?><!--">-->
<!--                <button type="submit" class="btn btn-primary">Ответить пользователю</button>-->
<!--            </form>-->
        </div>

    </form>
        <?php
    }
    ?>
</div>
</body>
</html>
