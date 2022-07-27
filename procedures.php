<?php $pageTitle = "الخدمات والاجراءات"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item active" aria-current="page">الخدمات والاجراءات</li>
				  </ol>
			</nav>
			<!--start of all news section-->
			<section class="procedures">
				<h1><i class="fa fa-tasks" aria-hidden="true"></i> الخدمات والاجراءات</h1>
				<hr></hr>
				<br><br>
				<ul>
					<li><a href="cert-center.php">إجراءات اعتماد مراكز التدريب</a></li>
					<li><a href="approved-exam.php">إجراءات اعتماد مراكز الامتحان</a></li>
					<li><a href="approved-trainer.php">إجراءات اعتماد المدربين</a></li>
					<li><a href="skill-card.php"> إجراءات شراء بطاقة  المهارات</a></li>
					<li><a href="get-exam.php">إجراءات شراء الامتحانات </a></li>
				</ul>
				
			</section>
			
			<?php include("includes/templates/footer.php"); // include footer file ?>
			
	