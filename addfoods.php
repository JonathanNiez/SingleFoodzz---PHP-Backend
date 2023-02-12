<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once 'connect.php';

    $FoodName = $_POST['FoodName'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];
       

    $emailCheck = "SELECT FoodName FROM food WHERE FoodName = '$FoodName'";
    $res = mysqli_query($conn, $emailCheck);

    if (mysqli_num_rows($res) === 1){
            $result["success"] = "2";
			$result["message"] = "existed";
            echo json_encode($result);
            mysqli_close($conn);    
    }
    else {
        $insertsql = "INSERT INTO food (FoodName, Price, Quantity) VALUES ('$FoodName', '$Price', '$Quantity')";
    
        if(mysqli_query($conn, $insertsql)){
            $result["success"] = "1";
			$result["message"] = "success";

            echo json_encode($result);
            mysqli_close($conn);    
        }
        else{
            $result["success"] = "0";
			$result["message"] = "error";
            
            echo json_encode($result);
            mysqli_close($conn);    
            echo("Error description: " . mysqli_error($conn));

        }   
    }
}

?>