<?php

session_start();
require_once 'connect.php';

$add_bet = $_POST['add_bet'];

if (!ctype_digit($_POST['add_bet'])) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность введенных данных",
        "fields" => ['add_bet']
    ];

    echo json_encode($response);
    die();
}

$lotId = $_GET['id_lot'];
$user_id = $_SESSION['user']['id'];
$user_mony = intval(mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = $user_id")->fetch_all(MYSQLI_ASSOC)[0]['balance']);
$check_bet = json_decode((mysqli_query($connect, "SELECT * FROM `current_lots` WHERE `lot_id` = $lotId")->fetch_all(MYSQLI_ASSOC)[0]['bet_history']), true);
$curent_price = intval(mysqli_query($connect, "SELECT * FROM `current_lots` WHERE `lot_id` = $lotId")->fetch_all(MYSQLI_ASSOC)[0]["current_price"]);

if ($add_bet > $user_mony) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Не хватает средств",
    ];
    die();
}

if ($add_bet > $curent_price) {
    $check_bet[count($check_bet)] = ['id' => $user_id, 'bid' => $add_bet];
    $check_bet_json = json_encode($check_bet);
    mysqli_query($connect, "UPDATE `current_lots` SET `bet_history`='$check_bet_json' WHERE `lot_id`=$lotId");
    mysqli_query($connect, "UPDATE `current_lots` SET `current_price`='$add_bet' WHERE `lot_id`=$lotId");
    mysqli_query($connect, "UPDATE `lots` SET `initial_bid`='$add_bet' WHERE `id`=$lotId");
    $response = [
        "status" => true,
    ];
} else {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Ставка меньше минимальной",
        "fields" => ['add_bet']
    ];
}
echo json_encode($response);

























// $a = false;
// if ($check_bet != []) {
//     for ($i = 0; count($check_bet); $i++) {
//         if ($add_bet > $check_bet[$i]['bid']) {
//             $check_bet[$i + 1] = [['id'] => $user_id, ['bid'] => $user_mony];
//             $check_bet = json_encode($check_bet);
//             mysqli_query($connect, "UPDATE `current_lots` SET `bet_history`=$check_bet WHERE `id`=$lotId");
//             $a = true;
//             break;
//         }
//     }

//     if ($a = true) {
//         $response = [
//             "status" => false,
//             "type" => 1,
//             "message" => "Ставка меньше минимальной",
//         ];
//     }
// } else {
//     $check_bet[0] = [['id'] => $user_id, ['bid'] => $user_mony];
//     $check_bet = json_encode($check_bet);
//     mysqli_query($connect, "UPDATE `current_lots` SET `bet_history`=$check_bet WHERE `id`=$lotId");
// }
