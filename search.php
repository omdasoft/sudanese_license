<?php $pageTitle = "نتيجة البحث"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--start of all news section-->
			<section class="search-result">
				<div class="table-responsive">
	
							<?php 
								include("config.php");
								if(isset($_POST["submit"])){
									$search = $_POST["search"];
									$serach = htmlspecialchars($search);
									$serach = stripslashes($serach);
									if(empty($search)){
										echo "<div class='btn btn-danger'>ادخل كلمة البحث</div>";
									}else{
										$stmt = $con->prepare("SELECT * FROM news WHERE title LIKE ?");
										$stmt->execute(array("%$_POST[search]%"));
										$rows = $stmt->fetchALL();
										$num = $stmt->rowCount();
									if($num == 0){
										echo "<div class='btn btn-danger'>لا توجد نتيجة لهذا البحث</div>";
									}else{
											echo "
												<table class='table'>
													<tr>
														<td>العنوان</td>
														<td>التاريخ</td>
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
										
									}
								}
							?>
					
				</div>
			</section>
			<?php include("includes/templates/footer.php"); // include footer file ?>
	