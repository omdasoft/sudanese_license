<?php 
//session_start();
//if(isset($_SESSION['username'])){
	?>
<?php $pageTitle = "لوحة التحكم"; ?>
<?php  
	//include initalization file wich include connection to databse file , header, head 
	include("config.php"); // configration database file include
	include("includes/functions/function.php"); // functions file include
	include("includes/templates/header.php");//include header file
	include("includes/templates/head.php");//include site head file
?>
	<nav class="navbar navbar-default">
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
					<!--servise apply dropdown-->
				  	<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">اختار برنامج للتقديم<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">مركز تدريب</a></li>
							<li><a href="#">مركز امتحان</a></li>
							<li><a href="#">مدرب</a></li>
						</ul>
					</li>
					<li class="active"><a href="index.php"><i class="fa fa-home fa-2x"></i> <span class="sr-only">(current)</span></a></li>
				  </ul>
				  
				  <ul class="nav navbar-nav navbar-left">
					<li><a href="#">الملف الشخصى</a></li>
				  </ul>
				</div><!-- /.navbar-collapse -->
	</nav>
	<section class="dashboard">
		<h1 class="text-center">البرامج الحالية:</h1>
		<hr></hr>
	</section>
	<?php include("includes/templates/footer.php"); // include footer file ?>
	<?php
//}else{
	//header("location: index.php");
//}