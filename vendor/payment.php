<?php
session_start();
require_once 'connect.php';

$get_balance = $_POST['get_balance'];

if (!ctype_digit($_POST['get_balance'])) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность введенных данных",
        "fields" => ['get_balance']
    ];

    echo json_encode($response);
    die();
} else {
    $balance = $connect->query("SELECT * FROM `users` WHERE `id` = {$_SESSION['user']['id']}")->fetch_assoc()['balance'];
    $balance = $balance + $get_balance;

    mysqli_query($connect, "UPDATE `users` SET `balance`=$balance WHERE `id` = {$_SESSION['user']['id']}");

    $_SESSION['user']["balance"] = $balance;


    $response = [
        "status" => true
    ];

    echo json_encode($response);
}
