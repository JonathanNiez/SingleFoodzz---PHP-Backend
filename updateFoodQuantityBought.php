<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'connect.php';

    $FoodName = $_POST['FoodName'];
    $Quantity = $_POST['Quantity'];

    $foodCheck = "SELECT * FROM food WHERE Quantity = 0 AND FoodName = '$FoodName'";
    $res = mysqli_query($conn, $foodCheck);

    if (mysqli_num_rows($res) === 1) {
        $result["success"] = "2";
        $result["message"] = "empty";

        echo json_encode($result);
        mysqli_close($conn);
    } else {

        $insertsql = "UPDATE food SET Quantity = Quantity - '$Quantity' WHERE FoodName = '$FoodName'";

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
}
