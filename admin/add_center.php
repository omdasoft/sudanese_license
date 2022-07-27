<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'center-nav.php'; // include center navbar file ?>
		<div class="content text-center">
			<div class="add_center">
				<form method="post" id="new_cnt">
						<h2>اضافة مركز جديد</h2>
							<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="cnt_name"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											اسم المركز
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="creat_date"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											تاريخ الانشاء
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="owner"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الجهة المالكه
										</div>
									</div>
									
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="register"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الجهة المسجل لديها
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<select name="city" class="form-control">
												<option>الخرطوم</option>
												<option>الشمالية</option>
												<option>نهر النيل</option>
												<option>البحر الاحمر</option>
												<option>كسلا</option>
												<option>القضارف</option>
												<option>الجزيرة</option>
												<option>النيل الابيض</option>
												<option>النيل الازرق</option>
												<option>سنار</option>
												<option>شمال كردفان</option>
												<option>غرب كردفان</option>
												<option>جنوب كردفان</option>
												<option>شمال دار فور</option>
												<option>جنوب دار فور</option>
												<option>شرق دار فور</option>
												<option>غرب دار فور</option>
												<option>وسط دار فور</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الولاية
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="address"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											العنوان
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="phone"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الهاتف
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="url"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الموقع الالكتروني
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="email"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											البريد
										</div>
									</div>
							</div>
					
					<div class="form-group">
						<input type="button" class="btn btn-primary btn-lg add" value="حفظ" />
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