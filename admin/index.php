<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'navbar.php'; // include navbar file ?>
		<div class="content text-center">
			<div class="main-blocks">
				<div class="row">
					<div class="col-lg-6">
						<div class="block" data-toggle="modal" data-target="#users">
							<i class="fa fa-user fa-3x"></i>
							<h4>المستخدمين</h4>
							<span><?php echo rowcount("super","users",0); ?></span>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="block" data-toggle="modal" data-target="#track_users">
							<i class="fa fa-line-chart fa-3x"></i>
							<h4>تسجيلات الدخول</h4>
							<span><?php echo track_user("track_user"); // this function is used to display total users login to database ?></span>
						</div>
					</div>
				</div>
				<!--modal to display details of center-->
				<!--start of users model-->
				<div class="modal fade" id="users">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>عرض المستخدمين</h2>
							</div>
							<div class="modal-body">
								<?php
									$stmt = $con->prepare("SELECT * FROM users WHERE super != 1");
									$stmt->execute();
									$rows = $stmt->fetchALL();
									$num = $stmt->rowCount();
									if($num == 0){
										echo "<h3>لا يوجد مستخدمين</h3>";
									}else{
										
									?>
									
										<table class="table-bordered last_news_table">
											<th>الرقم</th>
											<th>اسم المستخدم</th>
											<th>كلمة المرور</th>
											<th>الاسم الكامل</th>
											<th>البريد</th>
											<th>الصلاحيه</th>
											<th>#</th>
											<?php
											  foreach ($rows as $row) {
											    $id = $row['userID'];
												echo "<tr>";
												  echo "<td>$id</td>";
												  echo "<td>".$row['username']."</td>";
												  echo "<td>".$row['password']."</td>";
												  echo "<td>".$row['fullName']."</td>";
												  echo "<td>".$row['email']."</td>";
												  echo "<td>".privs('users',$id)."</td>"; // this function used to display privs in table
												  //echo "<td><a href='#?id=$id' class='confirm btn btn-danger'><i class ='fa fa-close'></i>الغاء التفعيل</a></td>";
												  echo "<td><a href='delete_user.php?id=$id' class='confirm btn btn-danger'><i class ='fa fa-close'></i> حذف</a></td>";
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
				<!--end of user modal-->
				<!--start of track user modal-->
				<div class="modal fade" id="track_users">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>تسجيلات الدخول</h2>
							</div>
							<div class="modal-body">
								<?php
									$stmt = $con->prepare("SELECT * FROM track_user WHERE privs != 1 order by id desc");
									$stmt->execute();
									$rows = $stmt->fetchALL();
									$num = $stmt->rowCount();
									if($num == 0){
										echo "<h3>لا توجد تسجيلات دخول حديثة</h3>";
									}else{
										
									?>
									
										<table class="table-bordered last_news_table">
											<th>اسم المستخدم</th>
											<th>الاسم الكامل</th>
											<th>الصلاحيه</th>
											<th>تاريخ الدخول</th>
											<th>تاريخ الخروج</th>
											<?php
											  foreach ($rows as $row) {
												  $id = $row['userID'];
												echo "<tr>";
												  echo "<td>".$row['username']."</td>";
												  echo "<td>".$row['fullName']."</td>";
												  echo "<td>".privs('track_user',$id)."</td>"; // this function used to display privs in table
												  echo "<td>".$row['login']."</td>";
												  echo "<td>".$row['logout']."</td>";
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
				<!--end of track user modal-->
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