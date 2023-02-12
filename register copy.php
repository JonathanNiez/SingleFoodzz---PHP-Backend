<?php

if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Password'])){
	require_once "webHostConnect.php";
	require_once "validate.php";

        $Username = $_POST['Username'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Address = $_POST['Address'];
        $PhoneNo = $_POST['PhoneNo'];

        $Password = password_hash($Password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO users (Username, Email, Password, Firstname, Lastname, Address, PhoneNo) VALUES ('$Username', '$Email', '$Password', '$Firstname', '$Lastname', '$Address', '$PhoneNo')";
	if(!$result = $conn -> query($sql)){
        echo "failed";

	}
	else {
        echo "success";

	}
}
