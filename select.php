<?php
require 'connect.php';

// $ID = $_GET['ID'];
// $Username = $_GET['Username'];
// $Password = $_GET['Password'];
// $Firstname = $_GET['Firstname'];
// $Lastname = $_GET['Lastname'];
// $Address = $_GET['Address'];
// $PhoneNo = $_GET['PhoneNo'];
$sql = "SELECT * FROM users";
$p = '[';
$res = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_assoc($res)){
	$p .= '{"ID"  : "' .  $rows['ID'] .'", ';
	$p .= '"Username"  : "' . $rows['Username'] .'", ';
	$p .= '"Password"  : "' . $rows['Password'] .'", ';
	$p .= '"Firstname"  : "' . $rows['Firstname'] .'", '; 
	$p .= '"Lastname"  : "' . $rows['Lastname'] .'", '; 
	$p .= '"Address"  : "' . $rows['Address'] .'",';
	$p .= '"PhoneNo"  : "' . $rows['PhoneNo'] .'"},';
}
mysqli_close($conn);
$p = substr($p, 0, -1) . ']';
echo $p;

?>