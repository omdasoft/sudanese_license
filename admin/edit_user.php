<?php 
	include("config.php");
	error_reporting(0);
	$id = $_POST["id"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$name = $_POST["full"];
	$email = $_POST["email"];

    $stmt = $con->prepare("UPDATE users SET username = ?, password = ?, fullName = ?, email = ? where userID = ?");
    $stmt ->execute(array($user,$pass,$name,$email,$id));
	
	echo "تم التعديل بنجاح";

?>