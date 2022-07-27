<?php 
session_start();
if(isset($_SESSION['username'])){
	error_reporting(0);
	$pageTitle = "لوحة التحكم"; 
	//include initalization file wich include connection to databse file , header, head 
	include("config.php"); // configration database file include
	include("includes/functions/function.php"); // functions file include
	include("includes/templates/header.php");//include header file
	include("includes/templates/head.php");//include site head file
	include("includes/templates/dashboard-nav.php");//include dashbard navbar  file
?>
	<section class="dashboard">
		<h1>البرامج الحالية</h1>
		<hr></hr>
		<h3 style="color:#09a6b9">برامج المراكز :</h3>
		<br>
		<div class="table-responsive">
			
			<?php
				$adminID = $_SESSION["userID"];
				$stmt = $con->prepare("SELECT * FROM basic_data WHERE adminID = ? order by cntID DESC");
				$stmt->execute(array($adminID));
				$count = $stmt->rowCount();
				$rows = $stmt->fetchALL();
				if($count == 0){
					echo "<div class = 'alert alert-danger'>لم يتم التقديم لمركز معتمد</div>"; 
				}else{
					echo "<table class='table'>
							<tr>
								<th>اسم المركز</th>
								<th>نوع التقديم</th>
								<th>الحالة</th>
								<th>تاريخ الاعتماد</th>
								<th>تاريخ انتهاء الاعتماد</th>
							</tr>";
							
							foreach($rows as $row){
								?>
								<tr>
									<td><?php echo $row["cnt_name"] ?></td>
									<td>
										<?php 
											$apply_type = $row["apply_type"];
											switch($apply_type){
												case 1: echo "مركز تدريب";
												break;
												case 2: echo "مركز إمتحان";
												break;
												case 3: echo "مركز تدريب و إمتحان";
												break;
												default : echo "غير معلوم";
											}
										?>
									</td>
									<td>
										<?php
											$is_cert = $row["certified_cnt"];
											if($is_cert ==  0){
												echo "<div style='color:red'>غير معتمد</div>";
											}else{
												echo "<div style='color:green'>معتمد</div>";
											}
										?>
									</td>
									<td>
										<?php
											if($is_cert ==  0){
												$cert_date = 0;
												echo $cert_date;
											}else{
												$cert_date = $row["cert_date"];
												echo $cert_date;
											}
											
										?>
									</td>
									<td>
										<?php
											if($is_cert ==  0){
												echo "0";
											}else{
												$crt_date = strtotime($cert_date);
												$end_date = strtotime("next year",$crt_date);
												echo date("Y-m-d",$end_date);
											}
										?>
									</td>
								</tr>
										
								<?php
							}		
								echo "</table>";
								}	
								?>

		</div>	
		<h3 style="color:#09a6b9">برامج المدربين :</h3>
		<br>
		<div class="table-responsive">
			<?php
				$adminID = $_SESSION["userID"];
				$stmt2 = $con->prepare("SELECT * FROM  trainer WHERE adminID = ? order by ID DESC");
				$stmt2->execute(array($adminID));
				$count2 = $stmt2->rowCount();
				$rows2 = $stmt2->fetchALL();
				if($count2 == 0){
					echo "<div class = 'alert alert-danger'>لم يتم التقديم لمدرب معتمد</div>"; 
				}else{
					echo "<table class='table'>
							<tr>
								<th>الاسم</th>
								<th>الجامعة</th>
								<th>التخصص</th>
								<th>العنوان</th>
								<th>الحالة</th>
							</tr>";
							
							foreach($rows2 as $row2){
								?>
								<tr>
									<td><?php echo $row2["ar_name"]?></td>
									<td><?php echo $row2["univercity"]?></td>
									<td><?php echo $row2["specialty"] ?></td>
									<td><?php echo $row2["address"] ?></td>
									<td>
										<?php
											$cert_trainer = $row2["is_cert"];
											if($cert_trainer ==  0){
											
												echo "<div style='color:red'>غير معتمد</div>";
											}else{
												echo "<div style='color:green'>معتمد</div>";
											}
											
										?>
									</td>
								</tr>
										
								<?php
							}		
								echo "</table>";
								}	
								?>
		</div>
	</section>
	<?php 
		include("includes/templates/footer.php"); // include footer file
	?>
	<?php
}else{
	header("location: login.php");
}