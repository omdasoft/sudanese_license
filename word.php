<?php $pageTitle = "منهج الرخصة - معالج النصوص"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item"><a href="slco-exam.php">نظام الإمتحانات</a></li>
					<li class="breadcrumb-item active" aria-current="page">الوحدات الاساسية - معالج النصوص</li>
				  </ol>
			</nav>
			<!--sloc exam section-->
			<section class="exam-section exam-details">
				<h1 class="text-center">معالج النصوص word</h1>
				<hr></hr>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.4s">
							<p>
								تتطلب هذه الوحده من الدارس الإلمام والقدرة على استخدام تطبيقات معالج النصوص على الحاسوب من تنسيق وتحرير وطباعة حتى دمج المراسلات.
							</p>
							<h4>بعد الانتهاء من هذه الوحدة يكون الدارس قادر علي :</h4>
							<ul>
								<li>التعرف علي برنامج معالج النصوص</li>
								<li>التعامل مع الملف (المستند) </li>
								<li>الكتابة وتنسيق النصوص</li>
								<li> ادراج الجداول والكائنات الرسومية</li>
								<li>دمج المراسلات البريدية </li>
								<li>ضبط اعدادات الصفحة </li>
								<li>معالجة الاخطاء الإملائية  </li>
								<li>طباعة المستند </li>
							</ul>
						</div>
						<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
							<ul class="list-group">
							  <h5 class="list-group-title">
							  	  <span class="arraw" style="display: inline;"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i></span>
								  <span class="arraw" style="display: none;"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i></span>
								  الوحدات الاساسية
							  </h5>
							  <li class="list-group-item"><a href="intro.php">المقدمة introduction</a></li>
							  <li class="list-group-item"><a href="operating.php">التشغيل operating</a></li>
							  <li class="list-group-item active"><a href="word.php">معالج النصوص word</a></li>
							  <li class="list-group-item"><a href="powerpoint.php">العروض التقديمية powerpoint</a></li>
							  <li class="list-group-item"><a href="excel.php">الجداول الإلكترونيه excel</a></li>
							  <li class="list-group-item"><a href="access.php">ادارة قواعد البيانات access</a></li>
							  <li class="list-group-item"><a href="info.php">المعلومات والتواصل information & communication</a></li>
							</ul>
							
							<ul class="list-group">
							  <h5 class="list-group-title">
								  <span class="arraw" style="display: none;"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i></span>
								  <span class="arraw" style="display: inline;"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i></span>
								  مواضيع ذات صلة
							  </h5>
							  <li class="list-group-item"><a href="exam-steps.php">الحصول علي الامتحان</a></li>
							  <li class="list-group-item"><a href="skillcard.php">بطاقة المهارات</a></li>
							  <li class="list-group-item"><a href="exam-credit.php">شراء رصيد امتحان</a></li>
							  <li class="list-group-item"><a href="pass-exam.php">اجتياز الاختبارات</a></li>
							  <li class="list-group-item"><a href="exam-admin.php">نظام ادارة الإمتحانات</a></li>

							</ul>
						</div>
					</div>
				</div>
			</section>
		<?php include("includes/templates/footer.php"); //include fooetr section file ?>