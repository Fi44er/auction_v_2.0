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
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="stylesheet" href="assets/css/global.css">

    <title>Lots</title>
</head>

<body>
    <?php require './components/header.php' ?>


    <div class="lots">
        <div class="lot">
            <div class="lot_img">
                <img src="<?= $response[$_GET['id_lot']]['img'] ?>" alt="">
            </div>
            <div class="lot_info">
                <h2 class="lot_info_heading">Название: <?= $response[$_GET['id_lot']]['name'] ?></h2>
                <p class="lot_info_description">Описание: <?= $response[$_GET['id_lot']]['description'] ?></p>
            </div>
            <div class="lot_price">
                <div class="lot_number">
                    <p class="lot_number_id">Номер лота: <?= $response[$_GET['id_lot']]['id'] ?></p>
                </div>
                <div class="initial_bid">
                    <h4>Текущая ставка</h4>
                    <p class="initial_bid_price"><?= $response[$_GET['id_lot']]['initial_bid'] ?> $</p>
                </div>
            </div>
            <form>
                <p class="msg none">Lorem ipsum.</p>
                <label>Сдедать ставку</label>
                <input name="add_bet" type="text">
                <button type="submit" class="add-bet-btn">Сделать ставку</button>
            </form>
        </div>
        <div class="lot bet_history" style="max-width: 380px; overflow-y: scroll;">
            <h1>История ставок</h1>
            <div class="bets" id="bets">
                <?php
                $lotId = $response[$_GET['id_lot']]['id'];
                $check_bet = json_decode((mysqli_query($connect, "SELECT * FROM `current_lots` WHERE `lot_id` = $lotId")->fetch_all(MYSQLI_ASSOC)[0]['bet_history']), true);

                $response1 = [];

                for ($i = 0; $i < count($check_bet); $i++) {
                    $id_user = $check_bet[$i]['id'];
                    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = $id_user")->fetch_all(MYSQLI_ASSOC);

                    $response1[$i] = [
                        'id' => $id_user,
                        'login' => $user[0]['login'],
                        'avatar' => $user[0]['avatar'],
                        'bid' => $check_bet[$i]['bid']
                    ];
                }
                for ($i = 0; $i < count($response1); $i++) {
                ?>
                    <div class="bet">
                        <img src="./<?= $response1[$i]['avatar'] ?>" alt="">
                        <div><?= $response1[$i]['login'] ?></div>
                        <div class="bet_value"><?= $response1[$i]['bid'] ?></div>
                    </div>
                    <hr style="width: 100%;">
                <?php } ?>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $('.add-bet-btn').click(function(e) {
            e.preventDefault();

            $(`input`).removeClass('error');

            let add_bet = $('input[name="add_bet"]').val();

            $.ajax({
                url: 'vendor/add_bet.php?id_lot=<?= $response[$_GET['id_lot']]['id'] ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    add_bet: add_bet,
                },
                success(data) {

                    if (data.status) {
                        document.location.href = window.location.href;

                    } else {

                        if (data.type === 1) {
                            data.fields.forEach(function(field) {
                                $(`input[name="${field}"]`).addClass('error');
                            });
                        }

                        $('.msg').removeClass('none').text(data.message);

                    }

                }
            });

        });
    </script>
</body>

</html>

<style>
    .lots {
        display: flex;
        justify-content: center;
        padding: 50px 0;
        grid-gap: 30px;
    }

    .lot {
        width: 40%;
        max-width: 510px;
        max-height: 800px;
        display: flex;
        flex-direction: column;
        grid-gap: 50px;
        box-shadow: 0px 0px 71px -21px rgba(0, 128, 128, 0.26);
        border-radius: 10px;
        padding: 30px;
    }

    .lot:hover {
        box-shadow: 0px 0px 26px 12px rgba(0, 128, 128, 0.14);
    }

    .lot_img {
        width: 100%;
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
        padding-left: 20px;
    }

    .lot_number,

    .initial_bid {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .bets {
        display: flex;
        flex-direction: column;
        grid-gap: 15px;
    }

    .bet {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .bet img {
        width: 50px;
        height: 50px;
        border-radius: 100%;
    }
</style>