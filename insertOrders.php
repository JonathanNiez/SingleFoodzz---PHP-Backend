<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'connect.php';

    $OrderID = $_POST['OrderID'];
    $FoodID =  $_POST['FoodID'];
    $FoodOrdered = $_POST['FoodOrdered'];
    $UserID = $_POST['UserID'];
    $QuantityOrdered = $_POST['QuantityOrdered'];
    $FoodImage = $_POST['FoodImage'];
    $TotalPrice = $_POST['TotalPrice'];

    $insertsql = "INSERT INTO orders (OrderID, UserID, FoodID, FoodImage, FoodOrdered, QuantityOrdered, TotalPrice, OrderDate) VALUES ('$OrderID' ,'$UserID', '$FoodID','$FoodImage', '$FoodOrdered', '$QuantityOrdered', '$TotalPrice', CURRENT_TIMESTAMP)";

    if (mysqli_query($conn, $insertsql)) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
        echo ("Error description: " . mysqli_error($conn));
    }
}
