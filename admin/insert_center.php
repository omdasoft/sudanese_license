<?php 
include("ini.php");
error_reporting(0);
	
	$cnt_name   = check_input($_POST["cnt_name"]);
	$date       = check_input($_POST["creat_date"]);
	$owner      = check_input($_POST["owner"]);
	$reg_to     = check_input($_POST["register"]);
	$city       = check_input($_POST["city"]);
	$address    = check_input($_POST["address"]);
	$phone      = check_input($_POST["phone"]);
	$url        = check_input($_POST["url"]);
	$email      = check_input($_POST["email"]);
	
	if(empty($cnt_name) or empty($date) or empty($owner) or empty($reg_to) or empty($city) or empty($address) or empty($phone) or empty($url) or empty($email)){
		echo "يجب ادخال كل الحقول";
	}else{
		$stmt1 = $con ->prepare("INSERT INTO basic_data(cnt_name,create_date,owner,reg_to,city,address,phone,url,email) values (:name,:date,:owner,:reg_to,:city,:address,:phone,:url,:email)");
		$stmt1->execute(array(':name' => $cnt_name,':date' => $date,':owner' => $owner,':reg_to' => $reg_to,':city' => $city,':address' => $address,':phone' => $phone,':url' => $url,':email' => $email));
		echo "تم الادخال بنجاح";
	}
?>