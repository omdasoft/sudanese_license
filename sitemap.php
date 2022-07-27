<?php $pageTitle = "خريطة الموقع"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item active" aria-current="page">خريطة الموقع</li>
				  </ol>
			</nav>
			<!--start of all news section-->
			<section class="site-links wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">			
				<h1><i class="fa fa-sitemap" aria-hidden="true"></i> خريطة الموقع</h1>
				<hr></hr>
				<br><br>
				<dl>
					<dt>عن الرخصة</dt>
						<dd><a href="about-us.php">من نحن</a></dd>
						<dd><a href="goals.php">أهداف الرخصة</a></dd>
						<dd><a href="goals.php">قرار اجازة الرخصة</a></dd>
						<dd><a href="goals.php">لائحة الرخصة</a></dd>
					<dt>التشريعات والمعايير</dt>
						<dd><a href="condition.php">اعتماد مراكز التدريب والإمتحانات</a></dd>
						<dd><a href="center-criteria.php">معايير مراكز التدريب</a></dd>
						<dd><a href="exam-criteria.php">معايير مراكز الامتحانات</a></dd>
						<dd><a href="trainer-criteria.php">معايير المدربين </a></dd>
					<dt>الخدمات والاجراءات</dt>
						<dd><a href="cert-center.php">إعتماد مراكز التدريب</a></dd>
						<dd><a href="approved-exam.php">إعتماد مراكز الإمتحان</a></dd>
						<dd><a href="approved-trainer.php">إعتماد المدربين</a></dd>
						<dd><a href="skill-card.php">شراء بطاقة المهارات</a></dd>
						<dd><a href="get-exam.php">شراء الامتحانات</a></dd>
					<a href="faqs.php">أسئلة متكررة</a>

					<dt>مراكز الرخصة</dt>
						<dd><a href="approvedcnt-list.php">مراكز التدريب المعتمدة</a></dd>
						<dd><a href="total-examCnt.php">مراكز الامتحان المعتمدة</a></dd>
						<dd><a href="total-trainers.php">المدربين المعتمدين</a></dd>
						
						<a href="sitemap.php">خريطة الموقع</a><br>
						<a href="contact-us.php">اتصل بنا</a>
					<dt>الوسائط</dt>
						<dd><a href="imageshow.php">معرض الصور</a></dd>
						<dd><a href="vedios.php">الفديوهات</a></dd>
						<a href="support/chat.html" target="new">الدعم الفوري</a>
						
					
				</dl>
			</section>
			<?php include("includes/templates/footer.php"); // include footer file ?>
	