<?php 
include("config.php");
error_reporting(0);
$id          = $_POST['id'];
$cnt_name    = $_POST['cnt_name'];
$create_date = $_POST['create_date'];
$owner       = $_POST['owner'];
$register    = $_POST['register'];
$city        = $_POST['city'];
$address     = $_POST['address'];
$phone       = $_POST['phone'];
$url         = $_POST['url'];
$email       = $_POST['email'];
$stmt        = $con->prepare("UPDATE basic_data SET cnt_name = ? , create_date = ? , owner = ? , reg_to = ? , city = ? , address = ? ,  phone = ? , url = ? , email = ? WHERE cntID = ?");
$stmt->execute(array($cnt_name,$create_date,$owner,$register,$city,$address,$phone,$url,$email,$id));
echo "تم التعديل بنجاح";
?>