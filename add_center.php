<?php 
session_start();
if(!isset($_SESSION['username'])){
	ob_start();
	header("location:login.php");
	exit();
}else{
	$pageTitle = "اضافة مركز"; 
	//include initalization file wich include connection to databse file , header, head 
	include("config.php"); // configration database file include
	include("includes/functions/function.php"); // functions file include
	include("includes/templates/header.php");//include header file
	include("includes/templates/head.php");//include site head file
	include("includes/templates/dashboard-nav.php");//include dashbard navbar  file
?>

<section class="dashboard">
		<h1>ملئ استمارة اعتماد مركز </h1>
		<hr></hr>
		<div class="add_center">
			<div class="container">
			<h3>ارشادات التقديم: </h3>
					<ul>
						<li>التأكد من ادخال البيانات بصورة صحيحة (الحقول التى تحتوى على * حقول ضرورية)</li>
						<li>ملئ استمارة اعتماد المراكز عن طريق برنامج word تحميل الاستمارة <a href="docs/form.doc" download> اضغط هنا</a></li>
						<li>ارفاق استمارة الاعتماد التى تم ملئها مسبقاً</li>
						<li>ارفاق شهادة المجلس القومى للتدريب</li>
						<li>اضغط على حفظ لاكمال عملية التقديم</li>
					</ul>
			<br><br>
				<?php 
				include("config.php");
				error_reporting(0);
				// define variables and set to empty values
				$name_error = $email_error = $date_error = $owner_error = $reg_error = $cert_error = $form_error = $address_error = $phone_error = $url_error = "";
				$cnt_name = $email = $phone = $create_date = $url = $owner = $reg_to = $city = $address = $option = $form_tmp = $cert_tmp = $success = "";
				if (isset($_POST["submit"])) {
					$option = test_input($_POST["option"]);
					$cnt_name = test_input($_POST["cnt_name"]);
					$create_date = test_input($_POST["create_date"]);
					$owner = test_input($_POST["owner"]);
					$reg_to = test_input($_POST["register"]);
					$address = test_input($_POST["address"]);
					$city = test_input($_POST["city"]);
					$email = test_input($_POST["email"]);
					$phone = test_input($_POST["phone"]);
					$url = test_input($_POST["url"]);
					$form_tmp = $_FILES['form']['tmp_name'];
					$form_type = $_FILES['form']['type'];
					$crt_tmp = $_FILES['crt']['tmp_name'];
					$crt_type = $_FILES["crt"]["type"];
					$crt_name = rand();
					$form_name = rand();
					$adminID = $_SESSION["userID"];
					// filter data type an dcontents
				if (empty($_POST["cnt_name"])) { //filter cnt name
					$name_error = "هذا الحقل ضرورى";
				  } 
					
				  if (empty($_POST["create_date"])) {
						$date_error = "هذا الحقل ضرورى";
					} 				
					
					 if (empty($_POST["owner"])) {
						$owner_error = "هذا الحقل ضرورى";
					}
					
					if (empty($_POST["register"])) {
						$reg_error = "هذا الحقل ضرورى";
					}
					
					if (empty($_POST["address"])) {
						$address_error = "هذا الحقل ضرورى";
					}
					
					if (empty($_POST["email"])) {
						$email_error = "هذا الحقل ضرورى";
					  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						  $email_error = "عنوان البريد غير صحيح"; 
						}
					if (empty($_POST["phone"])) {
						$phone_error = "هذا الحقل ضرورى";
					  } else if (!is_numeric($phone)) {
						  $phone_error = "رقم الهاتف غير صحيح"; 
					}
					
					if(empty($_POST["url"])){
						  $url_error = "";
					   }else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
						  $url_error = "عنوان الموقع غير صحيح"; 
					}
					
					if (empty($_FILES["crt"]["name"])) {
						$cert_error = "هذا الحقل ضرورى";
						}else{
							$type =  array("image/png","image/PNG","image/jpg","image/jpeg");
							if(!in_array($crt_type, $type)){
								$cert_error = "يجب ان يكون امتداد الصورة png,jpeg,jpg";
							}
						}
					
					 if (empty($_FILES["form"]["name"])) {
						$form_error = "هذا الحقل ضرورى";
					}else{
						$file_type = array("application/msword");
						if(!in_array($form_type, $file_type)){
							$form_error = "يجب ان يكون نوع الملف word";
						}
					}
					//if not error found insert data to database
					 if ($cntname_error == '' and $email_error == '' and $date_error == '' and $owner_error == '' and $reg_error == '' and $cert_error == '' and $form_error =='' and $address_error == '' and $phone_error == '' and $url_error == ''){ 
							move_uploaded_file($crt_tmp ,'uploads/'.$crt_name.'.jpg');
							move_uploaded_file($form_tmp ,'uploads/'.$form_name.'.doc');
							$stmt = $con ->prepare("INSERT INTO basic_data(cnt_name,create_date,owner,reg_to,city,address,phone,url,email,apply_type,crt_name,form_name,adminID) values (:name,:date,:owner,:reg_to,:city,:address,:phone,:url,:email,:option,:crt_name,:form_name,:adminID)");
							$stmt->execute(array(':name' => $cnt_name,':date' => $create_date,':owner' => $owner,':reg_to' => $reg_to,':city' => $city,':address' => $address,':phone' => $phone,':url' => $url,':email' => $email,':option' => $option,':crt_name' => $crt_name,':form_name' => $form_name,':adminID' => $adminID));
							?>
							<script type="text/javascript">
								document.location.href='dashboard.php';
							</script>
							<?php
					  }
					 
				}
			?>
				<form method="post" action="<?=$_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group row">
					  <div class="col-xs-10">
						<select name="option" class="form-control" id="option" value="<?= $option ?>">
							<option value="1">مركز تدريب</option>
							<option value="2">مركز امتحان</option>
							<option value="3">مركز تدريب/امتنحان</option>
						</select>
					   </div>
					  <label for="option" class="col-xs-2 col-form-label">نوع التقديم <span>*</span></label>
					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="cnt_name" name="cnt_name" value="<?= $cnt_name ?>">
						<span class="error"><?php echo $name_error; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">اسم المركز <span>*</span></label>
					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="create_date" name="create_date" value="<?= $create_date ?>">
						<span class="error"><?php echo $date_error; ?></span>
					  </div>
					  <label for="create_date" class="col-xs-2 col-form-label">تاريخ الانشاء <span>*</span></label>
					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="owner" name="owner" value="<?= $owner ?>">
						<span class="error"><?php echo $owner_error; ?></span>
					  </div>
					  <label for="owner" class="col-xs-2 col-form-label">الجهة المالكة <span>*</span></label>
					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="register" name="register" value="<?= $reg_to ?>">
						<span class="error"><?php echo $reg_error; ?></span>
					  </div>
					  <label for="register" class="col-xs-2 col-form-label">الجهة المسجل لديها <span>*</span></label>

					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<select name="city" class="form-control" id="city" >
							<option>الخرطوم</option>
							<option>الشمالية</option>
							<option>نهر النيل</option>
							<option>البحر الاحمر</option>
							<option>كسلا</option>
							<option>القضارف</option>
							<option>الجزيرة</option>
							<option>النيل الابيض</option>
							<option>النيل الازرق</option>
							<option>سنار</option>
							<option>شمال كردفان</option>
							<option>غرب كردفان</option>
							<option>جنوب كردفان</option>
							<option>شمال دار فور</option>
							<option>جنوب دار فور</option>
							<option>شرق دار فور</option>
							<option>غرب دار فور</option>
							<option>وسط دار فور</option>
						</select>	
					   </div>
					  <label for="city" class="col-xs-2 col-form-label">الولاية <span>*</span></label>

					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="address" name="address" value="<?= $address ?>">
						<span class="error"><?php echo $address_error; ?></span>

					  </div>
					  <label for="address" class="col-xs-2 col-form-label">العنوان <span>*</span></label>

					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="phone" name="phone" value="<?= $phone ?>">
						<span class="error"><?php echo $phone_error; ?></span>

					  </div>
					  <label for="phone" class="col-xs-2 col-form-label">الهاتف <span>*</span></label>

					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
						<span class="error"><?php echo $email_error; ?></span>

					  </div>
					  <label for="email" class="col-xs-2 col-form-label">البريد <span>*</span></label>

					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="url" name="url" value="<?= $url ?>">
						<span class="error"><?php echo $url_error; ?></span>

					  </div>
					  <label for="url" class="col-xs-2 col-form-label">الموقع الالكترونى </label>

					</div>
					<div class="form-group row">
					<p>لتحميل استمارة الاعتماد <a href="docs/form.doc" download> اضغط هنا</a></p>
					  <div class="col-xs-10">
						<input type="file" id="form" name="form"> 
						<span class="error"><?php echo $form_error; ?></span>

					  </div>
					  <label for="form" class="col-xs-2 col-form-label">ارفاق استمارة اعتماد المراكز<span>*</span></label>

					</div>
					
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="file" id="crt" name="crt">
						<span class="error"><?php echo $cert_error; ?></span>

					  </div>
					  <label for="crt" class="col-xs-2 col-form-label">ارفاق شهادة المجلس القومي للتدريب <span>*</span></label>

					</div>
					<div class="col-xs-10">
						<input type="submit" name="submit" class="btn btn-primary btn-lg" value="حفظ"></input>
					</div>
					<div class="col-xs-2"></div>
				</form>
			</div>
		</div>
	</section>

<?php include("includes/templates/footer.php");?>
<?php } ?>
