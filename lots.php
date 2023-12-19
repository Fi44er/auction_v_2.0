<?php
session_start();
if (!$_SESSION) {
    header('Location: /');
}
require('./vendor/get_lots.php');
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
        <?php if (count($response) == 0) { ?> <h1>На данный момент активных лотов нету</h1> <?php } ?>
        <?php if (count($response) != 0) { ?>
            <?php for ($i = 0; $i < count($response); $i++) { ?>
                <div class="lot">
                    <div class="lot_img">
                        <img src="<?= $response[$i]['img'] ?>" alt="">
                    </div>
                    <div class="lot_info">
                        <h2 class="lot_info_heading"><?= $response[$i]['name'] ?></h2>
                        <p class="lot_info_description"><?= $response[$i]['description'] ?></p>
                    </div>
                    <div class="lot_price">
                        <div class="lot_number">
                            <p class="lot_number_id"># <?= $response[$i]['id'] ?></p>
                        </div>
                        <div class="initial_bid">
                            <h4>Ориентировочная ставка</h4>
                            <p class="initial_bid_price"><?= $response[$i]['initial_bid'] ?> $</p>
                        </div>
                        <button onclick="document.location='/lot.php?id_lot=<?= $i ?>'">Перейти к лоту</button>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>


    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

<style>
    .lots {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 50px 0;
        grid-gap: 30px;
    }

    .lot {
        width: 65%;
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
        width: 60%;
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
    .initial_bid {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>