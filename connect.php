<?php
    $conn = mysqli_connect('localhost', 'root', '', 'ipt102');

    if ($conn -> connect_error){
        die("Connection Failed" . $conn -> connect_error);
    }
    
?>