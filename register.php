<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'connect.php';

    $ID = $_POST['ID'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Address = $_POST['Address'];
    $PhoneNo = $_POST['PhoneNo'];

    $emailCheck = "SELECT Email FROM users WHERE Email = '$Email'";
    $res = mysqli_query($conn, $emailCheck);

    if (mysqli_num_rows($res) === 1) {
        $result["success"] = "2";
        $result["message"] = "existed";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $insertsql = "INSERT INTO users (ID, Username, Email, Password, Firstname, Lastname, Address, PhoneNo) VALUES ('$ID', '$Username', '$Email', '$Password', '$Firstname', '$Lastname', '$Address', '$PhoneNo')";

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
            // echo (mysqli_error($conn));
        }
    }
}
