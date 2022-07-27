<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'news-nav.php'; // include navbar file ?>
		<div class="content text-center">
			<div class="main-blocks">
				<div class="row">
					<div class="col-lg-6">
						<div class="block" data-toggle="modal" data-target="#last_news">
							<i class="fa fa-pencil fa-3x"></i>
							<h4>اخر الاخبار</h4>
							<span><?php echo tableCount("news"); ?></span>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="block">
							<i class="fa fa-envelope-o fa-3x"></i>
							<h4>اخر الرسائل</h4>
							<span>5</span>
						</div>
					</div>
				</div>
				<!--modal to display details of center-->
				<!--start of last news-->
				<div class="modal fade" id="last_news">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>عرض اخر الاخبار</h2>
							</div>
							<div class="modal-body">
								<?php
									$stmt1 = $con->prepare("SELECT * FROM  news ORDER BY ID ASC");
									$stmt1->execute();
									$rows = $stmt1->fetchALL();
									$num = $stmt1->rowCount();
									if($num == 0){
										echo "<h3>لا توجد اخبار</h3>";
									}else{
									?>
									
										<table class="table-bordered last_news_table">
											<th>الرقم</th>
											<th>العنوان</th>
											<th>التاريخ</th>
											<th>#</th>
											<th>#</th>
											<?php
											  foreach ($rows as $row) {
											    $id = $row['ID'];
												echo "<tr>";
												  echo "<td>$id</td>";
												  echo "<td>".$row['title']."</td>";
												  echo "<td>".$row['date']."</td>";
												  echo "<td><a href='delete_news.php?id=$id' class='confirm btn btn-danger'><i class ='fa fa-close'></i> حذف</a></td>";
												  echo "<td><a href='edit_news.php?id=$id' class='btn btn-success'><i class ='fa fa-edit'></i> تعديل</a></td>";
												echo "</tr>";
												
											  }
											?>
										</table>
									<?php } ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-defualt" data-dismiss="modal">close</button>
							</div>
						</div>
					</div>
				</div>
				<!--end of last news-->
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