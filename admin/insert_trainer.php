<?php 
include("ini.php");
error_reporting(0);

$ar_name = check_input($_POST["ar_name"]);
$en_name = check_input($_POST["en_name"]);
$b_place = check_input($_POST["birth_place"]);
$b_date  = check_input($_POST["birth_date"]);
$address = check_input($_POST["address"]);
$phone   = check_input($_POST["phone"]);
$email   = check_input($_POST["email"]);
$univercity = check_input($_POST["univercity"]);
$faculity = check_input($_POST["faculity"]);
$degree   = check_input($_POST["degree"]);
$specialty = check_input($_POST["specialty"]);
$grad_date = check_input($_POST["grad_date"]);

$stmt = $con->prepare("insert into trainer(ar_name,en_name,birth_place,birth_date,address,phone,email,univercity,faculity,degree,specialty,grad_date) 
								values(:ar_name,:en_name,:b_place,:b_date,:address,:phone,:email,:univercity,:faculity,:degree,:specialty,:grad_date)");
$stmt->execute(array(':ar_name' => $ar_name,':en_name' => $en_name,':b_place' => $b_place,':b_date' => $b_date,':address' => $address,':phone' => $phone,':email' => $email,':univercity' => $univercity,':faculity' => $faculity,':degree' => $degree,':specialty' => $specialty,':grad_date' => $grad_date));	
echo "تم الادخال بنجاح";				

?>