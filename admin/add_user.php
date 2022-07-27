<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'navbar.php'; // include center manager navbar file ?>
		<div class="content text-center">
			<div class="manage_admin">
				<h2>اضافة مستخدم</h2>
				<form id="add_user">
					<div class="form-group">
						<input type="text" name="username" class="form-control user" placeholder="اسم المستخدم" required="required"/>
					</div>
					<div class="form-group"> 
						<input type="text" name="password" class="form-control pass" placeholder="كلمة المرور" required="required"/>
					</div>
					<div class="form-group">
						<input type="text" name="email"  class="form-control email" placeholder="البريد" required="required"/>
					</div>
					<div class="form-group">
						<input type="text" name="full" class="form-control full" placeholder="الاسم الكامل" required="required" />
					</div>
					<div class="form-group">
						<select name="privs" class="form-control" required="required" >
							<option></option>
							<option value="2">مدير مركز</option>
							<option value="3">مدير اخبار</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-lg" value="حفظ"/>
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