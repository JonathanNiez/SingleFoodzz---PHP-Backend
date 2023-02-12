<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once 'connect.php';

    $FoodID = $_POST['FoodID'];
    $Quantity = $_POST['Quantity'];


        $insertsql = "UPDATE food SET  Quantity = '$Quantity' WHERE FoodID = '$FoodID'";
    
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

?>