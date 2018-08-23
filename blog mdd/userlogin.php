<?php
error_reporting(-1);
ini_set('display_errors', 'On');

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogmdd";

$email = $_POST["email"];
$pwd = $_POST["pass"];

echo "email $email";
echo "pass $pwd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login WHERE email LIKE '$email' and pass LIKE '$pwd'";
$result = $conn->query($sql);

if (($result->num_rows) == 1) {
    header("Location:index.php");
    $_SESSION['email'] = $email;
} else {
    header("Location:login.php");
    die();
}

$conn->close();
?> 
