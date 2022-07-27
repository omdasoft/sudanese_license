<?php
    session_start(); //strart the session
	include("config.php");
	session_unset(); //remove session variable
    session_destroy(); //kill the session
    header('location: login.php');
    exit();
?>