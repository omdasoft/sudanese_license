<?php 
include("config.php");
error_reporting(0);
	$id = $_POST['id'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	$tmp = $_FILES['image']['tmp_name'];
	$new_image = $_FILES['image']['name'];
	$name = rand();
	if(empty($image)){
		$stmt1 = $con ->prepare("UPDATE news SET title = '$title', text = '$text' WHERE ID = ?");
		$stmt1->execute(array($id));
		echo "تم التعديل بنجاح";
	}else{
		
		move_uploaded_file($tmp ,'uploads/'.$name.'.jpg');
		$stmt2 = $con ->prepare("UPDATE news SET title = '$title', text = '$text' image = '$name' WHERE ID = ?");
		$stmt2->execute(array($id));
		echo "تم التعديل بنجاح";
	}
?>