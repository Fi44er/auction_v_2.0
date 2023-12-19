<?php

require_once 'connect.php';

$lots = mysqli_query($connect, "SELECT * FROM `lots`");

if (mysqli_num_rows($lots)) {
    $response = ($lots->fetch_all(MYSQLI_ASSOC));
} else {
    $response = [];
}
