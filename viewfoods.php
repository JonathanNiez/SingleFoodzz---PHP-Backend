<?php
	define('DB_HOST', 'localhost');
    define('DB_USER', 'id19790822_john');
    define('DB_PASS', '?FWRUsU)V>L6\nOe');
    define('DB_NAME', 'id19790822_ipt102');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }
    
        $stmt = $conn->prepare("SELECT FoodID, FoodName, Price, Quantity FROM food");

        $stmt->execute();
        $stmt->bind_result($FoodID ,$FoodName, $Price, $Quantity);

        $product = array();

        while ($stmt->fetch()){
            $temp = array();
            $temp['FoodID'] = $FoodID;
            $temp['FoodName'] = $FoodName;
            $temp['Price'] = $Price;
            $temp['Quantity'] = $Quantity;

            array_push($product, $temp);
        }
        echo json_encode($product);