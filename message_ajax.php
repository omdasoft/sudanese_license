<?php session_start();
	error_reporting(0);
	require_once('config.php');
		$name = $_POST["name"];
		$name = htmlspecialchars($name);
		$name = stripslashes($name);
		$email = $_POST["email"];
		$email = htmlspecialchars($email);
		$email = stripslashes($email);
		$phone = (int)($_POST["phone"]);
		$phone = htmlspecialchars($phone);
		$phone = stripslashes($phone);
		$msg   = $_POST["msg"];
		$msg   = htmlspecialchars($msg);
		$msg   = stripslashes($msg);
		$captcha = $_POST['captcha'];
		$captcha = htmlspecialchars($captcha);
		$captcha  = stripslashes($captcha);
		
		if($captcha != $_SESSION['digit']){
			echo "عفواً كود التحقق المدخل غير صحيح";
		}else{
			$stmt = $con->prepare("INSERT INTO message(name,msg,email,phone) values(:name,:msg,:email,:phone)");
			$stmt->execute(array(':name' => $name,':msg' => $msg,':email' => $email, ':phone' => $phone));
			echo "شكرا علي مراسلتنا "; 
		}
					
?>