<?php
include "connect.php";
$conn = connectToDatabase("UserLoginSystem");

$email = $_POST['EMAIL'];
$hash = password_hash($_POST['PWD'], PASSWORD_DEFAULT);

$query = "INSERT INTO users( user_name , emailUsers, userPassword) VALUES('N/A','$email','$hash')";
  if (!mysqli_query($conn,$query))
{
    echo("Error description: " . mysqli_error($conn));
} else {
    $result = $conn->query($query);
    header('Content-Type: application/json');
    echo json_encode($result);    
    $conn->close(); 
}        
?>