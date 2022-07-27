<?php 
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
	exit();
}else{
	$pageTitle = "تعديل البيانات"; 
	//include initalization file wich include connection to databse file , header, head 
	include("config.php"); // configration database file include
	include("includes/functions/function.php"); // functions file include
	include("includes/templates/header.php");//include header file
	include("includes/templates/head.php");//include site head file
	include("includes/templates/dashboard-nav.php");//include dashbard navbar  file
?>
<?php 
	$ID = $_SESSION["userID"];
	$stmt = $con->prepare("SELECT * FROM cnt_admin WHERE ID = ?");
	$stmt->execute(array($ID));
	$row = $stmt->fetch();

?>
<section class="dashboard">
	<form method="post" action="update_profile.php">
	
		<input type="hidden" class="form-control" name="ID" required="required" autocomplete="off" value="<?php echo $row["ID"] ?>"/>

		<div class="row">
			<div class="col-xs-12">
				<label>	الاسم رباعي <span>*</span></label>
				<div class="form-group">
					<input type="text" class="form-control" name="name" required="required" autocomplete="off" value="<?php echo $row["name"] ?>"/>
				</div>
			</div>
			<div class="col-xs-12">
				<label>	اسم المستخدم <span>*</span></label>
				<div class="form-group">
					<input type="text" class="form-control" name="username" required="required" placeholder="ادخل الاسم بالغة الانجليزية" autocomplete="off" value="<?php echo $row["username"] ?>"/>
				</div>
			</div>
			<div class="col-xs-12">
									
				<label>	كلمة المرور <span>*</span></label>					
				<div class="form-group">
					<input type="password" class="form-control" name="password" required="required" autocomplete="off" value="<?php echo $row["password"] ?>"/>
				</div>
			</div>
			<div class="col-xs-12">
				<label>	العنوان <span>*</span></label>
				<div class="form-group">
					<input type="text" class="form-control" name="address" required="required" autocomplete="off" value="<?php echo $row["address"] ?>"/>
				</div>
			</div>
			<div class="col-xs-12">
				<label>	الهاتف <span>*</span></label>				
				<div class="form-group">
					<input type="text" class="form-control" name="phone" required="required" autocomplete="off" value="<?php echo $row["phone"] ?>"/>
				</div>
			</div>
				<div class="col-xs-12">
					<label>	البريد  <span>*</span></label>
					<div class="form-group">
						<input type="email" class="form-control" name="email" required="required" autocomplete="off" value="<?php echo $row["email"] ?>"/>
					</div>
				</div>			
				<div class="col-xs-12">
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-lg btn-primary" value="حفظ">
					</div>
				</div>
		</div>
	</form>	
</section>

<?php include("includes/templates/footer.php");?>
<?php } ?>
