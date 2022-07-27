<?php $pageTitle = "مراكز الرخصة"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item active" aria-current="page">مراكز الرخصة</li>
				  </ol>
			</nav>
			<!--start of all news section-->
			<section class="slco-center">
				<h1><i class="fa fa-archive" aria-hidden="true"></i> مراكز الرخصة </h1>
				<hr></hr>
				<br><br>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="center-block wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
								<i class="fa fa-pie-chart fa-4x"></i>								
								<h4><a href="total-center.php">مراكز تدريب معتمده</a></h4>
								<span><?php echo rowcount("certified_cnt","basic_data",1); ?></span>
							</div>
							
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="center-block wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.5s">
								<i class="fa fa-line-chart fa-3x"></i>								
								<h4><a href="total-examCnt.php">مراكز امتحانات معتمده</a></h4>
								<span><?php echo rowcount("exam_cnt","basic_data",1); ?></span>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="center-block wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.7s">
								<i class="fa fa-user fa-3x"></i>								
								<h4><a href="total-trainers.php">مدربين معتمدين</a></h4>
								<span><?php echo tableCount("trainer"); ?></span>
							</div>
						</div>
					</div>
				</div>
			</section>
		
			<?php include("includes/templates/footer.php"); // include footer file ?>
			
		