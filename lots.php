<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/global.css">

    <title>Lots</title>
</head>

<body>
    <?php require './components/header.php' ?>



    <div class="lots">
        <div class="lot">
            <div class="lot_img">
                <img src="./uploads/mustang.webp" alt="">
            </div>
            <div class="lot_info">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, hic.
                    Est ratione eaque doloremque aperiam. Quae, consectetur harum nostrum
                    neque laudantium maiores, quam asperiores quis possimus pariatur saepe
                    ipsum suscipit.
                </p>
            </div>
            <div class="lot_price">
                <div class="lot_number">
                    <p># 12514254</p>
                </div>
                <div class="lot_date">
                    <h4>Дата аукциона</h4>
                    <p>20.12.2023</p>
                </div>
                <div class="initial_bid">
                    <h4>Ориентировочная ставка</h4>
                    <p>20000 $</p>
                </div>
                <button>Перейти к лоту</button>
            </div>
        </div>
        <div class="lot">
            <div class="lot_img">
                <img src="./uploads/mustang.webp" alt="">
            </div>
            <div class="lot_info">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, hic.
                    Est ratione eaque doloremque aperiam. Quae, consectetur harum nostrum
                    neque laudantium maiores, quam asperiores quis possimus pariatur saepe
                    ipsum suscipit.
                </p>
            </div>
            <div class="lot_price">
                <div class="lot_number">
                    <p># 12514254</p>
                </div>
                <div class="lot_date">
                    <h4>Дата аукциона</h4>
                    <p>20.12.2023</p>
                </div>
                <div class="initial_bid">
                    <h4>Ориентировочная ставка</h4>
                    <p>20000 $</p>
                </div>
                <button>Перейти к лоту</button>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

<style>
    .lots {
        width: 100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 50px 0;
        grid-gap: 30px;
    }

    .lot {
        display: flex;
        grid-gap: 50px;
        box-shadow: 0px 0px 71px -21px rgba(0, 128, 128, 0.26);
        border-radius: 10px;
        padding: 30px;
    }

    .lot:hover {
        box-shadow: 0px 0px 26px 12px rgba(0, 128, 128, 0.14);
    }

    .lot_img {
        width: 300px;
        height: 250px;
    }

    .lot_img img {
        width: 100%;
        border-radius: 20px;
    }

    .lot_info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .lot_info p {
        max-width: 500px;
    }

    .lot_price {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-left: 1px solid teal;
        padding-left: 20px;
    }

    .lot_number,
    .lot_date,
    .initial_bid {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>