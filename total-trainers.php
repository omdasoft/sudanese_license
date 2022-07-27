<?php $pageTitle = "قائمة المدربين المعتمدين"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item"><a href="slco-center">مراكز الرخصة</a></li>
					<li class="breadcrumb-item active" aria-current="page">المدربين المعتمدين</li>
				  </ol>
			</nav>
			<!--start of all news section-->
						<section class="approvedcnt-list">
				<div class="table-responsive">
					<table class="table table-striped  wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
					  <thead>
						<tr>
							<th>الاسم</th>
							<th>الجامعة</th>
							<th>الكلية</th>
							<th>التخصص</th>
							<th>العنوان</th>
							<th>الهاتف</th>
							<th>البريد</th>
						</tr>
					  </thead>
					  <tbody>
						<?php 
						$cntID = 1;
						$stmt = $con->prepare("SELECT * FROM trainer order by ID DESC"); // select all approved center from database
						$stmt->execute();
						$count = $stmt->rowCount(); // count number of rows in db 
						$rows = $stmt->fetchALL(); // fetch all data from db
						$per_page = 10;
						$offset = 0;
						$num_of_page = ceil($count/$per_page);
						if(isset($_GET['page'])){
							$current_page = $_GET['page'];
							$offset = ($per_page * $current_page) - $per_page;
						}
						$page_data = $con->prepare("SELECT * FROM trainer order by ID DESC limit ".$per_page." OFFSET ".$offset."");
						$page_data->execute();
						$select = $page_data->fetchALL();
						foreach($select as $sel){
							?>
							
								<tr>
									<td><?php echo $sel["ar_name"] ?></td>
									<td><?php echo $sel["univercity"] ?></td>
									<td><?php echo $sel["faculity"] ?></td>
									<td><?php echo $sel["specialty"] ?></td>
									<td><?php echo $sel["address"] ?></td>
									<td><?php echo $sel["phone"] ?></td>
									<td><?php echo $sel["email"] ?></td>
								</tr>
							<?php
						}
						
						?>
					
					  </tbody>
					</table>
				</div>
				
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
					<li class="page-item disable">
					  <a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Previous</span>
					  </a>
					</li>
					<?php

						for($p = 1;$p <= $num_of_page; $p++){
							?>
							
								<li class="page-item"><a class="page-link " href="?page=<?php echo $p ?>"><?php echo $p ?></a></li>
							<?php
						}
					?>
					<li class="page-item">
					  <a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Next</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</section>
			<?php include("includes/templates/footer.php"); // include footer file ?>
		