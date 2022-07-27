<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'center-nav.php'; // include navbar file ?>
		<div class="content text-center">
		<h2>تعديل بيانات المتدربين</h2>
			<div class="add_center">
			<?php 
				$id = $_GET["id"];
				$stmt = $con->prepare("SELECT * FROM trainer WHERE ID = ?");
				$stmt->execute(array($id));
				$rows = $stmt->fetchALL();
				foreach($rows as $row){
			?>
				<form id="update_trainer">
							<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="ar_name" required="required" value="<?php echo $row['ar_name'] ?>"/>
											<input type="hidden" name="id" value="<?php echo $row['ID'] ?>" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الاسم(عربى)
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="en_name"required="required" value="<?php echo $row['en_name'] ?>" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الاسم(انجليزي)
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="birth_place" required="required" value="<?php echo $row['birth_place'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											مكان الميلاد
										</div>
									</div>
									
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="birth_date" required="required" value="<?php echo $row['birth_date'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											تاريخ الميلاد
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="address" required="required" value="<?php echo $row['address'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											العنوان
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="phone"required="required" value="<?php echo $row['phone'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الهاتف
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="email"required="required" value="<?php echo $row['email'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											البريد
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="univercity"required="required" value="<?php echo $row['univercity'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الجامعه
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="faculity" required="required" value="<?php echo $row['faculity'] ?>" />
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الكليه
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="degree" required="required" value="<?php echo $row['degree'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الدرجه العلميه
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="specialty" required="required" value="<?php echo $row['specialty'] ?>"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											التخصص
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="grad_date" required="required" value="<?php echo $row['grad_date'] ?>"/>
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
						<input type="submit" name="submit" class="btn btn-success btn-lg" value="تعديل" />
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