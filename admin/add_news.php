<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'news-nav.php'; // include news navbar file ?>
		<div class="content text-center">
			<div class="add_center">
				<form id="news" enctype="multipart/form-data">
						<h2>اضافة خبر جديد</h2>
							<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" name="title" id="title"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											عنوان الخبر
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<textarea class="form-control" name="text" rows="15" id="text">
												
											</textarea>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الخبر
										</div>
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="file"  name="image" id="img"/>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="label">
											الصوره
										</div>
									</div>
							</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-lg add" value="حفظ" />
						<input type="reset" class="btn btn-danger btn-lg" value="مسح" />
					</div>
				</form>
			</div>
		</div>
	<?php
	include $tbl.'footer.php'; // include footer file
?>	
	<!----<script src="ckeditor/ckeditor.js"></script>-->
	</div> <!--end of the site container-->
	<?php
}else{
	header('location:login.php');	
}