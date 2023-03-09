<?php
session_start();


$connect = mysqli_connect('localhost', 'root', '', 'club');
if (!$connect) {
    die('Error connect to DataBase');
}

$posts = mysqli_query($connect,"SELECT * FROM `users`");

$posts = mysqli_fetch_all($posts);

$otzivs = mysqli_query($connect,"SELECT * FROM `form`");
$otzivs = mysqli_fetch_all($otzivs);
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
<body class="bck">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
            <?php
            foreach ($posts as $post){
            ?>
            <tr>
                <th class="table-active"><?= $post[4]?></th>
                <td colspan="2" class="table-active"><?= $post[1]?></td>
                <td class="table-active"><?= $post[2]?></td>
                <td class="table-active"><?= $post[3]?></td>
                <td class="table-active"><a type="button" href="registeredupdateadmin.php?id=<?= $post[0]?>" class="btn btn-primary">Редактировать данные</a></td>
                <td class="table-active"><a type="button" href="vendor/deleteadmin.php?id=<?= $post[0]?>" class="btn btn-primary">Удалить аккаунт</a></td>

            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </form>
    <form action="vendor/registernewuser.php" method="post" enctype="multipart/form-data">
        <h1 class="form-title">
            Регистрация нового пользователя
        </h1>
        <div class="form-fields">
            <div class="form-field">
                <input type="text" name="full_name" placeholder="Имя">
            </div>
            <div class="form-field">
                <input type="email" name="email" placeholder="Почта" required>
            </div>
            <div class="form-field">
                <input type="login" name="login" placeholder="Логин" required>
            </div>
            <div class="form-field">
                <input type="password" name="password" placeholder="Пароль" required minlength="8">
            </div>
            <div class="form-field">
                <input type="password" name="password_confirm" placeholder="Подтвердите пароль" required minlength="8" >
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
                    <button type="submit" class="button">Регистрация</button>
                </div>
    </form>
    <h1 class="h1">ОБРАЩЕНИЯ ПОЛЬЗОВАТЕЛЕЙ</h1>
    <?php
    foreach ($otzivs as $otziv){
    ?>
    <form action="" class="pad">
        <div class="container-xxl bck">
                <form class="flex" action="" method="post">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title"><?= $otziv[1]?></h5>
                            <p class="card-text" ><?= $otziv[2]?></p>
                            <p class="card-text" ><?= $otziv[3]?></p>
                        </div>
                        <a type="button" href="vendor/deleteform.php?id=<?= $otziv[0]?>" class="btn btn-primary">Удалить</a>
                    </div>
                </form>
                <form action="formansweradmin.php?id=<?=$otziv[0]?>" method="post">
                    <input  name="user_id" type="hidden" value="<?= $otziv[4]?>">
                    <button type="submit" class="btn btn-primary">Ответить пользователю</button>
                </form>
        </div>

    </form>
        <?php
    }
    ?>
</div>
<footer class="text-center text-lg-start bg-light text-muted  ">
    <!-- Section: Social media -->
    <section
            class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
    >
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Company name
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Angular</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">React</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        info@example.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>

<!-- Footer -->
<!-- Footer -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</html>