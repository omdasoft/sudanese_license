<?php 
session_start();
if(isset($_SESSION['username'])){
	include("ini.php"); // include initilization file
	include $tbl.'header.php'; // include header file
	?>
	<div class="container"> <!--start of the site container-->
	<?php include $tbl.'center-nav.php'; // include center navbar file ?>
		<div class="content text-center">
			<div class="main-blocks">
				<div class="row">
					<div class="col-lg-3">
						<div class="block" data-toggle="modal" data-target="#uncert_center">
							<i class="fa fa-cogs fa-3x"></i>
							<h4>مراكز تحت الاعتماد</h4>
							<span><?php echo rowcount("certified_cnt","basic_data",0); ?></span>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="block" data-toggle="modal" data-target="#certified_cnt">
							<i class="fa fa-bank fa-3x"></i>
							<h4>مراكز تدريب معتمده</h4>
							<span><?php echo rowcount("certified_cnt","basic_data",1); ?></span>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="block" data-toggle="modal" data-target="#certified_exam_cnt">
							<i class="fa fa-graduation-cap fa-3x"></i>
							<h4>مراكز امتحانات معتمده</h4>
							<span><?php echo rowcount("exam_cnt","basic_data",1); ?></span>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="block" data-toggle="modal" data-target="#trainer">
							<i class="fa fa-users fa-3x"></i>
							<h4>مدربين معتمدين</h4>
							<span><?php echo tableCount("trainer"); ?></span>
						</div>
					</div>
					
				</div>
				
					
				
				<!--modal to display details of center-->
				
				<!--uncertified center modal-->
				<div class="modal fade" id="uncert_center">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>مراكز تحت الاعتماد</h2>
							</div>
							<div class="modal-body">
								<?php
									$stmt1 = $con->prepare("SELECT * FROM  basic_data WHERE certified_cnt = 0 ORDER BY cntID ASC");
									$stmt1->execute();
									$rows = $stmt1->fetchALL();
									$num = $stmt1->rowCount();
									if($num == 0){
										echo "<h3>لا توجد مراكز تحت الاعتماد</h3>";
									}else{
									?>
									
										<table class="table-bordered">
											<th>الرقم</th>
											<th>اسم المركز</th>
											<th>تاريخ الانشاء</th>
											<th>العنوان</th>
											<th>التلفون</th>
											<th>البريد</th>
											<th>مركز تدريب</th>
											<th>مركز امتحان</th>
											<th>#</th>
											<th>#</th>
											<?php
											  foreach ($rows as $row) {
											    $cntID = $row['cntID'];
												echo "<tr>";
												  echo "<td>$cntID</td>";
												  echo "<td>".$row['cnt_name']."</td>";
												  echo "<td>".$row['create_date']."</td>";
												  echo "<td>".$row['address']."</td>";
												  echo "<td>".$row['phone']."</td>";
												  echo "<td>".$row['email']."</td>";
												  echo "<td><a href='certified_training_cnt.php?id=$cntID' class='btn btn-primary'><i class ='fa fa-check'></i>اعتماد</a></td>";
												  echo "<td><a href='certified_exam_cnt.php?id=$cntID' class='btn btn-primary'><i class ='fa fa-check'></i> اعتماد</a></td>";
												  echo "<td><a href='delete_cnt.php?id=$cntID' class='confirm btn btn-danger'><i class ='fa fa-close'></i> حذف</a></td>";
												  echo "<td><a href='edit_cnt_data.php?id=$cntID' class='btn btn-success'><i class ='fa fa-edit'></i> تعديل</a></td>";
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
				<!--end of uncertified cenetr-->
				<!--start of certified center modal-->
					<div class="modal fade" id="certified_cnt">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>مراكز تدريب معتمده</h2>
							</div>
							<div class="modal-body">
								<?php
									$stmt1 = $con->prepare("SELECT * FROM  basic_data WHERE certified_cnt = 1 ORDER BY cntID ASC");
									$stmt1->execute();
									$rows = $stmt1->fetchALL();
									$num = $stmt1->rowCount();
									if($num == 0){
										echo "<h3>لا توجد مراكز معتمده</h3>";
									}else{
									?>
									
										<table class="table-bordered">
											<th>الرقم</th>
											<th>اسم المركز</th>
											<th>تاريخ الانشاء</th>
											<th>تاريخ الاعتماد</th>
											<th>الصلاحية</th>
											<th>العنوان</th>
											<th>التلفون</th>
											<th>البريد</th>
											<th>مركز امتحان</th>
											<th>#</th>
											<th>#</th>
											<?php
											  foreach ($rows as $row) {
											    $id = $row['cntID'];
												$cert_date = $row['cert_date'];
												echo "<tr>";
												  echo "<td>$id</td>";
												  echo "<td>".$row['cnt_name']."</td>";
												  echo "<td>".$row['create_date']."</td>";
												  echo "<td>".$row['cert_date']."</td>";
												  echo "<td>".check_cnt_date($id,$cert_date)."</td>";
												  echo "<td>".$row['address']."</td>";
												  echo "<td>".$row['phone']."</td>";
												  echo "<td>".$row['email']."</td>";
												  echo "<td><a href='certified_exam_cnt.php?id=$id' class='btn btn-primary'><i class ='fa fa-check'></i> اعتماد</a></td>";
												  echo "<td><a href='cancel_training_cnt.php?id=$id' class='btn btn-danger'><i class ='fa fa-close'></i>الغاء الاعتماد</a></td>";
												  echo "<td><a href='edit_cnt_data.php?id=$id' class='btn btn-success'><i class ='fa fa-edit'></i> تعديل</a></td>";
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
				
				<!--end  of certified center modal-->
				<!--start of certitied exam-->
				<div class="modal fade" id="certified_exam_cnt">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>مراكز امتحانات معتمده</h2>
							</div>
							<div class="modal-body">
								<?php
									$stmt1 = $con->prepare("SELECT * FROM  basic_data WHERE exam_cnt = 1 ORDER BY cntID ASC");
									$stmt1->execute();
									$rows = $stmt1->fetchALL();
									$num = $stmt1->rowCount();
									if($num == 0){
										echo "<h3>لا توجد مراكز امتحانات معتمده</h3>";
									}else{
									?>
									
										<table class="table-bordered">
											<th>الرقم</th>
											<th>اسم المركز</th>
											<th>تاريخ الانشاء</th>
											<th>العنوان</th>
											<th>التلفون</th>
											<th>البريد</th>
											<th>#</th>
											<th>#</th>
											<?php
											  foreach ($rows as $row) {
											    $id = $row['cntID'];
												echo "<tr>";
												  echo "<td>$id</td>";
												  echo "<td>".$row['cnt_name']."</td>";
												  echo "<td>".$row['create_date']."</td>";
												  echo "<td>".$row['address']."</td>";
												  echo "<td>".$row['phone']."</td>";
												  echo "<td>".$row['email']."</td>";
												  echo "<td><a href='cancel_exam_cnt.php?id=$id' class='btn btn-danger'><i class ='fa fa-close'></i>الغاء الاعتماد</a></td>";
												  echo "<td><a href='edit_cnt_data.php?id=$id' class='btn btn-success'><i class ='fa fa-edit'></i> تعديل</a></td>";
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
			
				<!--end of certified exam-->
			
				<!--start of certified trainer-->
				<div class="modal fade" id="trainer">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>مدربين معتمدين</h2>
							</div>
							<div class="modal-body">
								<?php
									$stmt1 = $con->prepare("SELECT * FROM  trainer ORDER BY ID ASC");
									$stmt1->execute();
									$rows = $stmt1->fetchALL();
									$num = $stmt1->rowCount();
									if($num == 0){
										echo "<h3>لا يوجد مدربين معتمدين</h3>";
									}else{
									?>
									
										<table class="table-bordered last_news_table">
											<th>الرقم</th>
											<th>الاسم</th>
											<th>مكان الميلاد</th>
											<th>تاريخ الميلاد</th>
											<th>العنوان</th>
											<th>الهاتف</th>
											<th>الجامعه</th>
											<th>الكليه</th>
											<th>التخصص</th>
											<th>الدرجه العلميه</th>
											<th>تاريخ التخرج</th>
											<th>#</th>
											<th>#</th>
											
											<?php
											  foreach ($rows as $row) {
											    $id = $row['ID'];
												echo "<tr>";
												  echo "<td>$id</td>";
												  echo "<td>".$row['ar_name']."</td>";
												  echo "<td>".$row['birth_place']."</td>";
												  echo "<td>".$row['birth_date']."</td>";
												  echo "<td>".$row['address']."</td>";
												  echo "<td>".$row['phone']."</td>";
												  echo "<td>".$row['univercity']."</td>";
												  echo "<td>".$row['faculity']."</td>";
												  echo "<td>".$row['specialty']."</td>";
												  echo "<td>".$row['degree']."</td>";
												  echo "<td>".$row['grad_date']."</td>";

												  echo "<td><a href='delete_trainer.php?id=$id' class='confirm btn btn-danger'><i class ='fa fa-close'></i> حذف</a></td>";
												  echo "<td><a href='edit_trainer.php?id=$id' class='btn btn-success'><i class ='fa fa-edit'></i> تعديل</a></td>";
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
				
				
				<!--end of certified trainer-->
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