<?php $pageTitle = "التشريعات والمعايير"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item active" aria-current="page">التشريعات والمعايير</li>
				  </ol>
			</nav>
			<!--start of all news section-->
			<section class="legislation wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
				<h1><i class="fa fa-gavel" aria-hidden="true"></i> التشريعات والمعايير</h1>
				<hr></hr>
				<br><br>
				<div class="row">
					<div class="col-lg-12">
						<table>
							<tr>
								<td>قرار إجازة الرخصة</td><td><a href="docs/sloc.pdf" target="new"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td><td><a href="docs/sloc.pdf" download><i class="fa fa-download fa-2x" aria-hidden="true"></i></a></td>
							</tr>
							<tr>
								<td> لائحة الرخصة السودانية لتشغيل الحاسوب </td><td><a href="docs/list.pdf" target="new"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td><td><a href="docs/list.pdf" download><i class="fa fa-download fa-2x" aria-hidden="true"></i></a></td>
							</tr>
							<tr>
								<td><a href="condition.php"> شروط إعتماد مراكز التدريب ومراكز الامتحانات </a></td><td><a href="docs/condition.pdf" target="new"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td><td><a href="docs/condition.pdf" download><i class="fa fa-download fa-2x" aria-hidden="true"></i></a></td>
							</tr>
							<tr>
								<td><a href="trainer-criteria.php"> معايير المدربين </a></td><td><a href="docs/trainer.pdf" target="new"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td><td><a href="docs/trainer.pdf" download><i class="fa fa-download fa-2x" aria-hidden="true"></i></a></td>
							</tr>
							<tr>
								<td><a href="exam-criteria.php">معايير مراكز الامتحانات</a></td><td><a href="docs/exam.pdf" target="new"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td><td><a href="docs/exam.pdf" download><i class="fa fa-download fa-2x" aria-hidden="true"></i></a></td>
							</tr>
							<tr>
								<td><a href="center-criteria.php">معايير مراكز التدريب</a></td><td><a href="docs/center.pdf" target="new"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td><td><a href="docs/center.pdf" download><i class="fa fa-download fa-2x" aria-hidden="true"></i></a></td>
							</tr>
						</table>
					</div>
				</div>
				
			</section>
			
			<?php include("includes/templates/footer.php"); // include footer file ?>
	