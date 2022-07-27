<?php
	session_start();
	ob_start();
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->

		<div class="content text-center">
			<div class="login">
				<h1>تسجيل الدخول</h1>
				<div class="row">
					<div class="col-sm-4">
						<div class="login-img">
							<image src="layout/images/login.png"/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="login-form">
							<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<div class="input-group">
									<span class="input-group-addon">الصلاحيه</span>
									<select name="privs" class="form-control" required="required" >
										<option></option>
										<option value="1">مدير عام</option>
										<option value="2">مدير مركز</option>
										<option value="3">مدير اخبار</option>
									</select>
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
									<input class="form-control" type="text" name="username" placeholder="اسم المستخدم" autocomplete="off" required="required">
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input class="form-control" type="password" name="password" placeholder="كلمة المرور" id = "pass" required="required"/>
									<i class="fa fa-eye show-pass"></i>
								</div>
								
								<div class="input-group">
									<input type = "submit" name = "submit" class = "btn btn-primary" value="دخول"/>
								</div>
							</form>
							<?php
								if(isset($_POST["submit"])){  //when user clicked the submit button do the flowing actions
									error_reporting(0);
									$user = $_POST['username'];
									$user = htmlspecialchars($user);
									$user = stripslashes($user);
									$pass = $_POST['password'];
									$pass = htmlspecialchars($pass);
									$pass = stripslashes($pass);
									$privs = $_POST['privs'];
									$privs = htmlspecialchars($privs);
									$privs = stripslashes($privs);
									//$hashPass = sha1($pass);
									
									//check if user exist in database
									
									$stmt = $con->prepare("SELECT userID , username , fullName , password ,privs FROM users WHERE username = ? AND password = ? AND privs = ? limit 1");
									$stmt ->execute(array($user, $pass, $privs));
									$row = $stmt ->fetch();
									$count = $stmt->rowCount();
									if($count > 0){
										$userID = $row['userID'];
										$username = $row['username'];
										$full = $row['fullName'];
										$privs = $row['privs'];
										$stmt2 = $con->prepare("INSERT INTO track_user(userID,username,fullName,privs,login,logout) VALUES(:userID,:username,:full,:privs,now(),0)");
										$stmt2->execute(array(':userID' => $userID,':username' => $username,':full' => $full,':privs' => $privs));
										$_SESSION['username'] = $user;
										$_SESSION['userID']   = $row['userID'];
										
										if($privs == 1){
										header('location: index.php');//redirec to dashboard
										exit();
										}else if($privs == 2){
										header('location: center_manager.php');//redirec to center manager page
										exit();	
										}else{
										header('location: news_manager.php');//redirec to news manager page
										exit();	
										}
									}else{
										
										echo "<div class='alert alert-danger'><h5>اسم المستخدم او كلمة المرور غير صحيحه <i class='fa fa-close'></i></h5></div>";
									}
								}				
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	include $tbl.'footer.php'; // include footer file
?>	
	</div> <!--end of the site container-->