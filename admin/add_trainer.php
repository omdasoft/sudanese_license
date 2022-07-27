<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'center-nav.php'; // include center manager navbar file ?>
		<div class="content text-center">
			<div class="add_center">
				<form id="new_trainer">
						<h2>اضافة مدرب معتمد</h2>
							<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="ar_name" required="required"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الاسم(عربى)
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="en_name"required="required" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الاسم(انجليزي)
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="birth_place" required="required" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											مكان الميلاد
										</div>
									</div>
									
									<div class="col-lg-10">
										<div class="form-group">
											<input type="date" class="form-control" name="birth_date" required="required"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											تاريخ الميلاد
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="address" required="required"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											العنوان
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="phone"required="required" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الهاتف
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="email"required="required" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											البريد
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="univercity"required="required" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الجامعه
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="faculity" required="required" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الكليه
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="degree" required="required"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الدرجه العلميه
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="specialty" required="required"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											التخصص
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="grad_date" required="required"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											تاريخ التخرج
										</div>
									</div>
									<!--
									<div class="col-lg-10">
										<div class="form-group">
											<input type="file"  name="experiance"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الخبرات العمليه
										</div>
									</div>
									-->
							</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-lg add" value="حفظ" />
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