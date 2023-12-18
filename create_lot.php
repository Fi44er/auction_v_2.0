<?php
session_start();
if (!$_SESSION) {
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Создание лота</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/global.css">

</head>

<body>
    <?php require './components/header.php' ?>


    <!-- Форма создания лота -->
    <div class="container">
        <form>
            <label>Название</label>
            <input type="text" name="lot_name" placeholder="Введите название лота">
            <label>Изображение лота</label>
            <input type="file" name="lot_img">
            <label>Начальная ставка</label>
            <input type="text" name="current_price" placeholder="Введите начальную ставку">
            <label>Дата начала аукциона</label>
            <input type="text" name="lot_date" placeholder="дд.мм.гггг">
            <label>Описание лота</label>
            <textarea style="margin-bottom: 30px; margin-top: 20px; width: 400px; height: 200px;  resize: none;" name="lot_description" placeholder="Описание"></textarea>
            <button type="submit" class="create-lot-btn">Создать лот</button>
            <p class="msg none">Lorem ipsum.</p>
        </form>
    </div>


    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>