<?php
    session_start(); //strart the session
	include("config.php");
	$id =  $_SESSION['userID'];
	$stmt = $con->prepare("UPDATE track_user SET logout = now() WHERE userID = $id");
	$stmt->execute();
	session_unset(); //remove session variable
    session_destroy(); //kill the session
    header('location: index.php');
    exit();
?>