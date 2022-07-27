<?php 
include("config.php");
error_reporting(0);
$id = $_GET["id"];
$stmt = $con->prepare("DELETE FROM users WHERE userID = ?");
$stmt->execute(array($id));
echo "تم الحذف بنجاح";
?>