<?php
session_start();
include 'connect.php';
$groomFirstName = $_POST['groomFirstName'];
$groomLastName = $_POST['groomLastName'];
$brideFirstName = $_POST['brideFirstName'];
$brideLastName = $_POST['brideLastName'];
$date = $_POST['date'];
$budget = $_POST["budget"];
if (isset($_SESSION['userEmail'])){
  $userid = $_SESSION['userEmail'];
}
else{
  $userid = null;
}
$userid = $_SESSION['userEmail'];
$database = 'Weddings';
$conn = connectToDatabase($database);
$SQL = "INSERT into wedding (groomFirstName, groomLastName, brideFirstName, brideLastName, eventdate, userid, budget)
values ('".$groomFirstName."', '".$groomLastName."', '".$brideFirstName."', '".$brideLastName."', str_to_date('".$date."', 'YYYY-MM-DD'), '".$userid."', '".$budget."')";
if ($conn->query($SQL) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $SQL . "<br>" . $conn->error;
}

$conn->close();
 ?>
