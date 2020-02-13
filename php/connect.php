<?php
function connectToDatabase($database) {

    $servername = "localhost";
    $username = "seniors";
    $password = "SeniorProject2019!";
    // $database = "UserLoginSystem";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

?>
