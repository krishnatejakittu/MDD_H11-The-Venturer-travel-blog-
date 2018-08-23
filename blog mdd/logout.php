<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
<?php
session_start();
unset($_SESSION['email']);
header("Location: index.php");
?>

</body>
</html>