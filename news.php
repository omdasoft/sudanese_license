<?php $pageTitle = "اخر الاخبار"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item active" aria-current="page">الاخبار</li>
				  </ol>
			</nav>
			<!--start of all news section-->
			<section class="all-news" id="last-news">
				<div class="container-fluid">
					<div class="table-responsive">
							<?php 
								include("config.php");

								$stmt = $con->prepare("SELECT * FROM news order by ID desc limit 20");
								$stmt->execute();
								$rows = $stmt->fetchALL();
								$num = $stmt->rowCount();
								if($num == 0){
									echo "<div class='btn-btn-danger'>عفوا لا توجد اخبار جديده</div>";
								}else{
									echo "
										<table class='table'>
											<tr>
												<td>العنوان</td><td>التاريخ</td>
											</tr>
										";
									foreach($rows as $row){
										?>
											
												<tr>
													<td>
														<a href="full-post.php?ID=<?php echo $row["ID"]; ?>"><?php echo $row["title"]; ?></a>
													</td>
													<td>
														<?php echo $row["date"]; ?>
													</td>
												</tr>
											
										<?php
									}
									
									echo "</table>";
								}
					
						?>
					</div>	
				</div>
			
			<?php include("includes/templates/footer.php"); // include footer file ?>
			
		
