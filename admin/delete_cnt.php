<?php 
include('config.php'); // include connection file 
error_reporting(0);

$id = $_GET['id'];
$stmt = $con->prepare("DELETE FROM basic_data WHERE cntID = ?");
$stmt->execute(array($id));
echo "تم الحزف بنجاح";

?>