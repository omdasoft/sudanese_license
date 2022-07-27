<?php 
include("config.php");
$id = $_GET['id'];
$stmt = $con->prepare("UPDATE basic_data set certified_cnt = 1, cert_date = now() WHERE cntID = ?");
$stmt->execute(array($id));
echo "تم الاعتماد بنجاح";

?>