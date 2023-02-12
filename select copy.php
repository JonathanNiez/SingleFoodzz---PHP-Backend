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
$res = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($res);
echo $rows;
?>