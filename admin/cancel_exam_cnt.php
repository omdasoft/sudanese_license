<?php 
include("config.php");
$id = $_GET['id'];
$stmt = $con->prepare("UPDATE basic_data set exam_cnt = 0 WHERE cntID = ?");
$stmt->execute(array($id));
echo "تم الغاء الاعتماد كامتحان";

?>