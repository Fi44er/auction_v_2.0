<?php

session_start();
require_once 'connect.php';

$lot_name = $_POST['lot_name'];
$current_price = $_POST['current_price'];
$lot_description = (string) $_POST['lot_description'];


$error_fields = [];



if ($lot_name === '') {
    $error_fields[] = 'lot_name';
}

if ($lot_description === '') {
    $error_fields[] = 'lot_description';
}

if ($current_price === '') {
    $error_fields[] = 'current_price';
}

if (!$_FILES['lot_img']) {
    $error_fields[] = 'lot_img';
}


if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

if (empty($error_fields)) {

    $path = 'uploads/' . time() . $_FILES['lot_img']['name'];
    if (!move_uploaded_file($_FILES['lot_img']['tmp_name'], '../' . $path)) {
        $response = [
            "status" => false,
            "type" => 2,
            "message" => "Ошибка при загрузке аватарки",
        ];
        echo json_encode($response);
    }

    mysqli_query($connect, "INSERT INTO `lots` (`id`, `name`, `img`, `initial_bid`, `description`) VALUES (NULL, '$lot_name',  '$path', '$current_price', '$lot_description')");
    $lots_id = mysqli_query($connect, "SELECT `id` FROM `lots`")->fetch_all(MYSQLI_ASSOC);
    $lot_id = $lots_id[count($lots_id) - 1]['id'];

    $owner_id = $_SESSION['user']['id'];
    mysqli_query($connect, "INSERT INTO `current_lots` (`lot_id`, `id_owner`, `last_buyer_id`, `current_price`) VALUES ($lot_id, '$owner_id', NULL, '$current_price')");

    $response = [
        "status" => true,
        "message" => "Создание лота прошло успешно",
    ];



    echo json_encode($response);
} else {
    $response = [
        "status" => false,
        "message" => "Проверьте правильность полей",
    ];
    echo json_encode($response);
}
