<?php
session_start();
if(!isset($_SESSION['username'])){
	ob_start();
	header("location:login.php");
	exit();
}else{
	$pageTitle = "اضافة مدرب"; 
	//include initalization file wich include connection to databse file , header, head 
	include("config.php"); // configration database file include
	include("includes/functions/function.php"); // functions file include
	include("includes/templates/header.php");//include header file
	include("includes/templates/head.php");//include site head file
	include("includes/templates/dashboard-nav.php");//include dashbard navbar  file
?>
	
	<section class="dashboard">
		<h1>ملئ استمارة اعتماد مدرب</h1>
		<hr></hr>
		<div class="add_center">
			<div class="container">
			<h3>ارشادات التقديم: </h3>
					<ul>
						<li>التأكد من ادخال البيانات بصورة صحيحة (الحقول التى تحتوى على * حقول ضرورية)</li>
						<li>ملئ استمارة اعتماد المدربين عن طريق برنامج word لتحميل الاستمارة <a href="docs/trainer-form.doc" download">اضغط هنا</a></li>
						<li>ارفاق استمارة الاعتماد التى تم ملئها مسبقاً</li>
						<li>ارفاق الشهادة الجامعية</li>
						<li>ارفاق السيرة الذاتية</li>
						<li>اضغط على حفظ لاكمال عملية التقديم</li>
					</ul>
			<br><br>
			<?php 
				error_reporting(0);
				include("config.php");
				// define variables and set to empty values
				$enname_error = $arnamError = $bplace_error = $bdate_error = $address_error  = $phone_error = $email_error = $unv_error = $faculty_error = $degree_error = $spec_error = $tform_error = $crt_error = $cv_error = "";
				$ar_name = $en_name = $birth_place = $birth_date = $email = $phone = $address = $unv = $faculty = $degree = $spec = $trainer_form = $crt = $cv = $success = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$ar_name = test_input($_POST["ar_name"]);
					$en_name = test_input($_POST["en_name"]);
					$birth_place = test_input($_POST["birth_place"]);
					$birth_date = test_input($_POST["birth_date"]);
					$address = test_input($_POST["address"]);
					$email = test_input($_POST["email"]);
					$phone = test_input($_POST["phone"]);
					$unv = test_input($_POST["unv"]);
					$faculty = test_input($_POST["faculty"]);
					$degree = test_input($_POST["degree"]);
					$spec = test_input($_POST["spec"]);
					
					$trainer_form_tmp = $_FILES['trainer_form']['tmp_name'];
					$trainer_form_type = $_FILES['trainer_form']['type'];
					$crt_tmp = $_FILES['crt']['tmp_name'];
					$crt_type = $_FILES["crt"]["type"];
					$cv_tmp = $_FILES["cv"]["tmp_name"];
					$cv_type = $_FILES["cv"]["type"];
					$tform_rname = rand();//trainer form random name
					$crt_rname = rand(); //certificate random name
					$cv_rname = rand(); //cv random name
					$adminID = $_SESSION["userID"];
					// filter data type an dcontents
				if (empty($ar_name)) { //filter cnt name
					$arnamError  = "هذا الحقل ضرورى";
				  } 
			    if (empty($en_name)) { //filter cnt name
					$enname_error = "هذا الحقل ضرورى";
				  } 
				  
				  if (empty($birth_place)) {
						$bplace_error = "هذا الحقل ضرورى";
					} 				
					
					 if (empty($birth_date)) {
						$bdate_error = "هذا الحقل ضرورى";
					}
					
					if (empty($address)) {
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
					
					if (empty($unv)) {
						$unv_error = "هذا الحقل ضرورى";
					}
					
					if (empty($faculty)) {
						$faculty_error = "هذا الحقل ضرورى";
					}
					
					if (empty($degree)) {
						$degree_error = "هذا الحقل ضرورى";
					}
					
					if (empty($spec)) {
						$spec_error = "هذا الحقل ضرورى";
					}
					//form 
					if (empty($_FILES['trainer_form']['name'])){
						$tform_error = "هذا الحقل ضرورى";
						}else{
							$tform_type =  array("application/msword");
							if(!in_array($trainer_form_type, $tform_type)){
								$tform_error = "يجب رفع الفورم فى شكل ملف word فقط";
							}
						}
						//certificate
						if(empty($_FILES['crt']['name'])){
						$crt_error = "هذا الحقل ضرورى";
						}else{
							$crt_allawed_type = array("image/png","image/jpg","image/jpeg");
							if(!in_array($crt_type, $crt_allawed_type)){
								$crt_error = "يجب ان يكون امتداد الصورة png,jpeg,jpg";
							}
						}
						//cv
						if (empty($_FILES['cv']['name'])){
						$cv_error = "هذا الحقل ضرورى";
						}else{
							$cv_allawed_type = array("application/msword","application/pdf","application/acrobat","application/x-pdf");
							if(!in_array($cv_type, $cv_allawed_type)){
								$cv_error = "يجب ارفاق السيرة الذاتية فى شكل pdf او word";
							}
						}
						
					
					//if not error found insert data to database
					 if ($arnamError == '' and $enname_error == '' and $bplace_error == '' and $bdate_error == '' and $address_error  == '' and $phone_error == '' and $email_error == '' and $unv_error == '' and $faculty_error =='' and $degree_error == '' and $spec_error == '' and $tform_error == '' and $crt_error == '' and $cv_error == ''){ 
							move_uploaded_file($trainer_form_tmp ,'uploads/'.$tform_rname.'.doc');
							move_uploaded_file($crt_tmp ,'uploads/'.$crt_rname.'.jpg');
							move_uploaded_file($cv_tmp ,'uploads/'.$cv_rname.'.jpg');
														
							$stmt = $con->prepare("insert into trainer(ar_name,en_name,birth_place,birth_date,address,phone,email,univercity,faculity,degree,specialty,form,certificate,cv,adminID) 
															values(:ar_name,:en_name,:b_place,:b_date,:address,:phone,:email,:univercity,:faculity,:degree,:specialty,:form,:crt,:cv,:adminID)");
							$stmt->execute(array(':ar_name' => $ar_name,':en_name' => $en_name,':b_place' => $birth_place,':b_date' => $birth_date,':address' => $address,':phone' => $phone,':email' => $email,':univercity' => $unv,':faculity' => $faculty,':degree' => $degree,':specialty' => $spec,':form' => $tform_rname,':crt' => $crt_rname,':cv' => $cv_rname,':adminID' => $adminID));	
								
							?>
								<script type="text/javascript" language="JavaScript">location.href = 'dashboard.php';</script>
							<?php
					 }
				}
			?>
				<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data">
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="ar_name" name="ar_name" value="<?= $ar_name ?>">
						<span class="error"><?php echo $arnamError ; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">الاسم(عربي) <span>*</span></label>
					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="en_name" name="en_name" value="<?= $en_name ?>">
						<span class="error"><?php echo $enname_error; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">الاسم(EN) <span>*</span></label>
					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="birth_place" name="birth_place" value="<?= $birth_place ?>">
						<span class="error"><?php echo $bplace_error; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">مكان الميلاد <span>*</span></label>
					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="birth_date" name="birth_date" value="<?= $birth_date ?>">
						<span class="error"><?php echo $bdate_error; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">تاريخ الميلاد <span>*</span></label>
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
						<input type="text" class="form-control" id="unv" name="unv" value="<?= $unv ?>">
						<span class="error"><?php echo $unv_error; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">الجامعة  <span>*</span></label>
					</div>
					
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="faculty" name="faculty" value="<?= $faculty ?>">
						<span class="error"><?php echo $faculty_error; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">الكلية <span>*</span></label>
					</div>
					
					<div class="form-group row">
					  <div class="col-xs-10">
						<select name="degree" class="form-control" id="degree" >
							<option value="بكالريوس">بكالريوس</option>
							<option value="ماجستير">ماجستير</option>
							<option value="دكتوراة">دكتوراة</option>
						</select>	
					   </div>
					  <label for="degree" class="col-xs-2 col-form-label">الدرجة العلمية <span>*</span></label>

					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="text" class="form-control" id="spec" name="spec" value="<?= $spec ?>">
						<span class="error"><?php echo $spec_error; ?></span>
					  </div>
					  <label for="cnt_name" class="col-xs-2 col-form-label">التخصص <span>*</span></label>
					</div>
					
					<div class="form-group row">
					  <p>لتحميل استمارة الاعتماد <a href="docs/trainer-form.doc" download> اضغط هنا</a></p>
					  <div class="col-xs-10">
						<input type="file" id="trainer-form" name="trainer_form"> 
						<span class="error"><?php echo $tform_error; ?></span>
					  </div>
					  <label for="trainer-form" class="col-xs-2 col-form-label">ارفاق استمارة اعتماد المدربين<span>*</span></label>
					</div>
					
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="file" id="crt" name="crt">
						<span class="error"><?php echo $crt_error; ?></span>
					  </div>
					  <label for="crt" class="col-xs-2 col-form-label">ارفاق الشهادة الجامعية <span>*</span></label>
					</div>
					
					<div class="form-group row">
					  <div class="col-xs-10">
						<input type="file" id="cv" name="cv">
						<span class="error"><?php echo $cv_error; ?></span>
					  </div>
					  <label for="cv" class="col-xs-2 col-form-label">ارفاق السيرة الذاتية <span>*</span></label>
					</div>
					
					<div class="col-xs-10">
						<input type="submit" name="submit" class="btn btn-primary btn-lg" value="حفظ"></input>
					</div>
					<div class="col-xs-2"></div>
				</form>
			</div>
		</div>
	</section>
	<?php include("includes/templates/footer.php"); // include footer file ?>
<?php } ?>

