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
    <title>Форма авторизации</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-xxl">
        <a class="navbar-brand" href="#">Gaming Emotions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Главная страница</a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" aria-current="page" href="#">Новостная Лента</a>-->
<!--                </li>-->
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-dark" aria-current="page" href="register.php">Регистрация</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link active" aria-current="page" href="#">Оставить отзыв</a>-->
<!--                    </li>-->
                </ul>
            </form>
        </div>
    </div>
</nav>

<main>
    <div class="circle"></div>
    <div class="register-form-container">
        <form action="vendor/signin.php" method="post">
            <h1 class="form-title">
                Вход
            </h1>
            <div class="form-fields">
                <div class="form-field">
                    <input type="email" name="email" placeholder="Введите свою почту" required>
                </div>
                <div class="form-field">
                    <input type="password" name="password" placeholder="Введите пароль" required minlength="8" maxlength="128">
                </div>
            </div>
            <div>
                <?php
                if (isset($_SESSION['message'])) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
                ?>
                <div>
            <div class="form-buttons">
                <button class="button" type="submit">Войти</button>
            </div>

        </form>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>