<?php $pageTitle = "كل الاخبار"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--start of all news section-->
			<section class="full-post">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-8">
							<?php 
								if(isset($_GET["ID"])){
									$postID = (int)htmlspecialchars($_GET["ID"]);
									$stmt = $con->prepare("SELECT * FROM news WHERE ID = ?");
									$stmt->execute(array($postID));
									$row = $stmt->fetch();
									$num = $stmt->rowCount();
									if($num == 0){
										echo "عفواً لا توجد بيانات بهذا الرقم";
									}else{
							?>
							<h3><?php echo $row["title"]; ?></h3>
							<h5>نشر بتاريخ :<?php echo $row["date"]; ?></h5>
							<!-- AddThis Button BEGIN !--> <div class="addthis_toolbox addthis_default_style addthis_32x32_style"> <a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a> <a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a> </div> <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script> <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f756ef243bad71a"></script> <!-- AddThis Button END -->
							<hr></hr>
							<div class="img">
								<image src="admin/uploads/<?php echo $row["image"].'.jpg' ?>" title="news title" alt="news" width="257" height="171">
							</div>
							<p class="lead"><?php echo $row["text"]; ?></p>
							<?php
							}
							}
							?>
							<div id="disqus_thread"></div>
								<script>

								/**
								*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
								*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
								/*
								var disqus_config = function () {
								this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
								this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
								};
								*/
								(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://sloc-gov-sd.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
								})();
								</script>
								<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
															
						</div>
						<div class="col-lg-4">
							<div class="related">
								<ul class="list-group">
								  <h5 class="list-group-title">
									  <span class="arraw" style="display: none;"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i></span>
									  <span class="arraw" style="display: inline;"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i></span>
									  مواضيع ذات صلة
								  </h5>
									<?php 

										$select = $con->prepare("SELECT ID ,title FROM news WHERE ID != $postID order by ID desc limit 20");
										$select->execute();
										$rows = $select->fetchALL();
										$num = $select->rowCount();
										if($num == 0){
											echo "<div class='btn-btn-danger'>عفوا لا توجد اخبار جديده</div>";
										}else{
											
											foreach($rows as $row){
												?>
													<li class="list-group-item"><a href="full-post.php?ID=<?php echo $row["ID"]; ?>"><?php echo $row['title'];  ?></a></li>

												<?php
											}
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php include("includes/templates/footer.php"); // include footer file ?>
			
		
	