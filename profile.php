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

    <link rel="stylesheet" href="assets/css/global.css">

</head>

<body>
    <?php require './components/header.php' ?>
    <div class="main_block">
        <div class="main">
            <div class="main_content_block">
                <div class="content-img">
                    <img src="<?= $_SESSION['user']['avatar'] ?>" alt="">
                </div>
                <div class="content-info">
                    <div class="content-info-field">
                        <h2>ФИО</h2>
                        <p><?= $_SESSION['user']['full_name'] ?></p>
                    </div>
                    <div class="content-info-field">
                        <h2>Логин</h2>
                        <p><?= $_SESSION['user']['login'] ?></p>
                    </div>
                    <div class="content-info-field">
                        <h2>Почта</h2>
                        <p><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <button onclick="document.location='vendor/logout.php'" class="logout">Выход</button>
                </div>
            </div>
            <div>
                <div class="payment-block">
                    <h2>Баланс</h2>
                    <div class="payment-info">
                        <p><?= $_SESSION['user']['balance'] ?> ₽</p>
                        <form class="payment-form">
                            <div>
                                <p class="msg none"></p>
                                <input type="text" name="get_balance" placeholder="Пополнить">
                            </div>

                            <button class="payment-btn">Пополнить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

<style>
    .main_block {
        display: flex;
        justify-content: center;
        align-items: center;
        background: url(./assets/img/Frame\ 3.png) no-repeat center;
        background-size: cover;
        height: 89.3vh;
    }

    .main {
        padding: 3rem;
        background: rgba(0, 124, 119, 0.50);
        border-radius: 1.5rem;
        display: flex;
        grid-gap: 3rem;
    }

    .main_content_block {
        min-width: 400px;
        background: white;
        padding: 2rem;
        border-radius: 1.5rem;
    }

    .content-img {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        width: 100%;
    }

    .content-img img {
        width: 10rem;
        height: 10rem;
        border-radius: 100%;
    }

    .content-info-field {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #007C77;
    }

    .content-info-field h2 {
        font-size: 18px;
        color: #008080;
    }

    .content-info button {
        margin: 30px 0;
        width: 100%;
        height: 50px;
        padding: 15px;
        background: linear-gradient(86deg, #007C76 -3.09%, #10BB5F 57.8%, #07FA81 91.77%);
    }

    .payment-block {
        background: white;
        padding: 2rem;
        border-radius: 1.5rem;
    }

    .payment-form {
        display: flex;
        align-items: end;
        grid-gap: 20px;
    }

    .payment-form input {
        border: 1px solid #007C76;
        outline: none;
        padding: 3px;
        height: 38px;
    }

    .msg {
        max-width: 185px;
        color: red;
    }
</style>