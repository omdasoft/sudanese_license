<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'news-nav.php'; // include navbar file ?>
		<div class="content text-center">
			<div class="add_center">
			<?php
				$id = $_GET["id"];
				$stmt = $con->prepare("SELECT * FROM news WHERE ID = ?");
				$stmt->execute(array($id));
				$rows = $stmt->fetchALL();
				foreach($rows as $row){
			?>
				<form id="update_news" enctype="multipart/form-data">
						<h2>تعديل اخر الاخبار</h2>
							<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<input type="hidden" name="id" value="<?php echo $row['ID'] ?>" />
											<input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title'] ?>"/>
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
												<?php echo $row['text'] ?>
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
						<input type="submit" class="btn btn-success btn-lg add" value="تعديل" />
					</div>
				</form>
				<?php
				}
				?>
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