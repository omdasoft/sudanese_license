<nav class="navbar navbar-default dashboard-nav">
		<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">القائمة الرئيسية</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand show-xs hidden-lg hidden-md hidden-sm" href="index.php"><b>S.L.C.O</b></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav navbar-right">
				  	<li><a href="#">الرسائل</a></li>
					<!--servise apply dropdown-->
				  	<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">اختار برنامج للتقديم<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="add_center.php">مركز تدريب / امتحان</a></li>
							<li><a href="add_trainer.php">مدرب</a></li>
						</ul>
					</li>
					<li class="active"><a href="dashboard.php"><i class="fa fa-home fa-2x"></i> <span class="sr-only">(current)</span></a></li>
				  </ul>	  
				  <ul class="nav navbar-nav navbar-left">
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">الملف الشخصى<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="setting.php">تعديل البيانات</a></li>
							<li><a href="logout.php">تسجيل الخروج</a></li>
						</ul>
					</li>
				  </ul>
				</div><!-- /.navbar-collapse -->
	</nav>