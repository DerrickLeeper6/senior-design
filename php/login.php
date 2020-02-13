  <?php
include "connect.php";
$conn = connectToDatabase("UserLoginSystem");


session_start();

$email = $_POST['EMAIL'];
$password = $_POST['PWD'];

$query = "SELECT emailUsers, userPassword, role FROM users WHERE emailUsers = '".$email."'";

if (!mysqli_query($conn,$query))
{
    echo("Error description: " . mysqli_error($conn));
} else {


    $result = $conn->query($query);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data = $row;
    }

    if($data["emailUsers"] == "") {
        echo "Incorrect email";
    } else {
        if (password_verify($password, $data["userPassword"])) {
            echo 'Password is valid!';
            $_SESSION["userEmail"]= $email;
            $_SESSION["role"]= $data["role"];
            $_SESSION['loggedin'] = true;
        } else {
            echo 'Invalid password';
        }
    }
    //header('Content-Type: application/json');
    //echo json_encode($data);




    $conn->close();
}











?>
