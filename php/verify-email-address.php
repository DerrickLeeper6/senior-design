<?php
include "connect.php";
$conn = connectToDatabase("UserLoginSystem");

$email = $_POST["EMAIL"];

$query = "SELECT emailUsers FROM users WHERE emailUsers = '".$email."'";

if (!mysqli_query($conn,$query))
{
    echo("Error description: " . mysqli_error($conn));
} else {

    $result = $conn->query($query);
    
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($data);    
    $conn->close(); 
}
?>