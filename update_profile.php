<?php 
include("config.php"); //include connetion file
error_reporting(0);
if(isset($_POST["submit"])){
	$id = $_POST["ID"];
	$name = $_POST["name"];
	$username = $_POST["username"];
	$pass = $_POST["password"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$stmt = $con->prepare("UPDATE cnt_admin SET name = ? , username = ? , password = ? , address = ? , phone = ? , email = ? WHERE ID = ?");
	$stmt->execute(array($name,$username,$pass,$address,$phone,$email,$id));
	echo "تم التعديل بنجاح";
}

?>