<?php
session_start();
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

    <!-- Форма авторизации -->

    <div class="header_intro">
        <h1>Auction</h1>
        <p class="header_intro_text">Повышаем ставки, разыгрываем страсти! Аукцион - место,
            где каждая ставка имеет значение. Участвуй, побеждай,
            обретай уникальные предметы и переживай настоящие эмоции!
            Здесь каждый лот - это возможность сделать свою жизнь более
            захватывающей. Присоединяйся к увлекательному миру аукционов прямо сейчас!
        </p>
        <button onclick="document.location='lots.php'">Перейти к аукционам</button>
    </div>

    <style>
        .header_intro {
            height: 60vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            grid-gap: 50px;
        }

        .header_intro_text {
            max-width: 1000px;
            font-size: 20px;
            text-align: center;
        }
    </style>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>