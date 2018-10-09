<?php

error_reporting(-1);
ini_set('display_errors', 'On');

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogmdd";

if(!isset($_SESSION['email'])) {
	header("location:login.php");
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

extract($_POST);
$email = $_SESSION['email'];
$target_path="images\\";
$target_path=$target_path . basename($_FILES['photo']['name']);
$imgFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));
//echo "$imgFileType";
//$target_path = $target_path . "." . $imgFileType;
move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
echo "$target_path";
$target_path = quotemeta($target_path);
echo "$target_path";
$query = "INSERT INTO POSTDETAILS VALUES('$email', '$title', '$target_path', '$text')";

$sql = $conn->query($query);
if($sql) {
	header("location:index.php");
}
else {
	echo "Data not inserted";
}

?>