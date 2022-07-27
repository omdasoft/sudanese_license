<?php 
	/*
		##function name : rowcount();
		##function parameter 3
		#fisrt param is $column 
		#second $table
		#third $value
	
	*/

function rowcount($column,$table,$value){
	
	global $con;
	$stmt = $con->prepare("SELECT $column FROM $table WHERE $column = ?");
	$stmt->execute(array($value));
	$count = $stmt->rowCount();
	return $count;
	
}
/*
	##function name : tableCount()
	##parameter : 1
	##parameter name $table : table name we need to count its elements

*/
function tableCount($table){
	global $con;
	$stmt = $con->prepare("SELECT * FROM $table");
	$stmt->execute();
	$count = $stmt->rowCount();
	return $count;
}
/*
	##function name : privs()
	##parameter :2
	##table : the table name (users table)
*/
function privs($table,$id){
	global $con;
	$stmt = $con->prepare("SELECT privs FROM $table WHERE userID = $id");
	$stmt->execute();
	$row = $stmt->fetch();
	$privs = $row['privs'];
	if($privs == 2){
		return "مدير مركز";
	}else if($privs == 3){
		return "مدير اخبار";
	}
}
/*
	## function name track_user()
	##	parameter : table (name of the table)
	##
*/
function track_user($table){
	global $con;
	$stmt = $con->prepare("SELECT * FROM $table WHERE privs != 1");
	$stmt->execute();
	$count = $stmt->rowCount();
	return $count;
}
/*
	##function name : check_cnt_date : used to check center certified date and sholud finish after 1 year
	##param : $id , $date
	## $id : the identifier unique center number
	## $date : certified center date to calculate end date
*/
function check_cnt_date($id,$date){
	global $con;
	$stmt = $con->prepare("SELECT cert_date FROM basic_data WHERE cntID = $id");
	$stmt->execute();
	$row = $stmt->fetch();
	$date = $row['cert_date'];
	$datetostr = strtotime($date); // confert date to string
	$end_date = strtotime("next year",$datetostr); // add one year to date
	$strtodate = date("Y-m-d",$end_date);
	$current_date = date("Y-m-d");
	if($strtodate > $current_date){
		return "مستمره";
	}else{
		return "منتهي";
	}
}
//date function to display date in arabic format
//parameters : 
//#nameday = name of the day , 
//#namemonth= name of the month , 
//#year year in digit
//#day  day in digit

$nameday=date("l");
$day=date("d");
$namemonth=date("m");
$year=date("Y");
 

	
function arabicDate($nameday,$day,$namemonth,$year){
	switch ($nameday)
	{
		case "Saturday":
		$nameday="السبت";
		break;
		case "Sunday":
		$nameday="الأحد";
		break;
		case "Monday":
		$nameday="الاثنين";
		break;
		case "Tuesday":
		$nameday="الثلاثاء";
		break;
		case "Wednesday":
		$nameday="الأربعاء";
		break;
		case "Thursday":
		$nameday="الخميس";
		break;
		case "Friday":
		$nameday="الجمعة";
		break;
	}  

	switch ($namemonth)
		{
		case 1:
		$namemonth="يناير";
		break;
		case 2:
		$namemonth="فبراير";
		break;
		case 3:
		$namemonth="مارس";
		break;
		case 4:
		$namemonth="إبريل";
		break;
		case 5:
		$namemonth="مايو";
		break;
		case 6:
		$namemonth="يونيو";
		break;
		case 7:
		$namemonth="يوليو";
		break;
		case 8:
		$namemonth="اغسطس";
		break;
		case 9:
		$namemonth="سبتمبر";
		break;
		case 10:
		$namemonth="اكتوبر";
		break;
		case 11:
		$namemonth="نوفمبر";
		break;
		case 12:
		$namemonth="ديسمبر";
		break;
	} 
	 return "$nameday $day $namemonth $year"; 
	 }
	 
	 //this function is used to filter data
	 function check_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
							

?>