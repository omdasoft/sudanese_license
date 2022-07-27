<?php 
include("config.php");
error_reporting(0);
$id = $_GET["id"];
$stmt = $con->prepare("DELETE FROM news WHERE ID = ?");
$stmt->execute(array($id));
echo "تم الحزف";
?>