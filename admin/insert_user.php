<?php 
include("config.php");
error_reporting(0);

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$email = htmlspecialchars($_POST["email"]);
$full  = htmlspecialchars($_POST["full"]);
$privs = htmlspecialchars($_POST["privs"]);
$super = 0;

$stmt = $con->prepare("INSERT INTO users(username,password,privs,super,fullName,email) values(:username,:password,:privs,:super,:full,:email)");
$stmt->execute(array(':username' => $username,':password' => $password,':privs' => $privs,':super' => $super,':full' => $full,':email' => $email));	
echo "تم الادخال بنجاح";				

?>