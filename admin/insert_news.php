<?php 
include("ini.php");
error_reporting(0);
	$title = check_input($_POST['title']);
	$text = check_input($_POST['text']);
	$tmp = $_FILES['image']['tmp_name'];
	$name= rand();
	//arabic date converting
	$nameday=date("l");
	$day=date("d");
	$namemonth=date("m");
	$year=date("Y");
	
	$ardate = arabicDate($nameday,$day,$namemonth,$year); //function to convert date to arabic

	
	move_uploaded_file($tmp ,'uploads/'.$name.'.jpg');
	$stmt = $con ->prepare("INSERT INTO news(title,text,image,date) values(:title,:text,:name,:ardate)");
	$stmt->execute(array(':title' => $title,':text' => $text,':name' => $name,':ardate' => $ardate));
	echo "تم الادخال بنجاح";
	
?>