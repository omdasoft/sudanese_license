<?php 
include("config.php");
$id = $_GET['id'];
$stmt = $con->prepare("UPDATE basic_data set exam_cnt = 1 WHERE cntID = ?");
$stmt->execute(array($id));
echo "تم الاعتماد بنجاح";

?>