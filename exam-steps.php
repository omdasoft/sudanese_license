<?php $pageTitle = "خطوات الحصول علي الإمتحان"; ?>
<?php include("ini.php"); //include initalization file wich include connection to databse file , header, head, navbar ?>
			<!--breadcrumb nav -->
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
					<li class="breadcrumb-item"><a href="slco-exam.php">نظام الإمتحانات</a></li>
					<li class="breadcrumb-item active" aria-current="page">مواضيع ذات صله - خطوات الحصول علي الإمتحان</li>
				  </ol>
			</nav>
			<!--sloc exam section-->
			<section class="exam-section exam-details">
				<h1 class="text-center">خطوات الحصول علي الإمتحان</h1>
				<hr></hr>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.4s">
							<h4>
								لكي يحصل المركز علي الإمتحان هنالك خطوات لابد من تحقيقها :
							</h4>
							<ul>
								<li>يجب ان يكون المركز معتمد للامتحان من قبل إدارة الرخصة السودانية لتشغيل الحاسوب</li>
								<li>يجب ان يحصل المركز علي رصيد امتحان كافي بعدد الجالسين للامتحان </li>
								<li>يجب ان يحصل الممتحنين علي بطاقة مهارات </li>
							</ul>
							<br>
							<br>
							<div class="slco-admin-div wow fadeInUp" data-wow-offset="0" data-wow-delay="3s">
								<image src="layout/images/exam-section.png" />
								<a class="btn btn-info"> الدخول لنظام ادارة الامتاحانات <i class="fa fa-caret-square-o-left" aria-hidden="true"></i></a>
							</div>
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
							  <li class="list-group-item"><a href="word.php">معالج النصوص word</a></li>
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
							  <li class="list-group-item active"><a href="exam-steps.php">الحصول علي الامتحان</a></li>
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