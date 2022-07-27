<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'center-nav.php'; // include center manager navbar file ?>
		<div class="content text-center">
			<div class="manage_admin">
			<?php
				$id   = $_SESSION['userID'];
				$stmt = $con->prepare("SELECT * FROM users where userID = $id");
				$stmt->execute();
				$row  = $stmt->fetch();
			?>
				<h2>تعديل بيانات مدير المركز <i class="fa fa-gear"></i></h2>
				<form method="post">
					<input type="hidden" value="<?php echo $row["userID"] ?>" class="form-control id"/>

					<div class="form-group">
						<input type="text" name="username" value="<?php echo $row["username"] ?>" class="form-control user"/>
					</div>
					<div class="form-group"> 
						<input type="text" name="password" value="<?php echo $row["password"] ?>" class="form-control pass"/>
					</div>
					<div class="form-group">
						<input type="text" name="email" value="<?php echo $row["email"] ?>" class="form-control email"/>
					</div>
					<div class="form-group">
						<input type="text" name="full" value="<?php echo $row["fullName"] ?>" class="form-control full"/>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-primary edit_user">save</button>
					</div>
				</form>
			</div>
		</div>
	<?php
	include $tbl.'footer.php'; // include footer file
?>	
	</div> <!--end of the site container-->
	<?php
}else{
	header('location:login.php');	
}