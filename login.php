<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$Email = $_POST['Email'];
	$Password = $_POST['Password'];

	require_once 'connect.php';

	$sql = "SELECT * FROM users WHERE Email = '$Email' AND Password = '$Password'";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['login'] = array();

	if (mysqli_num_rows($response) === 1) {

		$row = mysqli_fetch_assoc($response);

		if ($row['Password']) {

			$index['ID'] = $row['ID'];
			$index['Username'] = $row['Username'];
			$index['Email'] = $row['Email'];
			$index['Password'] = $row['Password'];
			$index['Firstname'] = $row['Firstname'];
			$index['Lastname'] = $row['Lastname'];
			$index['Address'] = $row['Address'];
			$index['PhoneNo'] = $row['PhoneNo'];

			array_push($result['login'], $index);

			$result['success'] = "1";
			$result['message'] = "success";
			echo json_encode($result);

			mysqli_close($conn);
		} else {
			$result['success'] = "0";
			$result['message'] = "error";
			echo json_encode($result);

			mysqli_close($conn);
		}
	}
}
