<?php

session_start();
require_once 'connect.php';

$lotId = $_GET['id_lot'];

$check_bet = json_decode((mysqli_query($connect, "SELECT * FROM `current_lots` WHERE `lot_id` = $lotId")->fetch_all(MYSQLI_ASSOC)[0]['bet_history']), true);

$response = [];

for ($i = 0; $i < count($check_bet); $i++) {
    $id_user = $check_bet[$i]['id'];
    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = $id_user")->fetch_all(MYSQLI_ASSOC);

    $response[$i] = [
        'id' => $id_user,
        'login' => $user[0]['login'],
        'avatar' => $user[0]['avatar'],
        'bid' => $check_bet[$i]['bid']
    ];
}

echo json_encode($response);

phpinfo();
