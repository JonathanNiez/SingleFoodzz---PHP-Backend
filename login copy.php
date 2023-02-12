<?php

if(isset($_POST['Email']) && isset($_POST['Password'])){
	require_once "webHostConnect.php";
	require_once "validate.php";
	$Email = validate($_POST['Email']);
	$Password = validate($_POST['Password']);

	$sql = "SELECT * FROM users WHERE Email = '$Email' AND Password = '$Password'";
	$result = $conn -> query($sql);
	if($result -> num_rows > 0){
		echo "success";
		mysqli_close($conn);
	}
	else {
		echo "failed";
	}


}