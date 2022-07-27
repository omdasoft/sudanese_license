<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'center-nav.php'; // include navbar file ?>
		<div class="content text-center">
		<h2>تعديل بيانات المراكز</h2>
			<div class="add_center">
			<?php 
				$id = $_GET["id"];
				$stmt = $con->prepare("SELECT * FROM basic_data WHERE cntID = ?");
				$stmt->execute(array($id));
				$rows = $stmt->fetchALL();
				foreach($rows as $row){
			?>
				<form method="post" id="myform">
					<div class="row">
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="cnt_name" value ="<?php echo $row['cnt_name'] ?>"/>
								<input type="hidden"  name="id" value ="<?php echo $row['cntID'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								اسم المركز
							</div>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="create_date" value ="<?php echo $row['create_date'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								تاريخ الانشاء
							</div>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="owner" value ="<?php echo $row['owner'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								الجهة المالكه
							</div>
						</div>
												
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="register" value ="<?php echo $row['reg_to'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								الجهة المسجل لديها
							</div>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<select name="city" class="form-control" value="<?php echo $row['city'] ?>">
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
								الولايه
							</div>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="address" value ="<?php echo $row['address'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								العنوان
							</div>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="phone" value ="<?php echo $row['phone'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								الهاتف
							</div>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="url" value ="<?php echo $row['url'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								الموقع الالكتروني
							</div>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" name="email" value ="<?php echo $row['email'] ?>"/>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="label">
								البريد
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<input type="button" id="update" value="update" class="btn btn-success" />
							</div>
						</div>
					</div>
				</form>
			<?php } ?>
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