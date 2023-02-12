<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once 'connect.php';

    $emailCheck = "UPDATE food SET Quantity = Quantity - 1 WHERE FoodID = 52";
    $res = mysqli_query($conn, $emailCheck);

    if ($res){

        $result["success"] = "1";
		$result["message"] = "success";

            echo json_encode($result);
            mysqli_close($conn);    
    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
        // echo("Error description: " . mysqli_error($conn));

    }
}
