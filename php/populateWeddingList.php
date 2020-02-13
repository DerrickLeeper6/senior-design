<?php
session_start();
include 'connect.php';
$database = 'Weddings';
$conn = connectToDatabase($database);
$SQL = "select groomFirstName, groomLastName, brideFirstName, brideLastName, eventdate from wedding where username = '{$_SESSION['username']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option>Groom: " . $row["groomFirstName"]. " " . $row["groomLastName"]. " Bride: " . $row["brideFirstName"]. " " . $row["brideLastName"] . " Date of event: " . $row["eventdate"] ."</option><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
 ?>
