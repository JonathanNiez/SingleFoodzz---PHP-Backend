<?php

header('Content-type: application/json');

$id = "";
require 'connect.php';

$method = $_SERVER['REQUEST_METHOD'];

$UserID = $_POST['UserID'];


switch ($method) {
    case 'POST':
        $sql = "SELECT * FROM orders WHERE UserID = '$UserID'";
        break;
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    http_response_code(404);
    die(mysqli_error($conn));
}

if ($method == 'POST') {
    if (!$id) echo '[';
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        echo ($i > 0 ? ',' : '') . json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
} else {
    echo mysqli_affected_rows($conn);
}

mysqli_close($conn);
