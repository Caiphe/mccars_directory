<?php
 session_start();
 include('../includes/db.php');
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }

 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>pagination</title>
</head>
<body>

</body>
</html>