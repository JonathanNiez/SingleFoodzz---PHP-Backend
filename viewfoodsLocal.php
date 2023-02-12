<?php

header('Content-type: application/json');

$id = "";
require 'connect.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $sql = "SELECT FoodID, FoodImage, FoodName, Price, Quantity FROM food";
        break;
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    http_response_code(404);
    die(mysqli_error($conn));
}

if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        echo ($i > 0 ? ',' : '') . json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
} else {
    echo mysqli_affected_rows($conn);
}

mysqli_close($conn);
