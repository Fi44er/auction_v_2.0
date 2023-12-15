<?php
session_start();
if (!$_SESSION) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/global.css">

</head>

<body>
    <?php require './components/header.php' ?>


    <!-- Профиль -->
    <div class="container">
        <form>
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="vendor/logout.php" class="logout">Выход</a>
        </form>

    </div>


</body>

</html>